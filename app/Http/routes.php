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
Route::group(['prefix' => 'admin', 'middleware' => 'web', 'namespace' => 'Admin'], function () {
    Route::match(['get', 'post'], '/', 'AuthController@signin');
    Route::get('/logout', 'AuthController@logout');
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/home/index', 'HomeController@index');
        //用户
        Route::get('/user/index', 'UserController@index');
        Route::match(['get', 'post'], '/user/edit', 'UserController@edit');
        Route::match(['get', 'post'], '/user/add', 'UserController@add');
        Route::get('/user/delete', 'UserController@delete');
        //文章
        Route::get('/articles/index', 'ArticlesController@index');
        Route::match(['get', 'post'], '/articles/add', 'ArticlesController@add');
        Route::match(['get', 'post'], '/articles/edit', 'ArticlesController@edit');
        Route::get('/articles/delete', 'ArticlesController@delete');
        //栏目
        Route::get('/category/index', 'CategoryController@index');
        Route::match(['get', 'post'], '/category/add', 'CategoryController@add');
        Route::match(['get', 'post'], '/category/edit', 'CategoryController@edit');
        Route::get('/category/delete', 'CategoryController@delete');
        //标签
        Route::get('/tags/index', 'TagsController@index');
        Route::match(['get', 'post'], '/tags/add', 'TagsController@add');
        Route::match(['get', 'post'], '/tags/edit', 'TagsController@edit');
        Route::get('/tags/delete', 'TagsController@delete');
        //图片管理
        Route::get('/images/index', 'ImagesController@index');
        Route::match(['get', 'post'], '/images/add', 'ImagesController@add');
        Route::match(['get', 'post'], '/images/upload', 'ImagesController@upload');
        Route::get('/images/delete', 'ImagesController@delete');
    });
});
