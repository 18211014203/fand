<?php

namespace App\Http\Controllers\Home;



use App\Http\Controllers\Home\CommonController;

use App\Http\Model\Adver;
use App\Http\Model\Tjvideo;
use App\Http\Model\Type;
use App\Http\Model\Url;
use App\Http\Model\User;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Session;

class IndexController extends CommonController
{
    /**
     *  获取 数据 显示首页内容
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        // 获取 双图广告
        $adver = Adver::orderBy("aid") -> take(2) -> get();

        // 获取 各种推荐
        // top 推荐 6 + 猴子推荐 5
//        $top = self::_get('Tjvideo',6,3);
        $top = Tjvideo::join('user','user.uid','=','tjvideo.uid')
            ->where('tjstatus',3)->orderBy('order')
            ->select('tjvideo.*','user.name')->take(6)->get()->all();



        $monkey = Tjvideo::join('user','user.uid','=','tjvideo.uid')
            ->where('tjstatus',4)->orderBy('order')
            ->select('tjvideo.*','user.name')->take(5)->get();

//        echo time();
        // 轮播图推荐 6
        $lunbo = Tjvideo::join('user','user.uid','=','tjvideo.uid')
            ->where("tjstatus",2)->orderBy('order')
            ->select('tjvideo.*','user.name')->take(6)->get();

        // 遍历分类 获取 栏目推荐
        $type = $this -> type;
        $tjvideo = [];
        foreach($type as $k=>$v){
            $tids = Type::where('pid',$v['tid']) -> select("tid")->get()->toArray();
//            dd($tids);
            $tmp = [];
            foreach($tids as $kk=>$vv)
            {
               $tmp[] = $vv['tid'];
            }
//            dump($tmp);
            $video = Tjvideo::join('user','user.uid','=','tjvideo.uid')
                ->whereIn('tid',$tmp)->where('tjstatus',1)->orderBy('order')
                ->select('tjvideo.*','user.name')->take(12)->get()->toArray();

            $tjvideo[$v['tid']] = $video;
           
        }

        //动画
        $donghua=DB::table('video')->where('tid',1)->orderBy('click','desc')->get();



        //音乐
        $yinyue=DB::table('video')->where('tid',2)->orderBy('click','desc')->get();


        //游戏
        $game=DB::table('video')->where('tid',3)->orderBy('click','desc')->get();


        //科技
        $keji=DB::table('video')->where('tid',4)->orderBy('click','desc')->get();


        //舞蹈
        $dance=DB::table('video')->where('tid',8)->orderBy('click','desc')->get();


        return view('home.index.index',['lunbo'=>$lunbo,"tjvideo"=>$tjvideo,"top"=>$top,"adver"=>$adver,'donghua'=>$donghua,'yinyue'=>$yinyue,'game'=>$game,'keji'=>$keji,'dance'=>$dance]);
    }


    /**
     * 二级分类
     * @param $tid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vindex($tid)
    {
        // 分类 下的所有二级分类
        $tids = Type::where('pid',$tid)->get()->toArray();



        // 获取 各种推荐
        // top 推荐 6 + 猴子推荐 5
        $top = Tjvideo::join('user','user.uid','=','tjvideo.uid')
            ->where('tjstatus',3)->whereIn('tjvideo.tid',$tids)
            ->orderBy('order')
            ->select('tjvideo.*','user.name')->take(6)->get();


        $monkey = Tjvideo::join('user','user.uid','=','tjvideo.uid')
            ->where('tjstatus',4)->whereIn('tjvideo.tid',$tids)
            ->orderBy('order')
            ->select('tjvideo.*','user.name')->take(5)->get();

//        echo time();
        // 轮播图推荐 6
        $lunbo = Tjvideo::join('user','user.uid','=','tjvideo.uid')
            ->where("tjstatus",2)->whereIn('tjvideo.tid',$tids)
            ->orderBy('order')
            ->select('tjvideo.*','user.name')->take(6)->get();

        // 遍历分类 获取 栏目推荐
        $tjvideo = [];
        foreach($tids as $k=>$v){
            $video = Tjvideo::join('user','user.uid','=','tjvideo.uid')
                ->where("tjstatus",1)
                ->where("tid",$v['tid'])
                ->orderBy('order')
                ->select('tjvideo.*','user.name')->take(10)->get();
            $tjvideo[] = $video;

        }

//        dd($tjvideo);
//        dd($tids);
        return view('home/index/vindex',compact('top','lunbo','tjvideo','tid','tids'));
    }


}
