<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Type;
use App\Http\Model\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SearchController extends CommonController
{
    public function search(Request $request)
    {
        $search = $request -> all();


        $video = Video::join('type','type.tid','=','video.tid')
            -> join('user','video.uid','=','user.uid')
            -> join('video_detail','video_detail.vid','=','video.vid');

        if($request->has('key')){
            // 有关键字的话
            $key = $request->only('key');
            // 判断关键词是否分类名
            $type = Type::where('tname',$key['key'])->first();
            if($type){
                // 是的话 判断是几级分类
                if($type['pid']==0){
                    // 一级分类 的话 查二级分类并联查出user.name 和 video.*
                    $video =$video  -> where('type.pid',$type['tid']);
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
        // 如果有tid的话
        if(Input::has('tid')){
            if(Input::get('tid')==0){

            }else{
                $video = $video -> where('type.pid',Input::get('tid'));
            }

        }
        // 如果有order的话
        if(Input::has('order')){
            switch(Input::get('order')){
                case 'releaseDate':
                    $video = $video -> orderBy('upload_time','desc');
                    break;
                case 'click':
                    $video = $video -> orderBy('click','desc');
                    break;
                case 'comment':
                    $video = $video -> orderBy('comment','desc');
                    break;
            }
        }
        $video = $video->select('video.*','user.name','type.tname','video_detail.desc')->paginate(5);



        // 传入视图
        return view('home.search.search',compact('video','status','search'));
    }

}