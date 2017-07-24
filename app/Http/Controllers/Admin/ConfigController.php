<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ConfigController extends Controller
{
    /**
     * 显示网站配置config表的数据 至页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function  getIndex()
    {
        // 获取config 表中的数据
        $config = Config::first();
        //配置管理
        return view('admin/config/index',compact('config'));

    }

    /**
     * 修改config网站配置
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDoedit(Request $request)
    {
        $data = $request->all();
        $validator =  \Validator::make($data,[
            'title' => 'required|between:2,10',
            'keys' => 'required|between:4,50',
            'logo' => 'required',
            'copyright' => 'required|max:50',
            'width_image_title' => 'required|max:10',
            'width_image' => 'required',
            'descript' => 'required|max:255',
            'about' => 'required',
            'contact' => 'required',
            'img_path' => 'required',
            'video_path' => 'required',
        ],[
            'title.required'=>'网站标题必须有',
            'title.between'=>'网站标题长度应在2-10位',
            'keys.required'=>'网站关键字必填',
            'keys.between'=>'网站关键字长度应在4-50位',
            'logo.required'=>'网站logo图片必须上传',
            'copyright.required'=>'版权必填',
            'copyright.max'=>'版权信息不能超过50个字符',
            'width_image_title.required'=>'宽图标题不能为空',
            'width_image_title.max'=>'宽图标题不能超过10个字符',
            'width_image.required'=>'宽图必须上传',
            'descript.required' => '网站描述不能为空',
            'descript.max' => '网站描述不能超过255个字符',
            'about.required' => '关于我们内容不能为空',
            'contact.required' => '联系我们内容不能为空',
            'img_path.required' => '图片上传路径不能为空',
            'video_path.required' => '视频上传路径不能为空',

        ]);
        if ($validator->fails()) {
            return redirect('admin/config/index')
                ->withErrors($validator)
                ->withInput();
        }

        $res = Config::find(Input::get('id'))->update($request->except('_token','id'));
        // 判断
        if($res){
            return redirect('admin/config/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }


    public function postUpdate()
    {
        $config = Config::first()->toArray();
//        dd($config);
        // 拼成web.php 中的格式
        $str = "<?php
        return [
        ";
        foreach($config as $k=>$v){
            $str .= "'".$k."'=>'".$v."',
            ";
        }
        $str .= "];";

        $res = file_put_contents(config_path().'/web.php',$str);
        if($res){
            return [
                'status' => 200,
                'msg' => '更新成功'
            ];
        }else{
            return [
                'status' => 403,
                'msg' => '更新失败'
            ];
        }

    }




}
