<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UsersController;
use App\Http\Requests\Request;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use ResetsPasswords;

    protected $redirectPath = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function login(\Illuminate\Http\Request $request)
    {

        $validator = Validator::make($request->all(), [
           'id' => 'required',
            'pw' => 'required'
        ]);

        if($validator->fails())
        {
            return Redirect::to('/login')->withErrors($validator->errors())->withInput(Input::except('pw'));
        }
        else
        {

            $userdata = [
                'login_id' => Input::get('id'),
                'password' => Input::get("pw")
            ];

            if(!Auth::attempt($userdata))
            {
				return Redirect::to('/login')->withErrors($validator->errors()->add('field', 'Something is wrong with this id or pw!'));
				//return Redirect::to('login');
            }
            else
            {
                return redirect("/editpage2/html");
            }
        }
    }

    public function showLoginForm()
    {
        return view("/editor/loginpage");
    }

    public function memberForm()
    {
        return view('/auth/register');
    }

    public function logout(Request $request)
    {
        $this->middleware("auth");

        Auth::logout();

        return redirect('/editpage2/html');
    }


}
