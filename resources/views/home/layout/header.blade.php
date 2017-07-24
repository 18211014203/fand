<!DOCTYPE html>
<html lang="zh">

<head>
    <script src="/static/js/route.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="copyright" content="{{Config('web.copyright')}}">
    <meta name="keywords" content="{{Config('web.keys')}}">
    <meta name="description" content="{{Config('web.descript')}})">

    <title>{{Config('web.title')}}</title>
    <link href="./favicon.ico" rel="shortcut icon">
    @section("css")

    @show
    <script src="{{asset('/static/js/jquery.min.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="{{asset('/static/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('/static/js/jquery.min.js')}}"></script>
    <![endif]-->


</head>

<body>

<div id="christmas" style="display:none">
    <div class="close-btn">跳过动画(14)</div>
</div>

<!-- header -->
<div id="header" class="header">
    <div class="header-top">
        <div class="wp clearfix header-top-con">
            <h1 class="fl logo">
                <a href="/index">
                    <img src="{{asset(Config('web.logo'))}}" width="88" height="27"></a>
            </h1>
            <ul id="header-guide" class="fr header-guide">
                @if(empty(session('user')))
                <li class="guide-item guide-user">
                    <a href="{{url('/member/index')}}"  class="user-avatar item">
                        <img src="/static/picture/1.png" width="30" height="30"></a>

                        <a href="{{url('/login/login')}}"  class="item user-login">登录/注册</a>

                    <span class="user-message-count hidden"></span>
                    <div class="guide-item-con">
                        <p class="clearfix">
                            <a href="/member/" target="_blank" class="fl user-name"></a>
                            <a href="{{url('/login/logout')}}" class="fr icon icon-logout user-logout">退出</a>
                        </p>
                    </div>
                </li>
                @else
                    <li class="guide-item guide-user user-logined">
                        <a href="{{url('/member/info')}}" target="_blank" class="user-avatar item">
                            <img src="{{asset(session('user')['photo'])}}" width="30" height="30"></a>
                        <div class="guide-item-con">
                            <p class="clearfix">
                                <a href="" target="_blank" class="fl user-name">{{session('user')['name']}}</a>
                                <a href="{{url('/login/logout')}}" class="fr icon icon-logout user-logout">退出</a></p>
                            <a href="{{url('/member/info')}}" target="_blank" class="more">查看更多</a>
                        </div>
                    </li>
                    <script>
                        $(function(){
                            $('#header-guide>.user-logined').hover(function(){
                               $(this).find('div').show();
                            },function(){
                                $(this).find('div').hide();
                            });
                        })
                    </script>
                @endif

                <li class="guide-item guide-history">
                    <a href="{{url('/member/history')}}" title="历史记录" target="_blank" class="icon icon-history item"></a>

                </li>
                <li class="guide-item guide-upload">
                    <a href="{{url('/member/video')}}" title="投稿视频" target="_blank" class="icon icon-upload item"></a>

                </li>
                <li class="guide-item">
                    <a href="{{url('/member/collect')}}" title="收藏视频" target="_blank" class="icon icon-collect item"></a>
                </li>
            </ul>

            <div id="search-box" class="fr search-box">
                <form id="search-form" method="get" action="{{url('/search')}}">
                    <input id="search-text" type="text" placeholder="" name="key"  value="" autocomplete="off">
                    <button id="search-btn" class="search-btn">
                        <i class="icon icon-search"></i>
                        <span>搜索</span></button>
                    <div class="search-result hidden"></div>
                    {{--<script id="temp-search-hot" type="text/template"><div class = "hot-search"> 今日热搜 </div>--}}
                        {{--<ul class="search-hot-ul">--}}
                            {{--<li class="search-hot-item">--}}
                                {{--<a id="hot-key-count-1" href="http:/ / www.acfun.cn / search / #query = 阅后即瞎" target="_blank ">--}}
                                            {{--<span class="num ">1--}}
                                            {{--</span>--}}
                                    {{--<b>阅后即瞎--}}
                                    {{--</b>--}}
                                {{--</a>--}}
                            {{--</li><li class="search - hot - item "><a id="hot - key - count - 2 " href="http: //www.acfun.cn/search/#query=STEAM销量周榜" target="_blank"><span class="num">2</span><b>STEAM销量周榜</b></a></li><li class="search-hot-item"><a id="hot-key-count-3" href="http://www.acfun.cn/search/#query=CS：GO" target="_blank"><span class="num">3</span><b>CS：GO</b></a></li><li><a id="hot-key-count-4" href="http://www.acfun.cn/search/#query=木鱼微剧场" target="_blank"><span class="num">4</span><b>木鱼微剧场</b></a></li><li><a id="hot-key-count-5" href="http://www.acfun.cn/search/#query=新桓结衣" target="_blank"><span class="num">5</span><b>新桓结衣</b></a></li><li><a id="hot-key-count-6" href="http://www.acfun.cn/search/#query=中国交通事故合集" target="_blank"><span class="num">6</span><b>中国交通事故合集</b></a></li><li><a id="hot-key-count-7" href="http://www.acfun.cn/search/#query=LPL" target="_blank"><span class="num">7</span><b>LPL</b></a></li></ul></script>--}}
                </form>
            </div>


        </div>
    </div>




    <!-- 导航 start -->
    <nav id="nav" class="wp nav">
        <div class="clearfix wp nav-parent">
            <ul class="clearfix">
                <li class="nav-home active">
                    <a href="{{asset('/index')}}">首页</a></li>
                @foreach($type as $v)
                <li  tid="{{$v['tid']}}"
                     @if(!empty($vtype))
                        @if($vtype['pid']==$v['tid'])
                         class="nav-home active"
                        @endif
                        @endif>


                  <a  href="/v/{{$v['tid']}}/index">{{$v['tname']}}</a></li>
                @endforeach


            </ul>
        </div>

        <div class="nav-sub">
            <div class="wp nav-sub-con" >
                {{--@if($type)--}}
                {{--  二级分类  --}}
                @foreach($type2 as $k1=>$v1)
                    @if(!empty($v1))
                <ul data-category="14" tid="{{$v1[0]['pid']}}" class="clearfix">
                        @foreach($v1 as $k2=>$v2)
                    <li>

                        <a href="{{url('/list/'.$v2['tid'])}}" tid="{{$v2['tid']}}">
                            {{$v2['tname']}}
                        </a>

                    </li>
                        @endforeach
                </ul>
                    @endif
                @endforeach
                {{-- 二级分类  --}}

            </div>
        </div>
    </nav>


    <script>
        {{-- 二级分类 JS 代码--}}

        $(function(){
            var lis = $('#nav>.nav-parent>ul>li').not($('#nav .nav-home'));
//            console.log(lis);

            lis.mouseenter(function(){
                i = $(this).index();
//                alert(i);
//                $(this).addClass('active');

                $('#nav .nav-sub').css({'visibility':'visible'});
                $('#nav .nav-sub').show();
                $('#nav .nav-sub ul').hide();
                $('#nav .nav-sub ul').eq(i-1).show();
                j = $('#nav .nav-sub ul').eq(i-1).length;
                $('#nav .nav-sub ul').eq(i-1).css('left',(i*75-(j-1)*140)+'px');
            });

            $('#nav').mouseleave(function(){
                setTimeout(function(){
                    $('#nav .nav-sub').css({'display':'none'});
                    $('#nav .nav-sub ul').hide();
                },2000);
            });

            // 导航栏 scroll 滚动
            // 滚动固定定位
            $(window).scroll(function () {
                var top = $(window).scrollTop();
                if(top>260){
                    $("#nav").animate({ "top": top }, 15);
                }else{
                    $("#nav").animate({ "top": 190 }, 15);
                }
                 //方式一 效果比较理想
                //$("#editInfo").css({ left: left + "px", top: top + "px" }); 方式二 有阴影
            });

        });


    </script>
    <!-- 导航 end -->
    <!-- width image -->
    <div class="header-banner">

        <a href="javascript:;" style="background:url({{asset(Config('web.width_image'))}})" title="{{Config('web.width_image_title')}}" target="_blank" class="banner-href"></a>

    </div>
    <!-- width image end -->
</div>


<!-- header  end  -->
