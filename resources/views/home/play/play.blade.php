@extends("home.layout.play")
@section('css')
    <link rel="stylesheet" href="{{asset('/static/css/core.min.css')}}">
    <link rel="stylesheet" href="{{asset('/static/css/detail.min.css')}}">
    <link rel="stylesheet" href="{{asset('/static/css/comm.min.css')}}">

    <link rel="stylesheet" href="{{asset('/home/css/bootstrap.css')}}" />
    <style>
        #guide-bar>.inner{
            margin:0px auto;
        }
        #guide-top-bar .inner{
            margin:0px auto;
        }
        #guide.simple #area-user-guide{
            right:0px;
        }
    </style>
@endsection

@section("area")
<!-- main start -->
<div id="main" class="main">
    <section class="clearfix wp area head">

        <div id="pageInfo" data-title="投票标题" data-desc="视屏描述&nbsp;" data-name="" data-view="400" data-collect="0" data-comment="0" data-pic="http://imgs.aixifan.com/content/2017_06_27/1498537345.jpg" data-vid="5347129" data-cid="137" data-pcid="58" data-aid="3812129" data-sid="5347129" data-from="zhuzhan" data-isshowcount="1" data-uid="12138573" data-isallowedaddtag="false"></div>
        <div class="title">
           {{ $data['title'] }}
        </div>
        <div class="crumbs">
            <div id="bd_crumb" class="fl">
                <a href="/" class="sp1">主页</a>
                <span class="sp2">&gt;</span>
                <a href="/v/list58/index.htm" class="sp3">音乐</a>
                <span class="sp4">&gt;</span>
                <a href="/v/list137/index.htm" class="sp5">演奏</a>
                <a href="/u/12138573.aspx" target="_blank" class="avatar-wrap"> <img src="/home/picture/avatar.jpg" class="avatar" /></a>
                <a href="/u/12138573.aspx" target="_blank" class="name-wrap">{{ $user['username'] }}</a>
                <span class="sp6">{{ $data['upload'] }}</span>
                <!--坑爹的百分点-->
                <span data-uname="{{ $user['username'] }}" data-type="投稿" data-oid="3812129" data-proof="视屏标题" class="sp7">举报视频</span>
            </div>
            <div class="fr">
                <a href="/member/#area=admin;aid=3812129" target="_blank" class="barrage-management">弹幕管理</a>
            </div>
        </div>
    </section>


 <!-- 视屏开始 -->
    <section class="clearfix wp area player">
        <div id="player">
            <video autobuffer controls ended>
                <source src="/uploads/video/2.ogg" type="video/ogg">
            <video>
        </div>
    </section>
