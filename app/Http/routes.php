<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
    Route::match(['get', 'post'], '/', 'Admin\AuthController@login');
    Route::get('/logout', 'Admin\AuthController@logout');
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/home/index', 'Admin\HomeController@index');
        Route::get('/user/index', 'Admin\UserController@index');
        Route::get('/user/userlist', 'Admin\UserController@userList');
        Route::match(['get', 'post'], '/user/edit', 'Admin\UserController@edit');
        Route::match(['get', 'post'], '/user/add', 'Admin\UserController@add');
        Route::get('/user/delete', 'Admin\UserController@delete');
    });
});
