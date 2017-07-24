<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlayController extends CommonController
{

   public function play($vid)

   {    

        //获取视频

        $video=DB::table('video')->where('vid',$vid)->get()[0];

        //增加点击量
        $video['click']=$video['click']+1;

        //浏览记录
        $user=session('user');

        $looktime=time();

        if($user){
        	DB::table('user_brower')->insert(['uid'=>$user['uid'],
        								  'vid'=>$vid,
        							 'looktime'=>$looktime]);
        }
        
        
        //将点击量写入视频表中
        DB::table('video')->where('vid',$vid)->update(['click'=>$video['click']]);

        //以上为设置视频周边数据



        // 通过视频获取上传人uid
        $data=DB::table('video')->where('vid',$vid)->first();

        //将其中时间戳格式化获取时间戳
        $data['upload']=date('Y-m-d H:i:s',$data['upload_time']);

        //获取该视屏详细信息
        $massge=DB::table('video_detail')->where('vid',$vid)->get()[0];

        //上传人的详细数据
        $detail=DB::table('user_detail')->where('uid',$data['uid'])->first();

        //获取上传人账号信息
        $user=DB::table('user')->where('uid',$data['uid'])->first();

        //获取评论内容
        $content=DB::table('comment')->where('vid',$vid)->get();

        //评论总数
       	$contents=count($content);

        $homeuser=session('user');

  		//获得收藏数
  		$store=DB::table('user_store')->where('vid',$data['vid'])->get();

  		$num=count($store);

        return view('home.play.play',compact('data','massge','user','detail','content','homeuser','num','contents'));
   }

   //收藏
   public function store()
   {
   		if(session('user'))
   		{
   			$userid=session('user')['uid'];

	   		$vid=$_GET['vid'];

	   		$storetime=time();


	   		$uid=DB::table('user_store')->where('uid',$userid)->where('vid',$vid)->get();

	   			if($uid!=[]){

	   				return 1;
	   			
	   			}else{

	   				DB::table('user_store')->insert(['uid'=>$userid,'vid'=>$vid,'storetime'=>$storetime]);

	   				$num=DB::table('video')->where('vid',$vid)->get();

	   				$num=$num[0]['collect']+1;

	   				DB::table('video')->where('vid',$vid)->update(['collect'=>$num]);


	   				return 0;
	   			}
	   		
   		}else{

   			return redirect('/login/login');
   		}

   }
   

}
