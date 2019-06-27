<?php

namespace App\Http\Controllers;

use App\Domain\Source;
use App\Domain\SourceService;
use App\Util;
use Auth;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function lists($editorType)
    {
        $user = Auth::user();

        $sources = Source::where("user_id", "=", $user->login_id)->get();

        return view("editor.lists", [
            'sources' => $sources,
            'editorType' => $editorType
        ]);
    }

    public function showEditor($editorType)
    {
        $viewData = [];
        $viewData['editorType'] = $editorType;
        $viewData['number'] = '';

        return view('editor/' . $editorType, $viewData);
    }

	public function showEditor2($editorType)
    {
        $viewData = [];
        $viewData['editorType'] = $editorType;
        $viewData['number'] = '';

        return view('/' . $editorType, $viewData);
    }

    public function showModifyEditor($editorType, $codeNumber)
    {
        $viewData = [];
        $viewData['editorType'] = $editorType;
        $viewData['number'] = $codeNumber;

        $viewData['source'] = Source::where(['id' => $codeNumber])->first();

        return view("editor/edit", $viewData);
    }

    public function add(Request $request)
    {
        $resultCode = '';
        $msg = '';

        $id = '';

        $user = Auth::user();

        if (empty($resultCode)) {
            if (empty($user)) {
                $resultCode = 'F-1';
                $msg = '로그인 해주세요.';
            }
        }

        if (empty($resultCode)) {
            $args = $request->all();
            $args['user_id'] = $user->login_id;
            $args['created_at'] = date("Y-m-d H:i:s");
			
			//dd($args);

            $addRsData = SourceService::add($args);
			
			
            $id = $addRsData['model']->id;

            $resultCode = 'S-1';
            $msg = '저장되었습니다.';
        }

        $rsData = [];
        $rsData['resultCode'] = $resultCode;
        $rsData['msg'] = $msg;
        $rsData['id'] = $id;

        //return response()->json($rsData);

        return view("editor.success", $rsData);
    }

    public function answer(Request $request, $number)
    {
        $all = $request->all();
        print_r($all);
        exit;
    }

    public function fork(Request $request, $number)
    {
        $source = Source::find($number);

        $resultCode = '';
        $msg = '';
        $id = '';

        $user = Auth::user();

        if (empty($resultCode)) {
            if (empty($user)) {
                //$resultCode = 'F-1';
                //$msg = '로그인 해주세요.';
            }
        }

        if (empty($resultCode)) {
            if (empty($source)) {
                $resultCode = 'F-2';
                $msg = '존재하지 않는 코드입니다.';
            }
        }

        if (empty($resultCode)) {
            $args = $request->all();
            //$args['user_id'] = $user->id;
			$args['user_id'] = 0;
            $args['id'] = $number;
            $forkRsData = SourceService::fork($args);
            $id = $forkRsData['model']->id;

            $resultCode = 'S-1';
            $msg = '수정되었습니다.';
        }

        $rsData = [];
        $rsData['resultCode'] = $resultCode;
        $rsData['msg'] = $msg;
        $rsData['id'] = $id;

        return response()->json($rsData);
    }

    public function modify(Request $request, $number)
    {
        $source = Source::find($number);

        $resultCode = '';
        $msg = '';
        $id = '';

        $user = Auth::user();

        if (empty($resultCode)) {
            if (empty($user)) {
                //$resultCode = 'F-1';
                //$msg = '로그인 해주세요.';
            }
        }

        if (empty($resultCode)) {
            if (empty($source)) {
                $resultCode = 'F-2';
                $msg = '존재하지 않는 코드입니다.';
            }
        }

        if (empty($resultCode)) {
            //if ($source->user_id != $user->id) {
            //    $resultCode = 'F-3';
            //    $msg = '권한이 없습니다.';
            //}
        }

        if (empty($resultCode)) {
            $args = $request->all();
            $args['id'] = $number;
            $modifyRsData = SourceService::modify($args);
            $id = $modifyRsData['model']->id;

            $resultCode = 'S-1';
            $msg = '수정되었습니다.';
        }

        $rsData = [];
        $rsData['resultCode'] = $resultCode;
        $rsData['msg'] = $msg;
        $rsData['id'] = $id;

        return view('editor/success', $rsData);
    }

    public function getCode(Request $request, $number)
    {
        $source = Source::find($number);

        $resultCode = '';
        $msg = '';

        $body = '';
        $startBody = '';
        $history = '{}';
        $title = '';
        $id = '';

        if (empty($resultCode)) {
            if (empty($source)) {
                $resultCode = 'F-2';
                $msg = '존재하지 않는 코드입니다.';
            }
        }

        if (empty($resultCode)) {
            $resultCode = 'S-1';
            $msg = '성공';
            $body = $source->body;
            $startBody = $source->startBody;
            $history = $source->history;
            $title = $source->title;
            $id = $source->id;
        }

        $rsData = [];
        $rsData['resultCode'] = $resultCode;
        $rsData['msg'] = $msg;
        $rsData['body'] = $body;
        $rsData['startBody'] = $startBody;
        $rsData['history'] = $history;
        $rsData['title'] = $title;
        $rsData['id'] = $id;

        return response()->json($rsData);
    }

    public function delete(Request $request, $number)
    {
        $source = Source::find($number);

        $resultCode = '';
        $msg = '';

        $user = Auth::user();

        if (empty($resultCode)) {
            if (empty($user)) {
                $resultCode = 'F-1';
                $msg = '로그인 해주세요.';
            }
        }

        if (empty($resultCode)) {
            if (empty($source)) {
                $resultCode = 'F-2';
                $msg = '존재하지 않는 코드입니다.';
            }
        }

        if (empty($resultCode)) {
            if ($source->user_id != $user->id) {
                $resultCode = 'F-3';
                $msg = '권한이 없습니다.';
            }
        }

        if (empty($resultCode)) {
            SourceService::delete($source->id);

            $resultCode = 'S-1';
            $msg = '삭제되었습니다.';
        }

        $rsData = [];
        $rsData['resultCode'] = $resultCode;
        $rsData['msg'] = $msg;

        return response()->json($rsData);
    }

    public function execute(Request $request)
    {
        $all = $request->all();
        $rs = Util::curlPost('http://javae.oa.gg/execute.php', ['queryStrArgs' => ['source' => $all['body']]]);

        return $rs;
    }

	public function executeKotlin(Request $request)
    {
        $all = $request->all();
        $rs = Util::curlPost('http://kotlin-e.oa.gg/execute.php', ['queryStrArgs' => ['source' => $all['body']]]);

        return $rs;
    }

    public function renderHtml(Request $request)
    {
        $all = $request->all();

        $viewData = [];
        $viewData['body'] = $all['body'];
        return view('editor/render', $viewData);
    }

	public function renderHtml2(Request $request)
    {
        $all = $request->all();

        $viewData = [];
        $viewData['body'] = $all['body'];
        return view('/render', $viewData);
    }
}
