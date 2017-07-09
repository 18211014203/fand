<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 Route::get('/', function () {
     return view('welcome');
 });
// 后台路由
// 登录
Route::controller('admin/login','Admin\LoginController');
// 管理员管理路由
Route::controller('admin/admin','Admin\AdminController');
// 用户管理路由
Route::controller('admin/user','Admin\UserController');
// 分类管理路由
Route::controller('admin/type','Admin\TypeController');
// 视频管理路由
Route::controller('admin/video','Admin\VideoController');
// 网站管理路由
Route::controller('admin/config','Admin\ConfigController');


// 前台路由
// 首页路由
Route::get('/index','Home\IndexController@index');
// 二级分类展示页路由
Route::get('/v/{tid}/index','Home\IndexController@vindex');
// 列表页路由
Route::get('/list/{key}','Home\ListController@vlist');
// 注册路由
Route::controller('/reg','Home\RegController');
//验证码
Route::get('/code','codeController@code');
// 登录路由
Route::controller('/login','Home\LoginController');
// 视频播放页路由

Route::get('/play/{vid}','Home\PlayController@play');
//评论管理
Route::controller('/pinlun','Home\pinlunController');

// 个人中心路由
Route::controller('/member','Home\MemberController');
