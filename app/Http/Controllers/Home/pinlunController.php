<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class pinlunController extends Controller
{
   public function postPinlun(Request $request,$data)
   {     
    // dd(session('user'));
   	if(session('user')){

      $user=session('user');
   			//获得评论内容
            $a=$request->except('_token');

            $time=time();

            $photo=session('user')['photo'];
            
            DB::table('comment')->insert(['uid'=>$user['uid'],
                                          'vid'=>$data,
                                      'content'=>$a['content'],
                                        'ctime'=>$time,
                                        'photo'=>$user['photo'],
                                        'uname'=>$user['username']]);

            
            return back();

        }else{

        	header("refresh:3;url=http://www.nnn.com/login/login");
          print('您还没有登录,请先登录!<br><b>3</b>秒后自动跳转至登录页........');

        }
   }
}
