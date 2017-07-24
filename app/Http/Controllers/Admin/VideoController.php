<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Tjvideo;
use App\Http\Model\Type;
use App\Http\Model\Video;
use App\Http\Model\Video_detail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class VideoController extends Controller
{
    /**
     *  视频 列表页展示, 条件查询结果
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(Request $request)
    {

        $search = $request -> all();

        $video = Video::join('type','type.tid','=','video.tid')
            -> join('user','video.uid','=','user.uid');

        if($request->has('key')){
            // 有关键字的话
            $key = $request->only('key');
            // 判断关键词是否分类名
            $type = Type::where('tname',$key['key'])->first();
            if($type){
                // 是的话 判断是几级分类
                if($type['pid']==0){
                    // 一级分类 的话 查二级分类并联查出user.name 和 video.*
                    // 分类 下的所有二级分类
                    $tids = Type::where('pid',$type['tid'])->select('tid')->get()->toArray();
                    foreach($tids as $k=>$v){
                        $tids[$k] = $v['tid'];
                    }
                    $video =$video  -> whereIn('video.tid',$tids);

                }else{
                    // 二级分类的话 直接联查出video的结果
                  $video = $video-> where('video.tid',$type['tid']);
                }

            }else{
                // 不是分类名  则查询为title标题或label标签是否含有 $key['key']
                $video = $video ->where('video.title','like','%'.$key['key'].'%')
                    ->orWhere('video.label','like','%'.$key['key'].'%');
            }
        }

        $video = $video->select('video.*','user.name','type.tname')->paginate(7);
//        dd($video);
        // 定义video.status视频的状态
        $status = ['0'=>'未知','1'=>'审核中','2'=>'审核通过','3'=>'冻结','4'=>'推荐'];


        // 传入视图
        return view('admin/video/index',compact('video','status','search'));
    }

    /**
     * 显示添加页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdd()
    {

        $type = Type::where('pid',0)->get()->toArray();
        $type2 = [];
        foreach($type as $value){
            $type2[] = Type::where('pid',$value['tid'])->get()->toArray();
        }

        return view('admin.video.add',compact('type','type2'));
    }

    /**
     *  在视频表中插入一条视频
     * @param Request $request
     */
    public function postDoadd(Request $request)
    {

        $data = $request -> all();
        // 验证 表单信息
        $validator =  \Validator::make($data,[
            'type' => 'required',
            'tid' => 'required',
            'title' => 'required|between:2,50',
            'timg' => 'required',
            'label' => 'required|max:255',
            'desc' => 'required|max:200',
        ],[
            'type.required'=>'分类必选',
            'tid.required'=>'二级分类必选',
            'title.required'=>'标题必填',
            'title.between'=>'标题位数为2-50位',
            'timg.required'=>'图片必须上传',
            'label.required'=>'标签必填',
            'label.max'=>'标签不能超过255个字符',
            'desc.required'=>'描述必填',
            'desc.required'=>'描述不能超过200个字符',
        ]);
        if ($validator->fails()) {
            return redirect('admin/video/add')
                ->withErrors($validator)
                ->withInput();
        }

        // 获取主表的信息
        $video = $request ->only('tid','label','title');
        $video['img'] = $data['timg'];
        $video['upload_time'] = time();
        $video['status'] = 1;
        $video['comment'] = 0;
        $video['click'] = 0;
        if(!$request->has('uid')){
            $video['uid'] = 0;
        }
        // 副表信息
        $video_detail = $request -> only('desc','video');

        //开启事务
        DB::beginTransaction();

        $res1 = Video::insertGetId($video);
        if($res1){
            $video_detail['vid'] = $res1;
            $res2 = Video_detail::insert($video_detail);
        }
        // 判断
        if($res1&&!empty($res2)&&$res2){
            DB::commit();
            return redirect('admin/video/index')->with('success','添加成功');
        }else{
            DB::rollBack();
            return redirect('admin/video/add')->with('error','添加失败');
        }


    }

    /**
     *  uploadify 上传视频video
     * @return string
     */
    public function postUpload()
    {

//          dd(Input::all());
        $file = Input::file("Filedata");

        if(!$file) return 'aabb';
        if($file->isValid()){
            // 获得上传文件的后缀名
            $extension = $file -> getClientOriginalExtension();
//            return $extension;
            $fileTypes = array('mp4','mkv','avi','swf','wmv');
            if (in_array($extension,$fileTypes)){
                // 获得新的名字
                $newName = date('YmdHis').mt_rand(1000,9999).'.'.$extension;

                // 移动到public/video下
                $path = $file->move(public_path().'/'.Config('web.video_path'),$newName);

                //
                $filePath = '/'.Config('web.video_path').'/'.$newName;
                return $filePath;
            }else{
                return 2;
            }

        }else{
            return 2;
        }
    }

    /**
     * 进入详情页 , 修改或进行审核操作
     * @param $tid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDetail($tid)
    {
        $video = Video::join('video_detail','video.vid','=','video_detail.vid')
            ->join('type','type.tid','=','video.tid')
            ->join('user','user.uid','=','user.name')
            ->select('video.*','video_detail.*','type.tname','user.name')
            ->where('video.vid','=',$tid)->first();

        return view('admin.video.edit',compact('video'));
    }

    /**
     *  保存修改
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDoedit(Request $request)
    {
//        dd(Input::get('timg'));
        $vid = $request -> only('vid');

        // video 表
        $res = Video::find(Input::get('vid'));
        $res -> title = Input::get('title');
        $res -> label = Input::get('label');
        if(Input::get('timg')!=''){
            $res -> img = Input::get('timg');
        }
        // detail 表
        $res_detail = Video_detail::find($vid)->first();
        $res_detail -> desc = Input::get('desc');

        // 开启事务
        DB::beginTransaction();
        $res1 =  $res -> update();
        $res2 =  $res_detail -> update();
        // 判断
        if($res1&&$res2){
            DB::commit();
            return redirect('admin/video/index')->with('success','修改成功');
        }else{
            DB::rollBack();

            return back() -> with('error','修改失败');
        }

    }

    /**
     * 通过审核
     * @param $vid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getCheck($vid)
    {
        $video = Video::find($vid);
//        dd($video);
        $res = $video -> update(['status'=>2]);
        if($res){
            return redirect('admin/video/index')->with('success','通过审核成功');
        }else{
            return redirect('admin/video/index') -> with('error','审核失败');
        }
    }

    /**
     * 删除
     * @param $vid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($vid)
    {
//        echo $vid;
        DB::beginTransaction();
        $res1 = Video::destroy($vid);
        $res2 = Video_detail::destroy($vid);
        // 判断
        if($res1&&$res2){
            DB::commit();
            return redirect('admin/video/index')->with('success','删除成功');
        }else{
            DB::rollBack();
            return redirect('admin/video/index') -> with('error','删除失败');
        }



    }

    /**
     * 冻结一条视频
     * @param $vid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getFreeze($vid)
    {
        $video = Video::find($vid);
//        dd($video);
        $res = $video -> update(['status'=>3]);;
        if($res){
            return redirect('admin/video/index')->with('success','操作成功');
        }else{
            return back() -> with('error','操作失败');
        }
    }

    /**
     * 解冻
     * @param $vid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getUnfreeze($vid)
    {
        $video = Video::find($vid);
//        dd($video);
        $res = $video -> update(['status'=>2]);;
        if($res){
            return redirect('admin/video/index')->with('success','操作成功');
        }else{
            return back() -> with('error','操作失败');
        }
    }

    /**
     * 设置为推荐
     * @param $vid
     * @return int|string
     */
    public function getRecommend($vid)
    {
        $video = Video::find($vid);
        DB::beginTransaction();
        $res = $video -> update(['status'=>4]);
        $data = Video::join('video_detail','video.vid','=','video_detail.vid')
            ->where('video.vid',$vid)
            ->select('video.*','video_detail.desc')
            ->get()->toArray()[0];
        $data['tjstatus'] = 0;

        $res2 = Tjvideo::create($data);
        if($res && $res2){
            return 'aaa';
        }else{
            return 2;
        }
    }

}
