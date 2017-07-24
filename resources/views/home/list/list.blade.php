@extends("home.layout.index")
@section("css")
    <link rel="stylesheet" href="{{asset('/static/css/core.min.css')}}">
    <link rel="stylesheet" href="{{asset('/static/css/index.min.css')}}">
	<link rel="stylesheet" href="{{asset('/static/css/list.min.css')}}">
	<link rel="stylesheet" href="{{asset('/static/css/paper.min.css')}}">
@endsection


@section("main")
    <!-- main start -->

    <div id="main" class="main">
        <input type="hidden" id="pageType" value="list">
        <nav id="channel-nav" class="nav">
            <!--Created by user on 16/2/24.-->
            <div class="nav-sub">
                <div class="wp nav-channel-sub-con">
                    <ul data-category="17" data-cid="123" class="clearfix">
                        <li>
                            <a href="{{url('/v/'.$vtype['pid'].'/index')}}" data-cid="123">本区推荐</a></li>
                       {{--本级分类--}}
                        @foreach($types as $k=>$v)
                        <li class="@if($v['tid']==$tid)
                                active
@endif">
                            <a href="{{url('/list/'.$v['tid'])}}" data-cid="135">{{$v['tname']}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>

        <section class="wp clearfix column-box third-height">
            <div class="column-left">
                <header class="clearfix">
                    <div class="fl list-tab">
                        <a href="javascript:;" data-nav="0" class="no-select active">最新发布</a>
                        <a href="javascript:;" data-nav="1" class="no-select">播放最多</a>
                        <a href="javascript:;" data-nav="2" class="no-select">评论最多</a>
                    </div>

                    <span id="third-view" class="fr">
                    <a title="点击切换为双列显示" data-th="th-large" class="th-large">
                        <i class="icon icon-th-large"></i>
                    </a>
                    <a title="点击切换为平铺显示" data-th="th-normal" class="th-normal">
                        <i class="icon icon-th-list"></i>
                    </a>
                    <a title="点击切换为列表显示" data-th="th-list" class="th-list">
                        <i class="icon icon-th"></i>
                    </a>

                </span>
                    <script>
                        $(function(){

                            var alist = $('.column-box #third-view a');

                            alist.click(function(){
                                alist.removeClass('default');
                                var aabb = $(this).attr('class');
                                $(this).addClass('default');
                                $('#list-data').removeClass().addClass(aabb);
                            });
                        })
                    </script>
                </header>
                <div id="list-data" class="th-large">
                    <div id="list-video">
                        @foreach($video as $k=>$v)
                        <li class="has-img third-img fl">
                            <a href="{{url('/play/'.$v['vid'])}}" target="_blank" class="fl img-wp">
                                <img src="{{asset($v['img'])}}" title="{{$v['title']}}
                                        UP主:{{$v['name']}}
                                        发布于{{date('Y-m-d H:i;s',$v['upload_time'])}}&nbsp;/&nbsp;点击：{{$v['click']}}&nbsp;/&nbsp;评论：{{$v['comment']}}"   width="160" height="90" style="display: inline;"></a>
                            <b class="text-over">
                                <a href="{{url('/play/'.$v['vid'])}}" title="{{$v['title']}}
                            UP主:{{$v['name']}}
                            发布于{{date('Y-m-d H:i;s',$v['upload_time'])}}&nbsp;/&nbsp;点击：{{$v['click']}}&nbsp;/&nbsp;评论：{{$v['comment']}}" target="_blank" class="third-title">{{$v['title']}}</a>
                            </b>
                            <div>
                                <p class="up-name">
                                    <a href="javascript:;" target="_blank">
                                        <img src="{{asset($v['photo'])}}"  style="display: inline;"></a>
                                    <a href="javascript:;" title="InstreetTV" target="_blank" class="third-name">{{$v['name']}}</a>
                                    <span title="" class="verified-ico verified-0"></span>
                                </p>
                                <p class="video-num">
                                    <span class="video-time">{{date('m月d日(星期w)H时i分',$v['upload_time'])}}</span>
                                    <span class="icon icon-view-player">
                                    <strong>@if($v['click']>10000) {{round($v['click']/10000,1).'万'}}@else {{$v['click']}} @endif</strong></span>
                                    <span class="icon icon-danmu">&nbsp;@if($v['comment']>10000) {{round($v['comment']/10000,1).'万'}}@else {{$v['comment']}} @endif</span></p>
                            </div>
                            <p class="video-description">「Instreet」手机APP，这有一群和你一样热爱街头的人。</p></li>
                        @endforeach
                    </div>

                </div>


            </div>
            <div class="column-right">
                <section data-tab="" b-id="undefined" b-name="undefined" b-type="undefined" class="module module-rank">
                    <header class="clearfix module-header">
                        <div class="fl module-title">
                            <b>
                                <a href="http://www.acfun.cn/rank/list/#cid=135;range=1" target="_blank" title="热门视频">热门视频</a></b>
                        </div>
                        <div class="fr module-tab">
                            <a href="javascript:;" data-nav="1" class="active">日榜</a>
                            <a href="javascript:;" data-nav="2">周榜</a></div>
                    </header>
                    <div m-id="undefined" m-name="" m-type="" class="module-main">
                        <div class="module-con">
                            <ul data-con="1">
                                <li class="has-img   ">
                                <span>
                                    <i>1</i>
                                </span>
                                    <a href="/v/ac3839060" title="成都天府软件园【SIXCAT】体操服摆渡【helloVenus】Wiggle Wiggle
                                UP:SIXCAT舞团
                                发布于2017-07-07 19:18:46&nbsp;/&nbsp;点击：21793&nbsp;/&nbsp;评论：15" target="_blank" class="fl img-wp">
                                        <img data-original="http://imgs.aixifan.com/content/2017_07_07/1499423996.png?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_07/1499423996.png?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                    <b>
                                        <a href="/v/ac3839060" title="成都天府软件园【SIXCAT】体操服摆渡【helloVenus】Wiggle Wiggle
                                    UP:SIXCAT舞团
                                    发布于2017-07-07 19:18:46&nbsp;/&nbsp;点击：21793&nbsp;/&nbsp;评论：15" target="_blank">成都天府软件园【SIXCAT】体操服摆渡【helloVenus】Wiggle Wiggle</a>
                                    </b>
                                    <p class="p1 text-overflow">
                                        <a href="http://www.acfun.cn/u/2562541.aspx" target="_blank" title="SIXCAT舞团" class="text-overflow">UP: SIXCAT舞团</a></p>
                                    <p class="p2">
                                    <span class="icon icon-view-player">
                                        <strong>21793</strong></span>
                                        <span class="icon icon-comments">
                                        <strong>15</strong></span>
                                    </p>
                                </li>
                                <li class="has-img   ">
                                <span>
                                    <i>2</i>
                                </span>
                                    <a href="/v/ac3839554" title="【干物板栗】桃花旗袍【高跟性感风初尝试】
                                UP:干物板栗
                                发布于2017-07-08 00:06:00&nbsp;/&nbsp;点击：4817&nbsp;/&nbsp;评论：45" target="_blank" class="fl img-wp">
                                        <img data-original="http://imgs.aixifan.com/content/2017_07_07/1499443276.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_07/1499443276.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                    <b>
                                        <a href="/v/ac3839554" title="【干物板栗】桃花旗袍【高跟性感风初尝试】
                                    UP:干物板栗
                                    发布于2017-07-08 00:06:00&nbsp;/&nbsp;点击：4817&nbsp;/&nbsp;评论：45" target="_blank">【干物板栗】桃花旗袍【高跟性感风初尝试】</a>
                                    </b>
                                    <p class="p1 text-overflow">
                                        <a href="http://www.acfun.cn/u/2272617.aspx" target="_blank" title="干物板栗" class="text-overflow">UP: 干物板栗</a></p>
                                    <p class="p2">
                                    <span class="icon icon-view-player">
                                        <strong>4817</strong></span>
                                        <span class="icon icon-comments">
                                        <strong>45</strong></span>
                                    </p>
                                </li>
                                <li class="has-img  has-img-last ">
                                <span>
                                    <i>3</i>
                                </span>
                                    <a href="/v/ac3839648" title="【深深】你不在北京（自编）
                                UP:carina深深
                                发布于2017-07-08 01:42:26&nbsp;/&nbsp;点击：1615&nbsp;/&nbsp;评论：8" target="_blank" class="fl img-wp">
                                        <img data-original="http://imgs.aixifan.com/content/2017_07_07/1499448752.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_07/1499448752.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                    <b>
                                        <a href="/v/ac3839648" title="【深深】你不在北京（自编）
                                    UP:carina深深
                                    发布于2017-07-08 01:42:26&nbsp;/&nbsp;点击：1615&nbsp;/&nbsp;评论：8" target="_blank">【深深】你不在北京（自编）</a>
                                    </b>
                                    <p class="p1 text-overflow">
                                        <a href="http://www.acfun.cn/u/10611976.aspx" target="_blank" title="carina深深" class="text-overflow">UP: carina深深</a></p>
                                    <p class="p2">
                                    <span class="icon icon-view-player">
                                        <strong>1615</strong></span>
                                        <span class="icon icon-comments">
                                        <strong>8</strong></span>
                                    </p>
                                </li>
                                <li class="has-img channel-rank-after  ">
                                <span>
                                    <i>4</i>
                                </span>
                                    <a href="/v/ac3838574" title="BlackPink 《As If It’s Your Last》分解教学
                                UP:跳舞吧APP
                                发布于2017-07-07 16:58:25&nbsp;/&nbsp;点击：1454&nbsp;/&nbsp;评论：0" target="_blank" class="fl img-wp">
                                        <img data-original="http://imgs.aixifan.com/content/2017_07_07/1499417849.png?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_07/1499417849.png?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                    <b>
                                        <a href="/v/ac3838574" title="BlackPink 《As If It’s Your Last》分解教学
                                    UP:跳舞吧APP
                                    发布于2017-07-07 16:58:25&nbsp;/&nbsp;点击：1454&nbsp;/&nbsp;评论：0" target="_blank">BlackPink 《As If It’s Your Last》分解教学</a>
                                    </b>
                                    <p class="p1 text-overflow">
                                        <a href="http://www.acfun.cn/u/11902638.aspx" target="_blank" title="跳舞吧APP" class="text-overflow">UP: 跳舞吧APP</a></p>
                                    <p class="p2">
                                    <span class="icon icon-view-player">
                                        <strong>1454</strong></span>
                                        <span class="icon icon-comments">
                                        <strong>0</strong></span>
                                    </p>
                                </li>
                                <li class="has-img channel-rank-after  ">
                                <span>
                                    <i>5</i>
                                </span>
                                    <a href="/v/ac3838500" title="SUNNY-孤独舞者
                                UP:团队来袭2
                                发布于2017-07-07 16:41:55&nbsp;/&nbsp;点击：1311&nbsp;/&nbsp;评论：0" target="_blank" class="fl img-wp">
                                        <img data-original="http://imgs.aixifan.com/content/2017_07_07/1499416637.png?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_07/1499416637.png?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                    <b>
                                        <a href="/v/ac3838500" title="SUNNY-孤独舞者
                                    UP:团队来袭2
                                    发布于2017-07-07 16:41:55&nbsp;/&nbsp;点击：1311&nbsp;/&nbsp;评论：0" target="_blank">SUNNY-孤独舞者</a>
                                    </b>
                                    <p class="p1 text-overflow">
                                        <a href="http://www.acfun.cn/u/1756929.aspx" target="_blank" title="团队来袭2" class="text-overflow">UP: 团队来袭2</a></p>
                                    <p class="p2">
                                    <span class="icon icon-view-player">
                                        <strong>1311</strong></span>
                                        <span class="icon icon-comments">
                                        <strong>0</strong></span>
                                    </p>
                                </li>
                            </ul>
                            <ul data-con="2" class="hidden">
                                <li class="has-img   ">
                                <span>
                                    <i>1</i>
                                </span>
                                    <a href="/v/ac3831568" title="【NANA】羞耻白丝短裙翻跳皇冠的《What s My Name》
                                UP:太阳当空照NANA
                                发布于2017-07-04 22:35:49&nbsp;/&nbsp;点击：69961&nbsp;/&nbsp;评论：44" target="_blank" class="fl img-wp">
                                        <img data-original="http://imgs.aixifan.com/content/2017_07_04/1499176579.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_04/1499176579.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                    <b>
                                        <a href="/v/ac3831568" title="【NANA】羞耻白丝短裙翻跳皇冠的《What s My Name》
                                    UP:太阳当空照NANA
                                    发布于2017-07-04 22:35:49&nbsp;/&nbsp;点击：69961&nbsp;/&nbsp;评论：44" target="_blank">【NANA】羞耻白丝短裙翻跳皇冠的《What s My Name》</a>
                                    </b>
                                    <p class="p1 text-overflow">
                                        <a href="http://www.acfun.cn/u/1229819.aspx" target="_blank" title="太阳当空照NANA" class="text-overflow">UP: 太阳当空照NANA</a></p>
                                    <p class="p2">
                                    <span class="icon icon-view-player">
                                        <strong>69961</strong></span>
                                        <span class="icon icon-comments">
                                        <strong>44</strong></span>
                                    </p>
                                </li>
                                <li class="has-img   ">
                                <span>
                                    <i>2</i>
                                </span>
                                    <a href="/v/ac3831302" title="【尖尖】LAMB/性感御姐风
                                UP:娃娃书
                                发布于2017-07-04 20:22:32&nbsp;/&nbsp;点击：56156&nbsp;/&nbsp;评论：37" target="_blank" class="fl img-wp">
                                        <img data-original="http://imgs.aixifan.com/content/2017_07_04/1499170706.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_04/1499170706.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                    <b>
                                        <a href="/v/ac3831302" title="【尖尖】LAMB/性感御姐风
                                    UP:娃娃书
                                    发布于2017-07-04 20:22:32&nbsp;/&nbsp;点击：56156&nbsp;/&nbsp;评论：37" target="_blank">【尖尖】LAMB/性感御姐风</a>
                                    </b>
                                    <p class="p1 text-overflow">
                                        <a href="http://www.acfun.cn/u/1164346.aspx" target="_blank" title="娃娃书" class="text-overflow">UP: 娃娃书</a></p>
                                    <p class="p2">
                                    <span class="icon icon-view-player">
                                        <strong>56156</strong></span>
                                        <span class="icon icon-comments">
                                        <strong>37</strong></span>
                                    </p>
                                </li>
                                <li class="has-img  has-img-last ">
                                <span>
                                    <i>3</i>
                                </span>
                                    <a href="/v/ac3826063" title="[JG NATION] 전효성 ( Jun Hyo Seong )
                                UP:屁眼上面一颗饭
                                发布于2017-07-02 22:05:45&nbsp;/&nbsp;点击：26800&nbsp;/&nbsp;评论：26" target="_blank" class="fl img-wp">
                                        <img data-original="http://imgs.aixifan.com/content/2017_07_02/1499004120.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_02/1499004120.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                    <b>
                                        <a href="/v/ac3826063" title="[JG NATION] 전효성 ( Jun Hyo Seong )
                                    UP:屁眼上面一颗饭
                                    发布于2017-07-02 22:05:45&nbsp;/&nbsp;点击：26800&nbsp;/&nbsp;评论：26" target="_blank">[JG NATION] 전효성 ( Jun Hyo Seong )</a>
                                    </b>
                                    <p class="p1 text-overflow">
                                        <a href="http://www.acfun.cn/u/691885.aspx" target="_blank" title="屁眼上面一颗饭" class="text-overflow">UP: 屁眼上面一颗饭</a></p>
                                    <p class="p2">
                                    <span class="icon icon-view-player">
                                        <strong>26800</strong></span>
                                        <span class="icon icon-comments">
                                        <strong>26</strong></span>
                                    </p>
                                </li>
                                <li class="has-img channel-rank-after  ">
                                <span>
                                    <i>4</i>
                                </span>
                                    <a href="/v/ac3837465" title="欧美小姐姐跳全孝盛的Find Me~你们喜欢嘛
                                UP:脑残雀
                                发布于2017-07-07 11:01:23&nbsp;/&nbsp;点击：22871&nbsp;/&nbsp;评论：17" target="_blank" class="fl img-wp">
                                        <img data-original="http://imgs.aixifan.com/content/2017_07_07/1499396584.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_07/1499396584.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                    <b>
                                        <a href="/v/ac3837465" title="欧美小姐姐跳全孝盛的Find Me~你们喜欢嘛
                                    UP:脑残雀
                                    发布于2017-07-07 11:01:23&nbsp;/&nbsp;点击：22871&nbsp;/&nbsp;评论：17" target="_blank">欧美小姐姐跳全孝盛的Find Me~你们喜欢嘛</a>
                                    </b>
                                    <p class="p1 text-overflow">
                                        <a href="http://www.acfun.cn/u/199029.aspx" target="_blank" title="脑残雀" class="text-overflow">UP: 脑残雀</a></p>
                                    <p class="p2">
                                    <span class="icon icon-view-player">
                                        <strong>22871</strong></span>
                                        <span class="icon icon-comments">
                                        <strong>17</strong></span>
                                    </p>
                                </li>
                                <li class="has-img channel-rank-after  ">
                                <span>
                                    <i>5</i>
                                </span>
                                    <a href="/v/ac3839060" title="成都天府软件园【SIXCAT】体操服摆渡【helloVenus】Wiggle Wiggle
                                UP:SIXCAT舞团
                                发布于2017-07-07 19:18:46&nbsp;/&nbsp;点击：21793&nbsp;/&nbsp;评论：15" target="_blank" class="fl img-wp">
                                        <img data-original="http://imgs.aixifan.com/content/2017_07_07/1499423996.png?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_07/1499423996.png?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                    <b>
                                        <a href="/v/ac3839060" title="成都天府软件园【SIXCAT】体操服摆渡【helloVenus】Wiggle Wiggle
                                    UP:SIXCAT舞团
                                    发布于2017-07-07 19:18:46&nbsp;/&nbsp;点击：21793&nbsp;/&nbsp;评论：15" target="_blank">成都天府软件园【SIXCAT】体操服摆渡【helloVenus】Wiggle Wiggle</a>
                                    </b>
                                    <p class="p1 text-overflow">
                                        <a href="http://www.acfun.cn/u/2562541.aspx" target="_blank" title="SIXCAT舞团" class="text-overflow">UP: SIXCAT舞团</a></p>
                                    <p class="p2">
                                    <span class="icon icon-view-player">
                                        <strong>21793</strong></span>
                                        <span class="icon icon-comments">
                                        <strong>15</strong></span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <footer class="module-footer">
                        <a href="http://www.acfun.cn/rank/list/#cid=135;range=1" target="_blank" class="more">查看完整榜单
                            <i class="icon icon-arrow-slim-right"></i></a>
                    </footer>
                </section>
                <div class="list-right-img">

                </div>
            </div>
        </section>
    </div>
    <div id="list-pager">
        <div id="yy" class="area-pager ">
            {!! $video->render() !!}

        </div>
    </div>
    <style>
        #list-pager{
            margin:0;
            margin-right:400px;
        }
        #list-pager>.area-pager>ul>li>a{
            width:28px;
            height: 28px;
        }
        #list-pager>#yy>ul>li{
            padding:0px;
            width:28px;
        }

    </style>
    <script>
        $(function(){
            var pages = $('#list-pager>.area-pager>ul>li');
            pages.addClass('pager');

            pages.click(function(){
                var url = $(this).find('a').attr('href');
                location.href = url;
            });
        })
    </script>
	<!-- main end -->
@endsection    