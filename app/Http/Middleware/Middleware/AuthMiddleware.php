<?php

namespace App\Http\Middleware\Middleware;

use Closure;
use Session;
use DB;
class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获得当前用户
        //获得当前访问页面路由
        $aa=\Route::current()->getActionName();
      
        //如果没有用户登录返回登录页
        if(session('admin')==null){

            return redirect('/admin/login/login');
        }

        $user=session('admin');

        //获得admin_id
        $a=DB::table('admin')->where('adminname',$user)->get();


        //获得jiaose_id
        $b=DB::table('admin_jiaose')->where('admin_id',$a[0]['id'])->get();

        //获取权限id
        $c=DB::table('jiaose_auth')->where('jiaose_id',$b[0]['jiaose_id'])->get();

         foreach ($c as $k => $v) 
         {
            $d[]=DB::table('auth')->where('id',$v['auth_id'])->get();
         }


         //获得当前用户的所有权限路由
        foreach ($d as $s => $m) {

             foreach ($m as $n => $k) {

                $h[]=$k['urlname'];

             }
        }

        
        //判断当前路由是否存在该用户角色的权限中
        if(in_array($aa,$h,true))
        {
            return $next($request);

        }else{

            return view('admin.auth.wuauth');
        }
        
    }
}
