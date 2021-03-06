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
//->middleware('checklogin')

/**
 * 后台
 */
// 后台登录
    // 登录视图
    Route::any('admin/login','admin\LoginController@login');
    // 执行登录
    Route::any('admin/login/Do','admin\LoginController@Do');




    Route::any('/admin/lect/img', 'admin\LectController@img');//图片处理
    Route::prefix('admin')->group(function () {
        # 首页
        Route::view('', 'admin.admin');
        # 咨询模块
        Route::prefix('consult')->group(function () {
            Route::any('show', 'admin\ConsultController@show');//资讯展示
            Route::any('create', 'admin\ConsultController@create');//资讯添加
            Route::any('store', 'admin\ConsultController@store');//添加执行
            Route::any('Fdel', 'admin\ConsultController@Fdel');//资讯删除
            Route::any('edit/{infor_id}', 'admin\ConsultController@edit');//资讯修改
            Route::any('update/{infor_id}', 'admin\ConsultController@update');//修改执行
        });
        #精彩活动
        Route::prefix('active')->group(function () {
            Route::any('show', 'admin\ActiveController@show');//活动展示
            Route::any('add', 'admin\ActiveController@add');//活动添加
            Route::any('store', 'admin\ActiveController@store');//添加执行
            Route::any('Fdel', 'admin\ActiveController@Fdel');//活动删除
            Route::any('edit/{act_id}', 'admin\ActiveController@edit');//活动修改
            Route::any('update/{act_id}', 'admin\ActiveController@update');//修改执行
        });

        #轮播图
        Route::prefix('slide')->group(function () {
            Route::any('slide', 'admin\SlideController@slide');//轮播图展示
            Route::any('add', 'admin\SlideController@add');//轮播图渲染
            Route::any('addDo', 'admin\SlideController@addDo');//轮播图添加
            Route::any('img', 'admin\SlideController@img');//图片处理
            Route::any('del/{id}', 'admin\SlideController@del');//轮播图删除
            Route::any('upd/{id}', 'admin\SlideController@upd');//轮播图编辑
            Route::any('updDo/{id}', 'admin\SlideController@updDo');//轮播图修改
        });

        #角色
        Route::prefix('role')->group(function () {
            Route::any('show', 'admin\RoleController@show');
            Route::any('add', 'admin\RoleController@add');
            Route::any('add_do', 'admin\RoleController@add_do');
            Route::any('del', 'admin\RoleController@del');
            Route::any('upd', 'admin\RoleController@upd');
            Route::any('upd_do', 'admin\RoleController@upd_do');
        });

        #权限
        Route::prefix('right')->group(function () {
            Route::any('show', 'admin\RightController@show');
            Route::any('add', 'admin\RightController@add');
            Route::any('add_do', 'admin\RightController@add_do');
            Route::any('del', 'admin\RightController@del');
            Route::any('upd', 'admin\RightController@upd');
            Route::any('upd_do', 'admin\RightController@upd_do');
        });

        #用户
        Route::prefix('admin')->group(function () {
            Route::any('show', 'admin\AdminController@show');
            Route::any('add', 'admin\AdminController@add');
            Route::any('add_do', 'admin\AdminController@add_do');
            Route::any('del', 'admin\AdminController@del');
            Route::any('upd', 'admin\AdminController@upd');
            Route::any('upddo', 'admin\AdminController@upddo');
        });

        #用户角色
        Route::prefix('adminrole')->group(function () {
            Route::any('add/{id}', 'admin\AdminroleController@add');
            Route::any('add_do', 'admin\AdminroleController@add_do');
        });

        #角色权限
        Route::prefix('roleright')->group(function () {
            Route::any('add', 'admin\RolerightController@add');
            Route::any('add_do', 'admin\RolerightController@add_do');
            Route::any('show', 'admin\RolerightController@show');
            Route::any('del', 'admin\RolerightController@del');
            Route::any('edit', 'admin\RolerightController@edit');
            Route::any('edit2', 'admin\RolerightController@edit2');
        });

        #所有课程
        Route::prefix('course')->group(function () {
            Route::any('show', 'admin\CourseController@show');//课程展示
            Route::any('add', 'admin\CourseController@add');//课程渲染
            Route::any('img', 'admin\CourseController@img');//图片处理
            Route::any('video', 'admin\CourseController@video');//视频处理
            Route::any('addDo', 'admin\CourseController@addDo');//课程添加
            Route::any('del/{id}', 'admin\CourseController@del');//课程删除
            Route::any('upd/{id}', 'admin\CourseController@upd');//课程编辑
            Route::any('updDo/{id}', 'admin\CourseController@updDo');//课程修改
        });

        #课程分类
        Route::prefix('category')->group(function () {
            Route::any('show', 'admin\CategoryController@show');
            Route::any('add', 'admin\CategoryController@add');
            Route::any('save', 'admin\CategoryController@save');
            Route::any('del', 'admin\CategoryController@del');
            Route::any('edit', 'admin\CategoryController@edit');
            Route::any('update', 'admin\CategoryController@update');
        });

        #课程目录
        Route::prefix('catalog')->group(function () {
            Route::any('show', 'admin\CatalogController@show');
            Route::any('add', 'admin\CatalogController@add');
            Route::any('save', 'admin\CatalogController@save');
            Route::any('del', 'admin\CatalogController@del');
            Route::any('edit', 'admin\CatalogController@edit');
            Route::any('update', 'admin\CatalogController@update');
        });

        #目录详情
        Route::prefix('cataloginfo')->group(function () {
            Route::any('show', 'admin\CatalogInfoController@show');
            Route::any('add', 'admin\CatalogInfoController@add');
            Route::any('save', 'admin\CatalogInfoController@save');
            Route::any('del', 'admin\CatalogInfoController@del');
            Route::any('edit', 'admin\CatalogInfoController@edit');
            Route::any('update', 'admin\CatalogInfoController@update');
        });

        #课程公告
        Route::prefix('notice')->group(function () {
            Route::any('show', 'admin\NoticeController@show');
            Route::any('add', 'admin\NoticeController@add');
            Route::any('create', 'admin\NoticeController@create');
            Route::any('del', 'admin\NoticeController@del');
            Route::any('upd', 'admin\NoticeController@upd');
            Route::any('update', 'admin\NoticeController@update');
        });

        #讲师管理
        Route::prefix('lect')->group(function () {
            Route::any('show', 'admin\LectController@show');//讲师展示
            Route::any('add', 'admin\LectController@add');//讲师渲染
            Route::any('addDo', 'admin\LectController@addDo');//讲师添加
            Route::any('del/{id}', 'admin\LectController@del');//讲师删除
            Route::any('upd/{id}', 'admin\LectController@upd');//讲师编辑
            Route::any('updDo/{id}', 'admin\LectController@updDo');//讲师修改
        });

        #题库模块
        Route::prefix('bank')->group(function () {
            Route::any('show', 'admin\BankController@show');//题库展示
            Route::any('add', 'admin\BankController@add');//题库添加
            Route::any('store', 'admin\BankController@store');//添加执行
            Route::any('Fdel', 'admin\BankController@Fdel');//题库分类删除
            Route::any('edit/{bank_id}', 'admin\BankController@edit');//题库修改
            Route::any('update/{bank_id}', 'admin\BankController@update');//修改执行
            Route::any('exam_add', 'admin\BankController@exam_add');//修改执行

        });

        #题库分类
        Route::prefix('anwsercate')->group(function () {
            Route::any('show', 'admin\AnwserCateController@show');//题库分类展示
            Route::any('add', 'admin\AnwserCateController@add');//题库分类添加
            Route::any('store', 'admin\AnwserCateController@store');//添加执行
            Route::any('Fdel', 'admin\AnwserCateController@Fdel');//题库分类删除
            Route::any('edit/{bank_cate_id}', 'admin\AnwserCateController@edit');//修改
            Route::any('update/{bank_cate_id}', 'admin\AnwserCateController@update');//修改执行

        });
        #考试模块
        Route::prefix('exam')->group(function () {
            Route::any('show', 'admin\PaperController@show');//考卷展示
            Route::any('info/{id}', 'admin\PaperController@info');//考卷的题库
            Route::any('exam_add', 'admin\PaperController@exam_add');//考试的添加
            Route::any('exam_add_do', 'admin\PaperController@exam_add_do');//考试的执行添加
            Route::any('add', 'admin\PaperController@add');//考卷添加
            Route::any('add_do', 'admin\PaperController@add_do');//添加执行
            Route::any('del', 'admin\PaperController@del');//题库分类删除
            Route::any('edit', 'admin\PaperController@edit');//考卷修改
            Route::any('update', 'admin\PaperController@update');//考卷执行修改

        });

        #导航栏
        Route::prefix('nav')->group(function () {
            Route::any('show', 'admin\NavController@show');
            Route::any('add', 'admin\NavController@add');
            Route::any('create', 'admin\NavController@create');
            Route::any('edit', 'admin\NavController@edit');
            Route::any('update', 'admin\NavController@update');
            Route::any('upd', 'admin\NavController@upd');
        });

        #问答展示
        Route::prefix('question')->group(function () {
            Route::any('show', 'admin\QuestionController@show');
        });
    });






