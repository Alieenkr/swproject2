<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Post;
use Validator;
use Input;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

//        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

//        $posts = Post::all();
//        return view('post.index', compact('posts'));

        return '목록을 확인하는 화면 입니다.';

    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
//        return view('post.create');
        return '생성을 위한 화면 입니다. ';
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
//        $validator = Validator::make($data = Input::all(), Post::$rules);
//
//        if ($validator->fails())
//        {
//            return redirect()->back()->withErrors($validator->errors())->withInput();
//        }

//        if(Input::hasFile('thumbnail'))
//        {
//            $thumbnail = Input::file('thumbnail');
//
//            $newFileName = time().'-'.$thumbnail->getClientOriginalName();
//
//            $thumbnail->move(storage_path().'/files/', $newFileName);
//            $post->thumbnail = $newFileName;
//        }

        $post = new Post;

        $post->title = Input::get('title');
        $post->body = Input::get('body');

        $post->save();


        return redirect()->route('post.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
//        $post = Post::findOrFail($id);
//
//        return view('post.show', compact('post'));

        return '내용을 볼 수 있는 화면입니다.';
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $post = Post::find($id);
        return view('post.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $post = Post::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Post::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post->update($data);
        return redirect()->route('post.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Post::destroy($id);
        return redirect()->route('post.index');
	}

}
