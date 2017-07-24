<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Tjvideo;
use App\Http\Model\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class RecommendController extends Controller
{
    /**
     * 列表显示页  查询显示
     * @param Request $request
     * @param string $tjstatus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function getIndex(Request $request,$tjstatus='')
   {
       $search = $request -> all();

       $video = Tjvideo::join('type','type.tid','=','tjvideo.tid');
       // 分类 推荐
        if(!empty($tjstatus)){
            $video = $video -> where('tjstatus',$tjstatus);
        }
        // 关键字查询
        if($request->has('key')){
            $video = $video -> where('title','like','%'.Input::get('key').'%');
        }

       // 分类查询
       if($request->has('tid')){
            $tmp = Type::where('pid','=',Input::get('tid'))->select('tid')->get()->toArray();
            $tids = [];
            foreach($tmp as $k=>$v){
                $tids[] = $v['tid'];
            }
           $video = $video -> whereIn('tjvideo.tid',$tids);
       }

        // 分页
        $video = $video->orderBy('order')->select('tjvideo.*','type.tname')->paginate(8);
       // 推荐状态数组
        $status = ['1'=>'栏目推荐','2'=>'轮播图推荐','3'=>'top推荐','4'=>'猴子推荐'];
        // 获取一级分类
       $type = Type::where('pid',0) ->get();

       return view('admin/recommend/index',compact('video','status','search','type','tjstatus'));
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
        $res = Tjvideo::where('id',$data['id'])->update(['order'=>$data['order']]);

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
     * 取消推荐
     * @param Request $request
     * @return array
     */
    public function getDel(Request $request)
    {
//        dd($request->all());
        $data = $request -> all();
        $res = Tjvideo::destroy($data['id']);

        if($res){
            return  [
                'status'=>200,
                'msg'=>'取消成功'
            ];
        }else{
            return  [
                'status'=>403,
                'msg'=>'取消失败'
            ];
        }
    }

    /**
     * 更改推荐类型
     * @param Request $request
     * @param $tjstatus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getChange(Request $request,$tjstatus)
    {

        $res = Tjvideo::find(Input::get('id'))->update(['tjstatus'=>$tjstatus]);

        if($res){
            return back()->with('success','更改成功');
        }else{
            $request -> flash();
            return back()->with('error','失败');
        }
    }





}