<!-- 视屏结束 -->


    <section class="clearfix wp area crumb" style="margin-top: -195px">
        <span class="view fl"> <span class="sp1">播放</span> <span class="sp2">...</span></span>
        <span class="danmu fl"> <span class="sp1">弹幕</span> <span class="sp2">...</span></span>
        <span id="bd_comm" class="comm fl"> <span class="sp1">评论</span> <span class="sp2">...</span></span>
        <span class="shu fl"></span>
        <span id="shoucang" data-status="0" class="collection fl">
     <div class="fl ico">
      <div class="img"></div>
     </div> <span class="sp3 fl" id="shoucang">收藏</span> <br /> <span class="sp4" id="num">{{$num}}</span></span>

            <script>
            $('#shoucang').click(function(){
                var num=$('#num').text();

                $.get('/store',{'vid':'{{$data['vid']}}'},function(msg){

                    if(msg){
                        alert('您已经收藏过了!');
                    }else{

                         num=parseInt(num)+1;
                        // alert(num);
                        $('#num').text(num);

                        alert('收藏视频成功!');
                    }


                });
            });

            </script>


        <span id="bd_phoneshow" class="phone fl">
     <div class="fl ico">
      <div class="img"></div>
     </div> <span class="sp4">手机流畅</span><br />
     <div class="qrcode-download">
      <img src="/home/picture/erweima.png" />
      <p>扫描下载最新版客户端</p>
     </div> </span>
        <span data-status="0" class="banana fl">
    <!--  <div class="fl ico">
      <div class="img"></div>
     </div> <span class="sp3 fl">投蕉</span> <br /> <span class="sp4">0</span> -->
     <div class="div-banana">
      <span data-num="1" class="bananaer fl"></span>
      <span data-num="2" class="bananaer fl"></span>
      <span data-num="3" class="bananaer fl"></span>
      <span data-num="4" class="bananaer fl"></span>
      <span data-num="5" class="bananaer fl"></span>
      <span class="text fl">喂 <span>{{ $user['username'] }}</span>食&nbsp;0&nbsp;香蕉</span>
     </div>
     <div id="bd_throwbanana" class="fly-banana">
      <div style="width:auto">
       <span class="bananaer fl banana-1"></span>
       <span class="bananaer fl banana-2"></span>
       <span class="bananaer fl banana-3"></span>
       <span class="bananaer fl banana-4"></span>
       <span class="bananaer fl banana-5"></span>
      </div>
     </div> </span>
        <div id="bdshare" class="share_box fr"></div>
        <div class="share-more fr">
            分享
            <span class="icon fr"></span>
        </div>
    </section>
    <div class="introduction">
        <section class="clearfix wp area">
            <div class="columen-left fl">
                <div class="title">
                    简介
                </div>
                <div class="desc gheight">
                    <div class="sp1">
                        视屏简介内容:&nbsp;&nbsp;{{ $massge['desc'] }}

                    </div>
                    <span class="open">展开详情</span>
                    <span class="close">关闭详情</span>
                </div>
               <!--  <div id="bd_tag" class="tag">
                    <span class="tag-single fl"> <a href="/search/#query=演奏" data-tid="760" target="_blank" class="fl">演奏</a></span>
                    <span class="tag-single fl"> <a href="/search/#query=丽江手鼓" data-tid="1260108" target="_blank" class="fl">丽江手鼓</a></span>
                    <span class="tag-single fl"> <a href="/search/#query=非洲鼓" data-tid="192719" target="_blank" class="fl">非洲鼓</a></span>
                    <span class="tag-single fl"> <a href="/search/#query=结果" data-tid="16678" target="_blank" class="fl">结果</a></span>
                    <span class="tag-single fl"> <a href="/search/#query=凯文先生" data-tid="1260092" target="_blank" class="fl">凯文先生</a></span>
                    <a href="javascript:void(0)" data-status="0" class="fl add">+添加</a>
                    <input placeholder="请输入标签" class="tagInp" />
                </div> -->
                <div id="temp-tag-view" class="hidden">
                    <span class="tag-single fl"> <a href="/search/#query=[name]" data-tid="[tid]" target="_blank" class="fl">[name]</a> <span title="删除标签" data-tid="[tid]" class="icon icon-delete1 fl"></span> </span>
                </div>
            </div>
            <div class="column-right fr">
                <div class="upzhu"></div>
                <div data-uid="12138573" class="user">
                    <a href="/u/12138573.aspx" target="_blank" id="bd_uphead" class="a1">
                        <div class="backg"></div>
                        <img src="{{ $detail['photo'] }}" class="avatar" />
                        <div class="banana-num"></div>
                        <div class="bubble">
                            <div class="bubble-1 fl"></div>
                            <div class="bubble-3 fl"></div>
                            <div class="bubble-2 fl"></div>
                        </div>
                        <div class="eating"></div> </a>
                    <a href="/u/12138573.aspx" target="_blank" id="bd_upname" class="a2">
                        <div class="title">
                            {{ $user['username'] }}
                        </div></a>
                    <div class="tool">
                        <span id="bd_follow" data-status="0" data-name="{{ $user['username'] }}" data-userid="12138573" class="fl flow">+&nbsp;关注</span>
                        <a href="/member/#area=mail-new;username={{ $user['username'] }};" target="_blank" id="bd_letter" class="fl letter">私信</a>
                    </div>
                </div>
                <div class="bottom">
                    <div class="desc">
                        {{ $detail['sign'] }}
                    </div>

                </div>
            </div>
        </section>
        <section class="clearfix wp area collection"></section>
        <div id="temp-collection" class="hidden">
            <div class="top clearfix">
                <div id="bd_collectionname" class="title fl">
                    所属合辑：
                    <a>[title]</a>
                </div>
                <div id="bd_collectionsubscribe" data-status="0" class="subs fl">
                    <i>订阅</i>
                    <span class="sp1">&nbsp;[subscribeSize]</span>
                    <div class="cover">
                        取消订阅
                    </div>
                </div>
            </div>
            <div class="up-crumb clearfix">
                <span id="bd_collectionmanager" class="up"> <i>创建者:</i> <a>[username]</a> </span>
                <span class="gaojian"> <i>稿件:</i> <span>[countSize]</span></span>
                <span class="time"> <i>最近更新:</i> <span>[updateTime]</span></span>
            </div>
            <div id="bd_collectionvideo" class="video-list"></div>
        </div>
        <div id="temp-video" class="hidden">
            <figure data-collec="[cid]" class="fl">
                <a href="[href]" title="[title]">[cover]
                    <div class="play-icon"></div></a>
                <div class="cover">
                    <i class="icon">播放中</i>
                </div>
                <figcaption>
                    <div class="title">
                        <a href="[href]" title="[title]">[title]</a>
                    </div>
                    <p class="clearfix"> <span class="icon icon-view-player fl">[viewCount]</span> <span class="icon icon-danmu fl">[danmuSize]</span></p>
                </figcaption>
            </figure>
        </div>
    </div>

    <div class="comment-area">
        <section class="clearfix wp area comm">
            <div class="columen-left fl">



         <!-- 评论编辑器 -->

        <form action="/pinlun/pinlun/{{ $data['vid'] }}/{{ $user['uid'] }}/{{ $user['username'] }}" method="post">
             {{ csrf_field() }}
             <p>请输入评论内容:</p>
                <textarea name="content" id="" cols="30" rows="10" style="resize: none;width: 720px;height: 100px"></textarea>

              <input type="submit" value="提交" style="margin: 10px 550px;width: 170px" class="btn btn-default" id="submit">
        </form>

                <div id="area-comment" class="block">
                    <div class="banner">

                        <i class="icon _icon-commentLeft"></i>
                        <p class="tab _fixed">评论区</p>

                        <p id="btn-refresh" class="tab more"> <i class="icon _icon-refresh"></i> </p>
                    </div>


            <!-- 有问题要改 -->
                    <script>
                    $('#submit').click(function(){
                        if(!session('user')){
                            location.href='www.nnn.com/login/login';
                        }
                    });
                    </script>




             <!-- 评论内容区 -->



            @foreach($content as $k=>$v)
            <div class="mainer">
            <div id="c-78399892" class="item-comment   item-comment-first " data-fullcid="78395691,78396292,78397393,78397396,78397596,78399892" data-qid="78397596" data-layer="21">
             <div class="area-comment-left">
             <a class="thumb" target="_blank" href="http://www.acfun.cn/u/490814.aspx#home">
  <!--            <img class="avatar" src="http://cdn.aixifan.com/dotnet/20120923/style/image/avatar.jpg" data-name="jsakjj"> -->
             <img class="avatar-bg" src="{{ $v['photo'] }}" style="width: 48px"></a> </div>
             <div class="area-comment-right">
             <div class="author-comment last" data-uid="490814">
             <span class="index-comment">{{$v['uname']}}</span>
             <a class="name " data-uid="490814" target="_blank" href="http://www.acfun.cn/u/490814.aspx#home"></a>
             <span class="time_">发表于 {{ date('Y-m-d H:i:s',$v['ctime']) }}</span><p class="floor-comment">6</p> </div>
              <div class="content-comment">{{ $v['content'] }}</div>
              <div class="author-comment last"></div></div></div>
            </div>
            @endforeach
                     <!-- 评论内容区 end-->

                </div>
            </div>

            <div class="anchor-right fl">


                <!--Created by user on 2016/11/1.-->
                <div class="anchorMessage"></div>
                <div id="anchor-temp" class="hidden">
                    <div class="anchor-box">
                        <div class="head [hid]">
                        <a href="http://live.acfun.cn/space#from=0;platformId=[platformId];videoId=[videoId];compereId=[compereId];isLive=[isLive];contentId=;liveType=[liveType];" target="_blank" class="images fl">[userImg]</a>

                            <div class="rig fl">
                                <a href="http://live.acfun.cn/space#from=0;platformId=[platformId];videoId=[videoId];compereId=[compereId];isLive=[isLive];contentId=;liveType=[liveType];" target="_blank" title="[nickName]" class="name text-overflow fl">[nickName]</a>

                                <span class="p1 fl">[followed]粉丝</span>

                                <strong class="clearfix"></strong>

                                <div class="p2 text-overflow">
                                    [verifiedInfo]
                                </div>

                            </div>
                            <strong class="clearfix"></strong>
                        </div>

                        <a href="http://live.acfun.cn/space#from=0;platformId=[platformId];videoId=[videoId];compereId=[compereId];isLive=[isLive];contentId=;liveType=[liveType];" target="_blank">
                            <div style="background:url(/static/images/6bb4201b74aa44079afc94cace4558ec.gif);background-size:100%" class="bg [ac]">
                                <div class="islive [live] [av]">
                                    [state]
                                </div>
                                <div class="mask-gradient mask">
                                    <b class="text-overflow">[title]</b>
                                </div>
                                <div class="mask-pop">
                                    <div class="playP"></div>
                                </div>
                            </div> </a>
                    </div>
                </div>
                <div class="openanchor hidden">
                    <div>
                        <span>展开全部主播</span>
                        <i class="icon"></i>
                    </div>
                </div>
            </div>

            <div class="columen-right fr">
                <ul id="bd_recommend"></ul>
                <div id="temp-recom-view" class="hidden">
                    <li class="has-img">
                <a href="[link]" title="[title]" target="_blank" class="fl img-wp">[img]</a> <b>
                <a href="[link]" title="[title]" target="_blank">[title]</a></b> <p class="text-overflow">
                <a href="[userurl]" target="_blank" title="[username]">UP: [username]</a></p> <p>
                <span class="icon icon-view-player">
                <strong>[view]</strong></span>
                <span class="icon icon-comments">
                <strong>[comm]</strong></span> </p> </li>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection


@section('js')
    <script src="{{asset('/home/js/bootstrap.min.js')}}"></script>

@endsection