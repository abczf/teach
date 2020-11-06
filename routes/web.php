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
	 #角色
    Route::prefix('role')->group(function(){
        Route::any('show','admin\RoleController@show');
        Route::any('add','admin\RoleController@add');
    });
    #权限
    Route::prefix('right')->group(function(){
        Route::any('show','admin\RightController@show');
        Route::any('add','admin\RightController@add');
    });
    #用户
    Route::prefix('admin')->group(function(){
        Route::any('show','admin\AdminController@show');
        Route::any('add','admin\AdminController@add');

    });
    #用户角色
    Route::prefix('adminrole')->group(function(){
        Route::any('add','admin\AdminroleController@add');
    });
    #角色权限
    Route::prefix('roleright')->group(function(){
        Route::any('add','admin\RolerightController@add');
    });
});









?>
