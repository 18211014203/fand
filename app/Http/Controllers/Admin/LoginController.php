<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Hash;
class LoginController extends Controller
{ 
  //显示登录页
  public function getLogin()
  {
    return view('admin.login.login');
  }


  public function postInsert(Request $request)
  {
    //获取登录数据
    $a=$request->except('_token');

    //无账号或无密码或无验证码
    if($a['user']=='')
      { 
        return back()->with('error','账号不能为空'); 

      }else if($a['password']=='')

      {
       return back()->with('error','密码不能为空'); 

      }else if($a['yanzm']=='')

      { 
        return back()->with('error','验证码不能为空'); 
      }

      //当全都不为空时
      if($a['user']!='' && $a['password']!='' && $a['yanzm']!='')
      {     
            // 先存入闪存
            $request->flash();

            //校验管理员账号获得校验结果
            $b=DB::table('admin')->where('adminname',$a['user'])->first();

            if($b==null)
            {
              //判断账号是否存在用户表中
              return back()->with('error','该账号不存在!');

            }else
            {

              //判断哈希密码
              $hashPassword=Hash::check($a['password'],$b['password']);


              //账号存在判断密码
              if($hashPassword==false)
              {
                return back()->with('error','该账号密码错误!');

              }else

              if($a['yanzm'] != session('code') && $hashPassword==true)
              {
                return back()->with('error','您输入的验证码错误!');

              }else

              //全都通过登录首页
              if($hashPassword==true && $a['yanzm']==session('code'))
              {
                Session(['admin'=>$b['adminname']]);

                $time=time();

                DB::table('admin')->where('id',$b['id'])->update(['lastlogtime'=>$time]);

                return redirect('/admin/admin/index');
              }
            }

      }

  }

      //退出
    public function getQuit($user)
    { 
      // 清除session中的用户数据
      Session(['admin'=>null]);
      //返回登录页
      return redirect('/admin/login/login');
    }

}
