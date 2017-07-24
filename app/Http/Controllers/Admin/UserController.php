<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
     //用户管理
   public function getUser()
   {    


        //获取所有用户
        // $user = DB::table('user')->paginate(5);
        $user = DB::table('user')->join('user_detail','user.uid','=','user_detail.uid')->paginate(5);
        
        return view('admin.user.user',compact('user'));
   }

    //用户详情列表
   public function getDetail(Request $request,$id)
   {

        $data=DB::table('user_detail')->where('uid',$id)->first();

        $user=DB::table('user')->where('uid',$id)->first();

        $user['regtime']=date('Y年m月d H时i分s秒',$user['regtime']);

        $data['birth']=date('Y年--m月--d日',$data['birth']);

        $reg=array_merge($data,$user);

        return view('admin.user.detail',compact('reg'));
   }

   //删除指定用户所有数据
   public function getDelete($id)
   {   
      
     DB::table('user')->where('uid',$id)->delete();

     DB::table('user_detail')->where('uid',$id)->delete();

     return redirect('/admin/user/user');
    
   }

   //获取修改后的用户资料
   public function postUpdate(Request $request)
   {    
        $a=$request->except(['_token']);

        $b=DB::table('user')->where('uid',$a['uid'])
                            ->update(['tel'=>$a['tel'],'name'=>$a['name']]);

        $c=DB::table('user_detail')->where('uid',$a['uid'])
                                   ->update(['sign'=>$a['sign'],
                                            'birth'=>$a['birth'],
                                            'email'=>$a['email'],
                                              'sex'=>$a['sex']]);

        return redirect('/admin/user/user');
   }

   //添加用户
   public function getInsert()
   {    
        //显示添加表单
        return view('admin.user.insert');
   }



   // 获取添加用户表单的所有数据
   public  function postData(Request $request)
   {   
        //设置规则
        $role=array(
                'username'=>'required|max:10', 
                'password'=>'required',
                   'email'=>'required|email',
                     'tel'=>'required|max:11'
            );

        //设置错误提示信息
        $errormassge=array(
                'username.required'=>'用户名必填!',
                'password.required'=>'密码必填!',
                     'username.max'=>'用户名最大长度为10',
                   'email.required'=>'邮箱必填!',
                      'email.email'=>'邮箱不符合规则!',
                     'tel.required'=>'电话号码必填!',
                          'tel.max'=>'电话长度为11位!',
            );

        //判断是否有文件上传
        if($request->hasFile('photo'))
        {
            $data=$request->except('_token');

            $ss=DB::table('user')->where('username',$data['username'])->first();

            if($ss)
            {
                return back()->with('errora','该账号已被使用!');

            }else{



                    $data['birth']=$data['year'].'-'.$data['month'].'-'.$data['day'];

                    $data['birth']=strtotime($data['birth']);

                    unset($data['year']);

                    unset($data['month']);

                    unset($data['day']);

                    //注册时间
                    $data['regtime']=time();

                    $file= $request -> photo;

                    //随机一个文件名
                    $a=rand(0000,9999).time();

                    //获取上传文件的后缀
                    $hz='.'.$request->file('photo')->getClientOriginalExtension();

                    //设置文件url
                    $res = $file->move('uploads/image',$a.$hz);

                    //头像地址
                    $url='/uploads/image/'.$a.$hz;

                    //将$data['password']加密哈希
                    $data['password']=Hash::make($data['password']);
                    
                  
                    //将部分数据存入user表
                    $num=DB::table('user')->insertGetId(['username'=>$data['username'],
                                                         'password'=>$data['password'],
                                                          'regtime'=>$data['regtime'],
                                                              'tel'=>$data['tel'],
                                                             'name'=>$data['name']]);

                    //将部分数据存入user_detail表
                    DB::table('user_detail')->insert(['uid'=>$num,
                                                      'sex'=>$data['sex'],
                                                    'email'=>$data['email'],
                                                    'birth'=>$data['birth'],
                                                     'sign'=>$data['sign'],
                                                    'photo'=>$url]);

                    //完成后跳转至用户列表
                    return redirect('/admin/user/user');

            } 
                }else{

                    //不通过返回
                    return back()->with('error','头像不能为空!');
                }

}
        // 搜索
    public function postSearch(Request $request)
    {
        $data=$request->except('_token');
        // $data['keys']; 关键字 用户名或者是电话
        // $data['agemin']; 最小年龄
        // $data['agemax']; 最大年龄
        
         //什么都不输入返回用户列表页
        if($data['keys']=='' && $data['agemax']=='' && $data['agemin']=='')
        {
           return back();
        }


        //如果只输入用户名或电话

        if(!empty($data['keys']) && $data['agemin']=='' && $data['agemax']=='')
        {   
          $user=DB::table('user')->where('username',$data['keys'])
                                 ->orwhere('tel',$data['keys'])
                                 ->paginate(5);

            return view('admin.user.user',compact('user'));
        }

        //如果只输入年龄
        if($data['keys']=='')
        {
            //最大年龄
            if( $data['agemin']=='' && $data['agemax']!='')
            {
              $user=DB::table('user_detail')->join('user','user_detail.uid','=','user.uid')                            ->whereBetween('age',[0,$data['agemax']])
                                            ->paginate(5);
            }

            //最小年龄
            if($data['agemax']=='' && $data['agemin']!='')
            {
              $user=DB::table('user_detail')->join('user','user_detail.uid','=','user.uid')                            ->whereBetween('age',[$data['agemin'],100])
                                            ->paginate(5);
            }
          
            //年龄区间
            if($data['agemax']!='' && $data['agemin']!='')
            {
              $user=DB::table('user_detail')->join('user','user_detail.uid','=','user.uid')                            ->whereBetween('age',[$data['agemin'],$data['agemax']])
                                            ->paginate(5);
            }

            return view('admin.user.user',compact('user'));
        }
      
        // 全都输入
        if($data['keys']!='' && $data['agemax']!='' && $data['agemin']!='')
        {
           $user=DB::table('user_detail')
                               ->join('user','user_detail.uid','=','user.uid')
                               ->whereBetween('age',[$data['agemin'],$data['agemax']])
                               ->where('username',$data['keys'])
                               ->orwhere('tel',$data['keys'])
                               ->get();

           if(empty($user))
           {
              //??????
              return back()->with('error','没有您要查询的相关数据!');

           }else{

              return view('admin.user.user',compact('user'));
           }
        }

       
    } 


    //修改指定用户密码显示密码修改表单
    public function getEditpsw($use)
    {
        $user=DB::table('admin')->where('adminname',$use)->first();

        return view('admin.user.editpsw',compact('user'));
    }


    // 修改密码
    public function postEditpsws(Request $request)
    {
        $data=$request->except(['_token']);

        $user=DB::table('admin')->where('id',$data['id'])->first();

        if(   
              $user['password']==$data['oldpassword'] && 
              $data['newpassword']==$data['newpasswords'])
          {

          //加密$data['newpasswords']哈希
          $data['newpassword']=Hash::make($data['newpassword']);

          DB::table('admin')->where('id',$data['id'])
                            ->update(['password'=>$data['newpassword']]);

          session('user',null);

          return redirect('/admin/login/login');

        }else{

          return back()->with('error','修改失败,请重新输入!');
        }

    }


    //接收ajax
    public function getOld()
    {

      $data=$_GET;

      $user=DB::table('admin')->where('id',$data['id'])->first();

      //解析哈希密码
      $hashpassword=Hash::Check($data['oldpassword'],$user['password']);
      
      if($data['oldpassword']=='')
        {
          echo '旧密码不能为空!';
          
        }

      if(!empty($data['oldpassword']) && $hashpassword==flase)
        {
          echo '旧密码不正确,请确重新输入!';
        }

    }

}

?>