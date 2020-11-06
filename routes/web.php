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
	});
	#轮播图
	 Route::prefix('slide')->group(function(){
	    Route::any('slide','admin\SlideController@slide');
	    Route::any('add','admin\SlideController@add');
	});
	 #所有课程
	 Route::prefix('course')->group(function(){
	    Route::any('show','admin\CourseController@show');
	    Route::any('add','admin\CourseController@add');    
	});
	 #课程分类
	 Route::prefix('category')->group(function(){
	    Route::any('show','admin\CategoryController@show');
	    Route::any('add','admin\CategoryController@add');    
	});
	 #课程目录
	 Route::prefix('catalog')->group(function(){
	    Route::any('show','admin\CatalogController@show');
	    Route::any('add','admin\CatalogController@add');    
	});
	  #目录详情
	 Route::prefix('cataloginfo')->group(function(){
	    Route::any('show','admin\CatalogInfoController@show');
	    Route::any('add','admin\CatalogInfoController@add');    
	});
	  #课程公告
	 Route::prefix('notice')->group(function(){
	    Route::any('show','admin\NoticeController@show');
	    Route::any('add','admin\NoticeController@add');    
	});
});









?>
