@extends("home.layout.index")
@section("css")
    <link rel="stylesheet" href="{{asset('/static/css/core.min.css')}}">
    <link rel="stylesheet" href="{{asset('/static/css/index.min.css')}}">
    <link rel="stylesheet" href="{{asset('/static/css/search.min.css')}}">
	<link rel="stylesheet" href="{{asset('/static/css/paper.min.css')}}">
@endsection


@section("main")
    <!-- main start -->

    <div id="main" class="main">
        <div class="search-box-bg">
            <div id="search-box" class="fr search-box">
                <form id="search-form"  method="get" action="{{url('/search')}}">
                    <input id="search-text" name="key" type="text" placeholder=""  value="" autocomplete="off">
                    <button id="search-btn" class="search-btn" style="width:72px">
                        <i class="icon icon-search"></i>
                        <span>搜索</span></button>
                    <div class="search-result" style="left: 0px; top: 40px; min-width: 400px; display: none; opacity: 0;">
                        <ul>
                            <li>
                                <a href="http://www.acfun.cn/search/#query=饭店迷情" target="_blank">
                                <span class="cont">
                                    <i class="light">饭店</i>迷情</span></a>
                            </li>
                            <li>
                                <a href="http://www.acfun.cn/search/#query=饭店党" target="_blank">
                                <span class="cont">
                                    <i class="light">饭店</i>党</span></a>
                            </li>

                        </ul>
                    </div>
                </form>
            </div>

        </div>
        <div class="search-nav">
            <ul class="wp clearfix">
                <li data-type="video" class="fl active">视频
                    <span class="search-count"></span></li>

            </ul>
        </div>
        <section class="wp column-box clearfix">
            <div class="column-left">
                <div data-type="video" class="video-list list-warp active">
                    <div class="filter-box video-list-filter simple-mode">
                        <div class="filter-box-content">
                            <div class="sort-filter search-filter clearfix">
                                <label class="fl">排序:</label>
                                <div class="filter-wrap fl">
                                    <span id="sort-count-1" class="fl filter-btn active" data-mode="1" data-num="1" data-sort="1" data-value="releaseDate">最新发布</span>
                                    <span id="sort-count-2" class="fl filter-btn" data-mode="1" data-num="2" data-sort="11" data-value="click">最多播放</span>
                                    <span id="sort-count-3" class="fl filter-btn" data-mode="1" data-num="3" data-sort="13" data-value="comment">最多评论</span>

                                </div>
                            </div>
                            <div class="channel-filter search-filter clearfix">
                                <label class="fl">分类:</label>
                                <div class="filter-wrap fl">
                                    <span id="channel-count-1" class="fl filter-btn active" data-mode="2" data-num="0" data-value="all" data-tid="0" >全部</span>
                                    @foreach($type as $k=>$v)
                                        <span id="channel-count-1" class="fl filter-btn" data-mode="2" data-num="0" data-value="all" data-tid="{{$v['tid']}}" >{{$v['tname']}}</span>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="result-count">共
                        <span>{{count($video)}}</span>条结果</div>
                    <div class="video-anchor-box hidden">
                        <p>主播推荐</p>
                        <div class="video-anchor-wrap"></div>
                    </div>
                    <div class="video-bangumi-wrap"></div>
                    <div class="video-album-wrap"></div>
                    <div class="video-list-wrap">
                        @foreach($video as $k=>$v)
                        <div class="video-cell clearfix" data-position="{{$k+1}}">
                            <a class="video-cell-left fl" href="{{url('play/'.$v['vid'])}}" target="_blank">
                                <img src="{{asset($v['img'])}}"></a>
                            <div class="video-cell-right fl">
                                <div class="title">
                                    <a href="{{url('play/'.$v['vid'])}}" target="_blank">{{$v['title']}}</a></div>
                                <div class="video-info clearfix">
                                    <a class="fl" href="/u/9236461.aspx" target="_blank">
                                        <img src="http://cdn.aixifan.com/dotnet/artemis/u/cms/www/201701/04224008rylvolo5.jpg"></a>
                                    <a class="user-name fl" href="/u/9236461.aspx" target="_blank">luna0508</a>
                                    <div class="video-data fl">播放
                                        <span>{{$v['click']}}</span>· 评论
                                        <span>{{$v['comment']}}</span>· 收藏
                                        <span>{{$v['collect']}}</span>·
                                        <span>{{date('m月d日(星期w) H时i分',$v['upload_time'])}}</span></div>
                                </div>
                                <div class="description">简介：
                                    <span>{{$v['desc']}}</span></div>
                                <div class="video-tags-and-channel">
                                    <div class="video-tags fl">标签：
                                        @foreach(explode('-',$v['label']) as $kk=>$vv)
                                        <a class="tag" href="javascript:;">{{$vv}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div id="list-pager">
                    <div id="" class="area-pager ">
                        {!! $video->appends($search)->render() !!}

                        <span class="clearfix"></span>
                    </div>
                </div>
            </div>

        </section>


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
            // 分页样式处理
            var pages = $('#list-pager>.area-pager>ul>li');
            pages.addClass('pager');

            pages.click(function(){
                var url = $(this).find('a').attr('href');
                location.href = url;
            });
            // 隐藏导航和宽图
            $('.header-banner').hide();
            $('#nav').hide();
            $('#search-form').hide();


            // 搜索条件  分类 或 排序
            // 排序  最新发布  最多播放  最多评论
            function GetRequest() {
                var url = location.search; //获取url中"?"符后的字串
                var theRequest = new Object();
                if (url.indexOf("?") != -1) {
                    var str = url.substr(1);
                    strs = str.split("&");
                    for(var i = 0; i < strs.length; i ++) {
                        theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
                    }
                }
                return theRequest;
            }

            var req = GetRequest();

            if('order' in req){
                $('.column-left>.video-list .sort-filter span').removeClass('active');
                $('.column-left>.video-list .sort-filter span[data-value='+req['order']+']').addClass('active');
            }

            if('tid' in req){
                $('.column-left>.video-list .channel-filter span').removeClass('active');
                $('.column-left>.video-list .channel-filter span[data-tid='+req['tid']+']').addClass('active');
            }



            var href =  location.pathname + '?';
            if('key' in req){
                href = href+'key='+req['key']+'&';
            }
            // 排序
            $('.column-left>.video-list .sort-filter span').click(function(){
                href = href+'order='+$(this).attr('data-value');
                if('tid' in req){
                    href = href +'&tid='+req['tid'];
                }
                location.href = href;
            });

            $('.column-left>.video-list .channel-filter span').click(function(){
                if('order' in req){
                    href = href + 'order='+req['order']+'&';
                }
                href = href+'tid='+$(this).attr('data-tid');
                location.href = href;
            });
        })

    </script>
	<!-- main end -->
@endsection    