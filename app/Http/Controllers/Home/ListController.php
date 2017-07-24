<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Type;
use App\Http\Model\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListController extends CommonController
{
    /**
     *  功能: 查询视频信息, 显示到列表页面
     * @param $tid 分类id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function  vlist($tid)
    {
//        echo $tid;die;
        // 判断 tid 是否是二级分类
        $type = $this->type;
        foreach($type as $k=>$v){
            if($tid == $v['tid']){
                return redirect('/v/'.$tid.'/index');
            }
        }

        // 本分类的信息
        $vtype = Type::where('tid',$tid)->first();
        // 本级所有分类的信息
        $types = Type::where('pid',$vtype['pid'])->get();


//         查询 tid 分类下的视频信息  20每页
//            $video = Video::where('tid',$tid)->orderBy('upload_time','desc');
//            $video -> user;

        $video = Video::leftjoin('user','video.uid','=','user.uid')->leftjoin('user_detail','video.uid','=','user_detail.uid')->leftjoin('video_detail','video.vid','=','video_detail.vid')->paginate(20);
//        // 调用IndexController中的 name 方法
//        $tmp = $video['data'];
//        $video['data'] = IndexController::name($tmp);
//        dd($video);

        // 热门视屏
//        $hotvideo =
        // 显示 页面
        return view("home.list.list", ['video'=>$video,'vtype'=>$vtype,'types'=>$types,'tid'=>$tid]);
    }
}
