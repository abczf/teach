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
	 #题库模块
	 Route::prefix('bank')->group(function(){
	    Route::any('show','admin\BankController@show');
	    Route::any('add','admin\BankController@add');
	});
    #导航栏
    Route::prefix('nav')->group(function(){
        Route::any('show','admin\NavController@show');
        Route::any('add','admin\NavController@add');
    });
    #问答展示
    Route::prefix('question')->group(function(){
        Route::any('show','admin\QuestionController@show');
    });
});


// 前台
Route::prefix('index')->group(function(){
        // 问答
        Route::any('question/add','index\QuestionController@add');

    // 首页
    Route::any('','index\IndexController@index');
    // 登录
    Route::any('login','index\LoginController@login');
    // 注册
    Route::any('register','index\RegisterController@register');

    // 课程列表
    Route::prefix('course')->group(function(){
        Route::any('list','index\CourselistController@courselist');
    });
    // 课程详情
    Route::prefix('course')->group(function(){
        Route::any('cont','index\CoursecontController@coursecont');
    });



    # 资讯
    Route::prefix('consult')->group(function(){
        Route::any('show','index\ConsultController@show');
    });

    # 资讯详情
    Route::prefix('consultInfo')->group(function(){
        Route::any('show','index\ConsultInfoController@show');
    });

    # 讲师
    Route::prefix('teacher')->group(function(){
        Route::any('show','index\TeacherController@show');
    });

    # 讲师详情
    Route::prefix('teacherInfo')->group(function(){
        Route::any('show','index\TeacherInfoController@show');
    });

    # 目录详情
    Route::prefix('detail')->group(function(){
        Route::any('info','index\DetailController@info');
    });

     # 视频
    Route::prefix('video')->group(function(){
        Route::any('show','index\VideoController@show');
    });
});






?>
