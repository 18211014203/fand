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

 // Route::get('/', function () {
 // 	phpinfo();
 //     return view('welcome');
 // });


// 后台路由
// 登录
Route::controller('admin/login','Admin\LoginController');

Route::group(['middleware'=>'auth'],function(){
	// 管理员管理路由
	Route::controller('admin/admin','Admin\AdminController');
	//友情链接管理路由
	Route::controller('admin/url','Admin\UrlController');
	// 用户管理路由
	Route::controller('admin/user','Admin\UserController');
	// 分类管理路由
	Route::controller('admin/type','Admin\TypeController');
	// 视频管理路由
	Route::controller('admin/video','Admin\VideoController');
	// 推荐视频管理路由
	Route::controller('admin/recommend','Admin\RecommendController');
	// 网站管理路由
	Route::controller('admin/config','Admin\ConfigController');
	//排行榜管理路由
	Route::controller('/rank','Admin\RankController');

});


// 前台路由
// 首页路由
Route::get('/','Home\IndexController@index');
// 二级分类展示页路由
Route::get('/v/{tid}/index','Home\IndexController@vindex');
// 列表页路由
Route::get('/list/{key}','Home\ListController@vlist');
// 注册路由
Route::controller('/reg','Home\RegController');
// 搜索路由
Route::get('/search','Home\SearchController@search');
//验证码
Route::get('/code','codeController@code');
// 登录路由
Route::controller('/login','Home\LoginController');
// 视频播放页路由
Route::get('/play/{vid}','Home\PlayController@play');
//评论管理
Route::controller('/pinlun','Home\pinlunController');
// 个人中心路由
Route::group(['middleware'=>'member'],function() {
    Route::controller('/member', 'Home\MemberController');
});
// 收藏
Route::get('/store','Home\PlayController@store');
// 网站联系信息
Route::get('info/about','Home\InfoController@about');
Route::get('info/contact','Home\InfoController@contact');