// 前台
Route::prefix('index')->group(function(){
    // 问答
    Route::any('question/add','index\QuestionController@add');
    Route::any('question/response','index\QuestionController@response');
    Route::any('question/que','index\QuestionController@que');

    // 首页
    Route::any('','index\IndexController@index');
    // 登录
    Route::prefix('login')->group(function(){
        Route::any('','index\LoginController@login');
        Route::any('Do','index\LoginController@LoginDo');
    });
    // 注册
    Route::any('register','index\RegisterController@register');
    Route::any('save','index\RegisterController@save');
    Route::any('sendSmsCode','index\RegisterController@sendSmsCode');

    // 课程列表
    Route::prefix('course')->group(function(){
        Route::any('list','index\CourselistController@courselist');
    });

    // 课程详情
    Route::prefix('courseinfo')->group(function(){
        Route::any('cont','index\CoursecontController@coursecont');
    });
    # 资讯
    Route::prefix('consult')->group(function(){
        Route::any('show','index\ConsultController@show');
        Route::any('hot','index\ConsultController@hot');
        Route::any('move','index\ConsultController@move');
        Route::any('exam','index\ConsultController@exam');
    });
    # 题库
    Route::prefix('bank')->group(function(){
        Route::any('show','index\BankController@show');
        Route::any('php','index\BankController@php');
        Route::any('java','index\BankController@java');
        Route::any('bankinfo','index\BankController@bankinfo');
        Route::any('python','index\BankController@python');
        Route::any('c','index\BankController@c');
        Route::any('c++','index\BankController@cc');
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
        Route::any('save','index\DetailController@save');
        Route::any('ask','index\DetailController@ask');
        Route::any('answer','index\DetailController@answer');
        Route::any('show/{id}','index\DetailController@show');
    });

     # 视频
    Route::prefix('video')->group(function(){
        Route::any('show','index\VideoController@show');
    });

    # 个人中心
    Route::prefix('personal')->group(function(){
        # 课程
        Route::prefix('course')->group(function(){
             Route::any('show','index\personal\CourseController@show');
        });
        # 个人详情
        Route::prefix('personalinfo')->group(function(){
            Route::any('show','index\PersonalinfoController@show');
            Route::any('add','index\PersonalinfoController@add');
            Route::any('add_do','index\PersonalinfoController@add_do');
            Route::any('addimg','index\PersonalinfoController@addimg');
            Route::any('update','index\PersonalinfoController@update');
            Route::any('doupdate','index\PersonalinfoController@doupdate');
        });
    });

    # 题库
    Route::prefix('bank')->group(function(){
        Route::any('show','index\BankController@show');
    });

});

