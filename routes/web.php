<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/board/{editorType}', "CodeController@lists")->where('editorType', '(kotlin|java8|html|html2|html3)');

Route::get("/font/{fontType}", "CodeController@font")->where("fontType", "(arial|times)");

Route::get("/member_form", "Auth\LoginController@memberForm");
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/editpage2/{editorType}', 'CodeController@showEditor2')->where('editorType', '(kotlin|java8|html|html2|html3)');
Route::get('/editpage/{editorType}', 'CodeController@showEditor')->where('editorType', '(kotlin|java8|html|html2|html3)');
//Route::get('/{editorType}', 'CodeController@showEditor2')->where('editorType', '(kotlin|java8|html|html2|html3)');
//Route::get('/editpage/{editorType}/{type}', 'CodeController@showEditor2')->where('editorType', '(kotlin|java8|html|html2|html3)'->where('type', '(kotlin|java|html)');

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/auth/redirect/{provider}', 'Auth\SocialAuthController@redirect')->where('provider', '[A-Za-z0-9]+');
Route::get('/auth/callback/{provider}', 'Auth\SocialAuthController@callback')->where('provider', '[A-Za-z0-9]+');

//Route::get('/{editorType}', 'CodeController@showEditor')->where('editorType', '(kotlin|java8|html|html2|html3)');
Route::get('/{editorType}/{number}', 'CodeController@showModifyEditor')->where('editorType', '(kotlin|java8|html|html2|html3)')->where('number', '[A-Za-z0-9]+');

//Route::get('/{editorType}/{number}', 'CodeController@showModifyEditor2')->where('editorType', '(kotlin|java8|html|html2|html3)')->where('number', '[A-Za-z0-9]+');
Route::post('/code/save', 'CodeController@add');
Route::post('/code/save/{number}', 'CodeController@modify')->where('number', '[A-Za-z0-9]+');
Route::post('/code/fork/{number}', 'CodeController@fork')->where('number', '[A-Za-z0-9]+');
Route::get('/code/get/{number}', 'CodeController@getCode')->where('number', '[A-Za-z0-9]+');
Route::post('/code/delete/{number}', 'CodeController@delete')->where('number', '[A-Za-z0-9]+');
Route::post('/java8/execute', 'CodeController@execute');
Route::post('/kotlin/execute', 'CodeController@executeKotlin');
Route::post('/code/render/html', 'CodeController@renderHtml');
//Route::get('/code/render/html', 'CodeController@renderHtml');
//Route::get('/code/render/html', 'CodeController@renderHtml');

//added
Route::resource('post', 'PostController');
Route::resource('/post/show', 'PostController@show');
