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

Route::get('/', 'HomeController@index');
Route::get('/detail/{id}', 'HomeController@detail');
Route::get('/tag/{id}', 'HomeController@tag');
Route::get('/category/{alias}', 'HomeController@category');

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
    Route::match(['get', 'post'], '/', 'Admin\AuthController@signin');
    Route::get('/logout', 'Admin\AuthController@logout');
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/home/index', 'Admin\HomeController@index');
        //用户
        Route::get('/user/index', 'Admin\UserController@index');
        Route::match(['get', 'post'], '/user/edit', 'Admin\UserController@edit');
        Route::match(['get', 'post'], '/user/add', 'Admin\UserController@add');
        Route::get('/user/delete', 'Admin\UserController@delete');
        //文章
        Route::get('/articles/index', 'Admin\ArticlesController@index');
        Route::match(['get', 'post'], '/articles/add', 'Admin\ArticlesController@add');
        Route::match(['get', 'post'], '/articles/edit', 'Admin\ArticlesController@edit');
        Route::get('/articles/delete', 'Admin\ArticlesController@delete');
        //栏目
        Route::get('/category/index', 'Admin\CategoryController@index');
        Route::match(['get', 'post'], '/category/add', 'Admin\CategoryController@add');
        Route::match(['get', 'post'], '/category/edit', 'Admin\CategoryController@edit');
        Route::get('/category/delete', 'Admin\CategoryController@delete');
        //标签
        Route::get('/tags/index', 'Admin\TagsController@index');
        Route::match(['get', 'post'], '/tags/add', 'Admin\TagsController@add');
        Route::match(['get', 'post'], '/tags/edit', 'Admin\TagsController@edit');
        Route::get('/tags/delete', 'Admin\TagsController@delete');
    });
});
