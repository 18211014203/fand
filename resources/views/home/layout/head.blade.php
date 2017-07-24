<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="copyright" content="{{Config('web.copyright')}}">
    <meta name="keywords" content="{{Config('web.keys')}}">
    <meta name="description" content="{{Config('web.descript')}}">

    <title>{{Config('web.title')}}</title>
    <link href="./favicon.ico" rel="shortcut icon">

    <link rel="stylesheet" href="{{asset('/static/css/core_1.css')}}" />

    <!--[if lte IE 7]>
    <link rel="stylesheet" href="{{asset('/static/css/font-awesome-ie7.min.css')}}"></link>
    <![endif]-->
    <!--[if (gte IE 8)|!(IE)]>
        <!-->
    <link rel="stylesheet" href="{{asset('/static/css/font-awesome.min.css')}}" />
    <!--<![endif]-->
    <!--[if lte IE 7]>
    <link rel="stylesheet" href="{{asset('/static/css/css/style-ie7.css')}}"></link>
    <![endif]-->
    <!--[if (gte IE 8)|!(IE)]>
        <!-->
    <link rel="stylesheet" href="{{asset('/static/css/style.css')}}" />
    <!--<![endif]-->

    <link rel="stylesheet" media="screen and (min-width: 1440px)" href="{{asset('/static/css/wide.css')}}" />
    <link rel="stylesheet" href="{{asset('/static/css/member.css')}}" />
    <link id="style-theme-member" rel="stylesheet" href="{{asset('/static/css/theme.css')}}" />
    <script src="{{asset("/static/js/jquery.min.js")}}"></script>
    @section("css")

    @show
</head>




<body>
@if(session("success"))
<div id="area-info" style="display:block;height:40px">
    <div class="item success" style="line-height:24px;left: 0px;opacity: 1; transition: left 200ms ease, opacity 200ms ease;">
        <i class="icon icon-check-square-o" style="width:12px;height:12px">
        </i>{{ session("success") }}
    </div>
    <div class="item error" style="line-height:24px;left: 0px;opacity: 1; transition: left 200ms ease, opacity 200ms ease;">
        <i class="icon icon-check-square-o" style="width:12px;height:12px">
        </i>{{ session("error") }}
    </div>
</div>
@endif
<script>
    setTimeout(function(){
        $('#area-info').fadeOut();
//        alert(a);
    },2000);
</script>


<div id="guide-space" class="simple"></div>
<div id="guide" class="simple">
    <div id="guide-top-bar">
        <a id="guide-fix" target="_blank"></a>
        <div class="inner">
            <a id="guide-logo" href="/" title="天下漫友是一家"></a>
            <div id="area-user-guide">

                <a id="a-avatar-guide" href="{{url('/member/info')}}" target="_blank" class="thumb">
                    <img class="avatar img-circle" src="{{asset(session('user')['photo'])}}" width="30" height="30"/>
                    <p class="info-hint hidden">0</p>
                </a>


                <a id="a-history-guide" href="{{url('/member/history')}}" title="历史记录" target="_blank" class="tool">
                    <i class="icon icon-history"></i>
                    <p>看过</p>
                </a>
                <a id="a-post-guide" href="{{url('/member/video')}}" title="投稿视频" target="_blank" class="tool">
                  <i class="icon icon-upload"></i>
                    <p>投稿</p>
                </a>
                <a id="a-favor-guide" href="{{url('/member/collect')}}" title="收藏视频" target="_blank" class="tool">
                    <i class="icon icon-folder-open"></i>
                    <p>收藏</p>
                </a>
                <span class="clearfix"></span>
            </div>
            @if(session('user'))

            <div id="win-info-guide" class="win hidden" style="opacity: 1; top: 46px;">
                <div class="mainer">
                    <div class="a">
                        <div class="l">
                            <a id="a-name-guide" href="{{url('/member/info')}}" target="_blank" title="前往我的个人中心" class="name">{{session('user')['username']}}</a></div>
                        <div class="r">
                            <a id="a-logout-guide" href="{{url('/login/logout')}}" title="退出登录">
                                <i class="icon icon-power-off"></i>退出登录</a>
                        </div>
                        <span class="clearfix"></span>
                    </div>
                    <div class="c">
                        <a href="{{url('/member/info')}}" target="_blank">查看更多</a></div>
                    <div class="tail"></div>
                </div>
            </div>

            @else
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

            @endif
            <script>

                $(function(){
                    $('#a-avatar-guide>.img-circle').mouseover(function(){

                        $('#win-info-guide').removeClass('hidden');
                    });
                    $('#win-info-guide').hover(function(){

                        $('#win-info-guide').removeClass('hidden');
                    },function(){
                        var a = setTimeout(function(){
                            $('#win-info-guide').addClass('hidden');
                        },800);
                    });

                });
            </script>
        </div>
    </div>
    <div id="guide-middle">
        <div id="guide-winhint" class="win win-hint left">
            <div class="mainer"></div>
            <div class="arrow"></div>
        </div>
        <div id="guide-inner"></div>
    </div>
    <div id="guide-bar">
        <div class="inner">
            <div class="l">
                <a href="{{url('/index')}}" title="天下漫友是一家" class="first only">首页</a>
                @foreach($type as $v)
                        <a  href="/v/{{$v['tid']}}/index" tid="{{$v['tid']}}">{{$v['tname']}}</a>
                @endforeach

                <span class="clearfix"></span>
            </div>
            <style>
                #guide #guide-bar .l a {
                    text-decoration: none;
                }
            </style>
            <div class="r">
                <form id="area-search-guide" target="_blank" method="get" action="{{url('/search')}}">
                    <input name="key" type="text" placeholder="请输入搜索词" autocomplete="off" x-webkit-speech="" class="ipt-search" />
                    <i class="icon icon-search"></i>
                    <input type="submit" value="搜 索" title="搜索" class="btn-search" style="background:url({{asset('home/images/111.png')}}) 0 0 no-repeat;"/>
                    <span class="clearfix"></span>
                    <ul class="menu menu-search"></ul>
                </form>
            </div>

        </div>
    </div>
    <div id="sub-guide">
        <div id="sub-guide-inner" style="height: 0px">

            {{--  二级分类  --}}
            @foreach($type2 as $k1=>$v1)
                @if(!empty($v1))
                    <div class="unit channel-anime c1 sc2 wc1 swc1" style="display:block;" tid="{{$v1[0]['pid']}}">

                        @foreach($v1 as $k2=>$v2)
                                <a href="{{url('/list/'.$v2['tid'])}}" tid="{{$v2['tid']}}">
                                    {{$v2['tname']}}
                                </a>
                        @endforeach
                        <span class="clearfix"></span>
                    </div>

                @endif
            @endforeach
            {{-- 二级分类  --}}


        </div>
    </div>
</div>
<script>
    $(function(){

        $('#guide #guide-bar .l a').mouseover(function(){
            var tid = $(this).attr('tid');
            $('#sub-guide-inner>div').hide();
            $('#sub-guide').addClass('active');
            $('#sub-guide-inner>div[tid='+tid+']').show();
        });
        $('#guide').mouseleave(function(){
            var tid = $(this).attr('tid');
            $('#sub-guide-inner>div').hide();
        });
    });
</script>

<div id="header" style="margin-top: -90px">
    <div id="header-inner" class="inner">
        <a id="logo-home-member" href="/" title="认真你就输了"></a>
        <div id="block-message-header" class="block hidden">
            <div class="mainer"></div>
        </div>
    </div>



</div><div id="mainer">
    <div id="mainer-inner">
        <div id="block-main">
