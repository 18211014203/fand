<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RankController extends Controller
{
    //获取视频表中点击量最高的前20条
   public function getRank()
   {



     $data=DB::table('rank')->join('type','rank.tid','=','type.tid')->join('user','rank.uid','=','user.uid')->orderBy('click','desc')->skip(0)->take(20)->paginate(5);

     $type=self::type();

     return view('admin.rank.rank',compact('data','type'));

   }

  
   //点击量排行
   public function getClick($tid)
   {
     $type=self::type();

     if($tid=='d')
     {
        $data=DB::table('rank')->join('user','rank.uid','=','user.uid')->join('type','rank.tid','=','type.tid')->orderBy('dclick','desc')->select('id','tname','name','vid','title','img','dclick')->skip(0)->take(20)->paginate(5);
        
         return view('admin.rank.dclick',compact('data','type'));
     }
     else

     if($tid=='w')
     {
        $data=DB::table('rank')->join('user','rank.uid','=','user.uid')
                               ->join('type','rank.tid','=','type.tid')
                               ->orderBy('wclick','desc')
                               ->select('id','tname','name','vid','title','img','wclick')
                               ->skip(0)
                               ->take(20)
                               ->paginate(5);
        
         return view('admin.rank.wclick',compact('data','type'));

     }
     else

     if($tid=='m')
     {
        $data=DB::table('rank')->join('user','rank.uid','=','user.uid')
                               ->join('type','rank.tid','=','type.tid')
                               ->orderBy('mclick','desc')
                               ->select('id','tname','name','vid','title','img','mclick')
                               ->skip(0)
                               ->take(20)
                               ->paginate(5);
        
         return view('admin.rank.mclick',compact('data','type'));
     }
     
   }


    //更新排行榜表
   public function getUpdate()
   {

     //多表联查获取相关数据
     $a=DB::table('video')->join('user','user.uid','=','video.uid')
                          ->join('video_detail','video.vid','=','video_detail.vid')
                          ->join('type','video.tid','=','type.tid')
                          ->get();
     // dd($a);
    //开启事物
    DB::beginTransaction();

    //清空原排行表
    DB::table('rank')->truncate();

    //将视频最新的排行情况录入排行榜表中
    foreach($a as $k=>$v)
    {
        $num=DB::insert('insert into rank(
            vid,tid,title,img,uid,comment,dclick,wclick,mclick,click) values(?,?,?,?,?,?,?,?,?,?)',
              [$v['vid'],$v['tid'],$v['title'],
               $v['img'],$v['uid'],$v['comment'],$v['dclick'],
               $v['wclick'],$v['mclick'],$v['click']]);
    }

    //判断是否插入成功,否则回滚或确认事物
    if($num)
    {
        DB::commit();

        return redirect('/rank/rank')->with('error','更新成功!');

    }else{

        DB::rouBack();

        return redirect('/rank/rank')->with('error','更新失败!');
    }

   }


   public static function type()
   {
     $type=DB::table('type')->where('pid',0)->get();

     return $type;
   }


   public function getTtype($tid)
   {
        $str=DB::table('type')->where('pid',$tid)->get();
       

        $type=self::type();

        foreach ($str as $k => $v) {
          
            $arr[]=$v['tid'];
        }

    $data=DB::table('video')->whereIn('tid',$arr)->orderBy('click','desc')->paginate(10);

      return view('admin.rank.type',compact('type','data','tid','str'));

        

       
    }

}
