<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//闲鱼  后台

Route::group([],function(){
	

	Route::get('admin/index','admin\IndexController@index');
	Route::resource('admin/user','admin\UserController');

	//指定路由访问资源控制器中的方法
	Route::get('admin/user/del/{id}','admin\UserController@destroy');


	// Route::resource('admin/user/del/{$id}', 'admin\UserController', ['only' => ['destroy']]);
	// 部分资源路由

});

