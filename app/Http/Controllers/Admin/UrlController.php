<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;

class UrlController extends Controller
{
 //获取友情链接
   public function getUrl()
   {

        $data=DB::table('url')->paginate(5);

        return view('admin.url.url',compact('data'));
   }

   //显示修改链接表单
   public function getEdit($id)
   {    
        $data=DB::table('url')->where('id',$id)->first();

        return view('admin.url.editurl',compact('data'));
   }

   //接收修改表单数据
   public function postEdits(Request $request)
   {
        $data=$request->except('_token');

        $file=$data['img'];

        //logo后缀
        $type=$request->file('img')->getClientOriginalExtension();

        //上传后的名字
        $name=str_random(10).time();

        // 移动到的路径
        $uploadUrl='uploads/urllogo/'.$name.'.'.$type;

        //移动文件
        $a=$file->move('./uploads/urllogo/',$uploadUrl);
 
        DB::table('url')->where('id',$data['id'])->update(['img'=>$uploadUrl,'name'=>$data['name'],'url'=>$data['url']]);

        return redirect('/admin/url/url');
   }

   //删除指定链接数据
   public function getDelete($id)
   {        

        //获取要删除文件的路径
          $data=DB::table('url')->where('id',$id)->first();

          $url='.'.$data['img'];
          //删除文件
          unlink($url);
          //删除数据库中的该文件数据
          DB::table('url')->where('id',$id)->delete();

          return redirect('/admin/url/url');
   }

   //设置推荐状态
   public function getStatus()
   {
        //获取数据
        $id=$_GET['id'];

        $status=$_GET['status'];

        if($status)
        {
            $num=DB::table('url')->where('id',$id)->update(['status'=>0]);

            echo $num;
            
        }else{
            $num=DB::table('url')->where('id',$id)->update(['status'=>1]);

            echo $num;

        }

   }


   //显示添加链接的表单
   public function getInserturl()
   {
        return view('admin.url.inserturl');
   }

   //接收数据并修改,返回展示页
   public function postUrldata(Request $request)
   {
        $data=$request->except('_token');

        $file=$data['img'];

        //logo后缀
        $type=$request->file('img')->getClientOriginalExtension();

        //上传后的名字
        $name=str_random(10).time();

        // 移动到的路径
        $uploadUrl='/uploads/urllogo/'.$name.'.'.$type;

        //移动文件
        $file->move('./uploads/urllogo/',$uploadUrl);

        //将数据加入数据库中
        DB::insert('insert into url(name,img,url) values(?,?,?)',[$data['name'],$uploadUrl,$data['url']]);

        return redirect('/admin/url/url');
   }

}
