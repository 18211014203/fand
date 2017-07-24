<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Type;
use App\Http\Model\User;
use App\Http\Model\Video;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TypeController extends Controller
{
    /**
     *  显示首页
     * @param int $tid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
      public function getIndex($tid=0)
      {


          // 若没有传入 tid 则查询根分类下的
          if($tid==0){
              $type = Type::orderBy('order')->where('pid',0)->get()->toArray();
              foreach($type as $k=>$v){
                  $type[$k]['pname'] = '顶级分类';
              }
          }else{
              $type = Type::orderBy('order')->where('pid',$tid)->get()->toArray();
              $pname = Type::where('tid',$tid)->first()['attributes']['tname'];

              foreach($type as $k=>$v){
                  $type[$k]['pname'] = $pname;
              }
          }

          return view('admin.type.index',compact('type'));
      }

    /**
     *  显示添加页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
      public function getAdd()
      {
          $type = Type::orderBy('order')->where('pid',0)->get();
          return view('admin.type.add',compact('type'));
      }

    /**
     *  ajax上传图片
     * @return string
     */
      public function postUpload()
      {
//          dd(Input::all());
          $file = Input::file("img");
          if(!$file) return 'aabb';
          if($file->isValid()){
              // 获得上传文件的后缀名
              $extension = $file -> getClientOriginalExtension();
//            return $extension;
              // 获得新的名字
              $newName = date('YmdHis').mt_rand(1000,9999).'.'.$extension;

              // 移动到public下
              $path = $file->move(public_path().'/'.Config('web.img_path'),$newName);

              //
              $filePath = '/'.Config('web.img_path').'/'.$newName;
              return $filePath;
          }
      }

    /**
     *  分类 信息 提交添加
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDoadd(Request $request)
    {

        $data = $request -> only('pid','tname','timg');
         $validator =  Validator::make($data,[
            'pid' => 'required',
            'tname' => 'required|between:2,8',
            'timg' => 'required'
        ],[
            'pid.required'=>'父分类必选',
            'tname.required'=>'分类必填',
            'tname.between'=>'分类名在2-8位',
            'timg.required'=>'分类图片必须上传'
        ]);
        if ($validator->fails()) {
            return redirect('admin/type/add')
                ->withErrors($validator)
                ->withInput();
        }
        $data['order'] = 1;
         $res = Type::insert($data);

        if($res){
            return redirect('/admin/type/index')->with('success','添加成功');
        }else{
            $request -> flash();
            return redirect('/admin/type/add')->with('error','添加失败');
        }
    }

    /**
     *  排序
     * @param Request $request
     * @return array
     */
    public function getOrder(Request $request)
    {
//        dd($request->all());
        $data = $request -> all();
        $res = Type::where('tid',$data['tid'])->update(['order'=>$data['order']]);

        if($res){
            return  [
                'status'=>200,
                'msg'=>'修改排序成功'
            ];
        }else{
            return  [
                'status'=>403,
                'msg'=>'修改排序失败'
            ];
        }
    }

    /**
     * 修改页面
     * @param $tid
     */
    public function getDetail($tid)
    {
//        dd($tid);
        $type = Type::where('tid',$tid)->first();
//        dd($type);
        if($type['pid']==0){
            $type['pname'] = '顶级分类';
        }else{
            $type['pname'] =  Type::where('tid',$type['pid'])->first()['attributes']['tname'];
        }
        return view('admin.type.edit',compact('type'));
    }

    /**
     *  执行修改
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request)
    {
//        dd($request->all());

        $data = $request -> except('_token','img');
        $validator =  Validator::make($data,[
            'tname' => 'required',
            'timg' => 'required'
        ],[
            'tname.required'=>'分类名不能为空',
            'timg.required'=>'分类图片必须提交',
        ]);
        if ($validator->fails()) {
            return redirect('admin/type/add')
                ->withErrors($validator)
                ->withInput();
        }

        $res = Type::where('tid',$data['tid'])->update($data);

        //        dump($res);

        if($res){
            return redirect('admin/type/index')->with('修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除
     * @param $tid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($tid)
    {
        // 该分类下有没有子分类
        $res1 = Type::where('pid', 'tid')->get();
        // 该分类下有没有视频
        $res2 = Video::where('tid', $tid)->first();
        if ($res1 || $res2){
            return back()->with('error','该分类下不为空');
        }
        // 删除
        $res = Type::where('tid',$tid)->delete();

        if($res){
            return redirect('/admin/type/index')->with('error','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
