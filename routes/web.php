<?php

use Illuminate\Support\Facades\Route;

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


/**
 * 后台
 */
Route::prefix('admin')->group(function(){
    Route::view('','admin.admin');
    // 后台登录
	Route::get('login','admin\LoginController@login');
    # 咨询模块
    Route::prefix('consult')->group(function(){
	    Route::any('show','admin\ConsultController@show');
	    Route::any('create','admin\ConsultController@create');
	});
	#轮播图
	 Route::prefix('slide')->group(function(){
	    Route::any('slide','admin\SlideController@slide');
	    Route::any('add','admin\SlideController@add');
	});
});


// 前台
Route::prefix('index')->group(function(){
        // 首页
        Route::any('','index\IndexController@index');
        // 登录
        Route::any('login','index\LoginController@login');
        // 注册
        Route::any('register','index\RegisterController@register');
        // 课程列表
        Route::any('courselist','index\CourselistController@courselist');
        // 课程详情
        Route::any('coursecont','index\CoursecontController@coursecont');


});










?>
