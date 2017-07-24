<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Url;
use Illuminate\Http\Request;
use App\Http\Model\User;
use App\Http\Model\Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public $type = null;
   /**
    * 查询 分类
    *  用户 信息
    *
    */
   public function __construct()
   {
       if(empty(session('type'))){
           // 获得 分类信息
           $type = Type::where('pid',0)->get()->toArray();
           $type2 = [];
           foreach($type as $value){
               $type2[] = Type::where('pid',$value['tid'])->get()->toArray();
           }
       }else{
           $type = session('type');
           $type2 = session('type2');
       }

       // 视图变量共享
       view() -> share('type',$type);
       view() -> share('type2',$type2);

       $this -> type = $type;


       // 页尾 友情链接 和 关于我们
       $url = Url::take(4)->get();

       view() -> share('url',$url);

   }

}
