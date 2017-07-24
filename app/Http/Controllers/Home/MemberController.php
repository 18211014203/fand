<?php

namespace App\Http\Controllers\Home;



use App\Http\Model\Type;
use App\Http\Model\User_brower;
use App\Http\Model\User_detail;
use App\Http\Model\User;
use App\Http\Model\Video_detail;
use \DB;

use App\Http\Model\User_store;
use App\Http\Model\Video;
use Barryvdh\Debugbar\Middleware\Debugbar;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class MemberController extends CommonController
{
    public function __construct()
    {

        $user = session('user');

        view() -> share('user',$user);
        parent::__construct();
    }
    /**
     * 用户个人中心页
     * 显示数据
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function getInfo()
    {
        return view('home.mem.mem');
    }

    /**
     *  功能  个人扩展信息修改
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(Request $request)
    {

        $data = $request -> all();

        // 接收并处理要修改的数据
        $data2 = $request -> except("uid","_token","province","city",'photo');
        $data2["address"] = $data['province'].'-'.$data['city'];



        foreach($data2 as $k=>$v){
            if($v==''){
                unset($data2[$k]);
            }
        }

        $res = User_detail::where("uid",$data["uid"])->update($data2);
        if($res){
            $user = User::find($data['uid'])->toArray();
            $user_detail = User::find($data['uid'])->detail() ->get()->toArray()[0];

             $user = array_merge($user,$user_detail);
            session(['user'=>$user]);
            return redirect("/member/info")->with("success","扩展信息修改成功");
        }else{
            return redirect("/member/info")->with("error","扩展信息修改失败");
        }
    }

    /**
     *
     *  功能: 利用ajax 修改头像 保存头像的路径
     * @param Request $request
     * @return string
     */
    public function postUpload(Request $request)
    {
//        dd(Input::all());
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
            $res = User_detail::find(Input::get('uid'))->update(['photo'=>$filePath]);
            if($res){
                $user = Session::get('user');
                $user['photo'] = $filePath;
                Session::put('user',$user);
                return $filePath;
            }else{
                return 'aabb';
            }

        }

    }

    /**
     * 功能:  显示 视频上传 提交页面
     *
     */
    public function getVideo()
    {

        return view("home.mem.video");
    }

    /**
     *  ajax上传图片
     * @return string
     */
    public function postImage()
    {
        $file = Input::file("image");
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
     *  uploadify 上传视频video
     * @return string
     */
    public function postVideoupload()
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
     *  表中插入一条视频
     * @param Request $request
     */
    public function postUvid(Request $request)
    {

        $data = $request -> all();
        // 验证 表单信息
        $validator =  \Validator::make($data,[
            'type' => 'required',
            'tid' => 'required',
            'title' => 'required|between:2,8',
            'img' => 'required',
            'label' => 'required|max:255',
            'desc' => 'required|max:200',
        ],[
            'type.required'=>'分类必选',
            'tid.required'=>'二级分类必选',
            'title.required'=>'标题必填',
            'title.between'=>'标题位数为6-8位',
            'img.required'=>'图片必须上传',
            'label.required'=>'标签必填',
            'label.max'=>'标签不能超过255个字符',
            'desc.required'=>'描述必填',
            'desc.required'=>'描述不能超过200个字符',
        ]);
        if ($validator->fails()) {
            return redirect('member/video')
                ->withErrors($validator)
                ->withInput();
        }

        // 获取主表的信息
        $video = $request ->only('tid','label','title','img');
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
            return redirect('member/manner')->with('success','添加成功');
        }else{
            DB::rollBack();
            unlink(Input::get('video'));
            return redirect('member/video')->with('error','添加失败');
        }


    }

    /**
     * 过往投稿
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getManner()
    {

        $video = Video::join('video_detail','video_detail.vid','=','video.vid')
            ->join('type','type.tid','=','video.tid')
            ->select('video.*','video_detail.*','type.tname')
            ->where('uid',session('user')['uid'])
            ->orderBy('upload_time','desc')-> get();
//        dd($video);
        return view('home.mem.manner',compact('video'));
    }

    /**
     * ajax 发送数据 查询各分类的数据
     * @param Request $request
     */
    public function postData(Request $request)
    {

        // 接收参数
        $uid = Input::get('uid');
        $tid = Input::get('tid');

        // 查询tid分类的数据
        $video = Video::join('video_detail','video_detail.vid','=','video.vid')
            ->join('type','type.tid','=','video.tid')
            ->select('video.*','video_detail.*','type.tname')
            ->where('uid',$uid);
        // 判断tid 若为0 (所有分区) 不加限制条件
        if($tid==0){

        }else{
            //tid  不为0 查询一级分类下的分类
            $tids = Type::where('pid',$tid)->select('tid')->get()->toArray();
            foreach($tids as $k=>$v){
                $tids[$k] = $v['tid'];
            }
            // whereIn tid 所属分类的视频
            $video = $video
                ->whereIn('video.tid',$tids);
        }

        $video = $video
            ->orderBy('upload_time','desc')-> get();

        if(count($video)==0){
            return '<p class="alert">尚未有任何投稿。</p>';
        }else{
            // 拼接 html 代码
            $str = '<div data-tid="0" data-uid="'.$uid.'" class="item block">';
            foreach($video as $k=>$v){
                $str .= '<div class="inner" style="overflow:hidden;">
                                <p class="hint-list-index">'.($k+1).'</p>
                                <div class="l">
                                    <a target="_blank" href="javascript:;" class="thumb thumb-preview">
                                        <img data-aid="'.$v['vid'].'" src="'.$v['img'].'" class="preview">
                                        <div class="cover"></div>
                                   </a>
                          </div>';
                $str .= '  <div class="r">
                                    <p class="block-title">';
                $str .= '<a href="v'.$v['tid'].'/index"  target="_blank" class="channel">'.$v['tname'].'</a>
                                        <a data-aid="3812968" target="_blank" href="" title="" style="" class="title">'.$v['title'].'</a>

                                        </p>';

                $str .= '<div class="info">发布于
                                        <span class="time">'.date('m月d日(星期w) H时i分',$v['upload_time']).'</span>&nbsp;&nbsp;/&nbsp;&nbsp;播放:
                                        <span class="views pts">'.$v['click'].'</span>&nbsp;&nbsp;评论:

                                        <span class="favors pts">'.$v['comment'].'</span></div>
                                    <p class="desc">'.$v['desc'].'</p>
                                    <div class="area-tag">';
                $str .= '<a class="tag" href="/search/#query=dsf" target="_blank"></a></div>
                    </div>
                <span class="clearfix"></span>
                </div>';

            }
            $str .= '</div>';
            return $str;

        }
        return $video;
    }

    /**
     *  显示收藏页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCollect(Request $request)
    {

        $video = User_store::join('video','video.vid','=','user_store.vid')
            ->join('type','type.tid','=','video.tid')
            ->join('user','user.uid','=','user_store.uid')
            ->join('video_detail','video.vid','=','video_detail.vid');
        // tid 分类有的话
        if(Input::get('tid')){
            $tid = Input::get('tid');
            if($tid != "all"){
                $tids = Type::where('pid',Input::get('tid'))->select('tid')->get()->toArray();
                foreach($tids as $k=>$v){
                    $tids[$k] = $v['tid'];
                }
                // whereIn tid 所属分类的视频
                $video = $video
                    ->whereIn('video.tid',$tids);
            }

        }
        $video = $video->where('user_store.uid',session('user')['uid'])
            ->orderBy('user_store.storetime','desc')
            ->paginate(5);

        return view('home.mem.shoucang',compact('video'));
    }

    /**
     * 删除收藏
     * @param $id
     * @return array
     */
    public function getCollectdel($id)
    {

            $res = User_store::destroy($id);


        if($res){
            return [
                'status'=>200,
                'msg'=>'删除成功',
            ];
        }else{
            return [
                'status'=>403,
                'msg'=>'删除失败',
            ];
        }
    }

    /**
     *  显示历史页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHistory()
    {
        $video = User_brower::join('video','video.vid','=','user_brower.vid')
            ->join('type','type.tid','=','video.tid')
            ->join('user','user.uid','=','user_brower.uid')
            ->where('user_brower.uid',session('user')['uid'])
            ->orderBy('user_brower.looktime','desc')
            ->paginate(5);

        return view('home.mem.history',compact('video'));
    }

    /**
     * 历史记录删除
     * @param $id
     * @return array
     */
    public function getDel($id)
    {
        if($id == 'all'){
            $res = User_brower::where('uid',session('user')['uid'])->delete();
        }else{
            $res = User_brower::destroy($id);
        }

        if($res){
            return [
                'status'=>200,
                'msg'=>'删除成功',
            ];
        }else{
            return [
                'status'=>403,
                'msg'=>'删除失败',
            ];
        }
    }

}




