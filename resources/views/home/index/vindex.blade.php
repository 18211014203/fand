@extends("home.layout.index")

@section('css')
    <link rel="stylesheet" href="{{asset('/static/css/core.min.css')}}">
    <link rel="stylesheet" href="{{asset('/static/css/index.min.css')}}">
    <link rel="stylesheet" href="{{asset('/static/css/channel.min.css')}}">
@endsection
@section("main")
    <!-- main start -->
    <div id="main" class="main">
        <nav id="channel-nav" class="nav">
            <!--Created by user on 16/2/24.-->
            <div class="nav-sub">
                <div class="wp nav-channel-sub-con">
                    <ul data-category="17" tid="{{$tid}}" class="clearfix">
                        <li class="active">
                            <a href="/v/list123/index.htm" data-cid="123">本区推荐</a></li>
                        @fpr
                    </ul>
                </div>
            </div>
        </nav>
        <section b-id="181" b-name="轮播图+6小视频" b-type="26" class="clearfix wp area area-slider">
            <div class="slider-wrap fl">
                <div class="slider-wrap-1">
                    <div id="slider-big" m-id="301" m-name="轮播图" m-type="1" class="fl slider-big">
                        <ul class="slider-con">
                            @foreach($lunbo as $k=>$v)
                                <li class="slider-item" @if($k!==1) style="display:none;" @endif>
                                    <a href="{{url('/play/'.$v['vid'])}}" target="_blank">
                                        <img src="{{  $v['img']  }}" style="width:100%;height:100%;"/>
                                        <span class="mask-gradient slider-title">
                                        <b class="text-overflow">{{$v['title']}}</b>
                                    </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="fr slider-right-x6">
                <ul m-id="302" m-name="小图综合推荐" m-type="2" class="slider-small">

                    @foreach($top as $k=>$v)

                        <li  style="width:210px;">
                            <a href="{{ url('/play/'.$v['vid']) }}" target="_blank">
                                <img src="{{asset($v['img'])}}" width="216" height="120">
                                <div class="mask-gradient mask">
                                    <b>{{$v['title']}}</b>
                                    <p class="text-overflow">
                                        <span>UP: {{$v['name']}}</span>
                                        <span class="clearfix">
                                            <i class="icon icon-view-player">{{$v['click']}}</i>
                                            <i class="icon icon-danmu">{{$v['comment']}}</i></span>
                                    </p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="area-ad-right"></div>
        </section>
        <section class="clearfix wp main-bottom column-box">
            {{--主体右半部分开始--}}
            <div class="fr channel-rank column-right">
                <!--Created by user on 16/2/26.-->

                <div b-id="74" class="channel-module-rank">
                    <section data-tab="" b-id="74" b-name="热门标签+排行榜+UP名人堂" b-type="14" class="module module-rank">
                        <header class="clearfix module-header">
                            <div class="fl module-title">
                                <b>
                                    <a href="javascript:;" target="_blank" title="排行榜">舞蹈·彼女排行榜</a></b>
                            </div>
                            <div class="fr module-tab">
                                <a href="javascript:;" data-nav="1" class="active">日榜</a>
                            </div>
                        </header>
                        <div m-id="130" m-name="排行榜" m-type="17" class="module-main">
                            <div class="module-con">
                                <ul data-con="1">
                                    <li class="has-img   ">
                                    <span>
                                        <i>1</i>
                                    </span>
                                        <a href="/v/ac3869126" title="【空绫玥】不行啊❤不要啊❤ 渔网袜高跟鞋有 马甲线无 但其实是首背上的歌
                                    UP:空绫玥
                                    发布于2017-07-21 15:23:06&nbsp;/&nbsp;点击：16.4万&nbsp;/&nbsp;评论：130" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500621275.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500621275.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3869126" title="【空绫玥】不行啊❤不要啊❤ 渔网袜高跟鞋有 马甲线无 但其实是首背上的歌
                                        UP:空绫玥
                                        发布于2017-07-21 15:23:06&nbsp;/&nbsp;点击：16.4万&nbsp;/&nbsp;评论：130" target="_blank">【空绫玥】不行啊❤不要啊❤ 渔网袜高跟鞋有 马甲线无 但其实是首背上的歌</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/1401465.aspx" target="_blank" title="空绫玥" class="text-overflow">UP: 空绫玥</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>16.4万</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>130</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img   ">
                                    <span>
                                        <i>2</i>
                                    </span>
                                        <a href="/v/ac3869487" title="老婆又发了两段小视频
                                    UP:心木屏溪
                                    发布于2017-07-21 17:26:27&nbsp;/&nbsp;点击：27641&nbsp;/&nbsp;评论：24" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500629158.png?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500629158.png?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3869487" title="老婆又发了两段小视频
                                        UP:心木屏溪
                                        发布于2017-07-21 17:26:27&nbsp;/&nbsp;点击：27641&nbsp;/&nbsp;评论：24" target="_blank">老婆又发了两段小视频</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/568099.aspx" target="_blank" title="心木屏溪" class="text-overflow">UP: 心木屏溪</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>27641</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>24</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img  has-img-last ">
                                    <span>
                                        <i>3</i>
                                    </span>
                                        <a href="/v/ac3869450" title="成都天府软件园【SIXCAT】月圆之夜吸血少女变身记【宣美】满月
                                    UP:SIXCAT舞团
                                    发布于2017-07-21 17:14:18&nbsp;/&nbsp;点击：11253&nbsp;/&nbsp;评论：17" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500626355.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500626355.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3869450" title="成都天府软件园【SIXCAT】月圆之夜吸血少女变身记【宣美】满月
                                        UP:SIXCAT舞团
                                        发布于2017-07-21 17:14:18&nbsp;/&nbsp;点击：11253&nbsp;/&nbsp;评论：17" target="_blank">成都天府软件园【SIXCAT】月圆之夜吸血少女变身记【宣美】满月</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/2562541.aspx" target="_blank" title="SIXCAT舞团" class="text-overflow">UP: SIXCAT舞团</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>11253</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>17</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>4</i>
                                    </span>
                                        <a href="/v/ac3869974" title="【渣熊】不要哟❤【色气风回归】
                                    UP:脑卡小天使渣熊熊
                                    发布于2017-07-21 21:00:58&nbsp;/&nbsp;点击：10791&nbsp;/&nbsp;评论：11" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500642098.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500642098.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3869974" title="【渣熊】不要哟❤【色气风回归】
                                        UP:脑卡小天使渣熊熊
                                        发布于2017-07-21 21:00:58&nbsp;/&nbsp;点击：10791&nbsp;/&nbsp;评论：11" target="_blank">【渣熊】不要哟❤【色气风回归】</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/1199176.aspx" target="_blank" title="脑卡小天使渣熊熊" class="text-overflow">UP: 脑卡小天使渣熊熊</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>10791</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>11</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>5</i>
                                    </span>
                                        <a href="/v/ac3869591" title="【兔子林x吃粥组合】恋爱裁判❤无罪？有罪？【初合作】
                                    UP:菟籽琳
                                    发布于2017-07-21 17:59:58&nbsp;/&nbsp;点击：8383&nbsp;/&nbsp;评论：21" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500624534.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500624534.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3869591" title="【兔子林x吃粥组合】恋爱裁判❤无罪？有罪？【初合作】
                                        UP:菟籽琳
                                        发布于2017-07-21 17:59:58&nbsp;/&nbsp;点击：8383&nbsp;/&nbsp;评论：21" target="_blank">【兔子林x吃粥组合】恋爱裁判❤无罪？有罪？【初合作】</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/749817.aspx" target="_blank" title="菟籽琳" class="text-overflow">UP: 菟籽琳</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>8383</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>21</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>6</i>
                                    </span>
                                        <a href="/v/ac3869351" title="颜瞳桐♥ダメよ♥不行啊~
                                    UP:牡丹花下鬼啊
                                    发布于2017-07-21 16:41:26&nbsp;/&nbsp;点击：7530&nbsp;/&nbsp;评论：8" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500625244.png?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500625244.png?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3869351" title="颜瞳桐♥ダメよ♥不行啊~
                                        UP:牡丹花下鬼啊
                                        发布于2017-07-21 16:41:26&nbsp;/&nbsp;点击：7530&nbsp;/&nbsp;评论：8" target="_blank">颜瞳桐♥ダメよ♥不行啊~</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/1988319.aspx" target="_blank" title="牡丹花下鬼啊" class="text-overflow">UP: 牡丹花下鬼啊</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>7530</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>8</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>7</i>
                                    </span>
                                        <a href="/v/ac3869516" title="一镜到底40所高中热舞
                                    UP:心木屏溪
                                    发布于2017-07-21 17:34:07&nbsp;/&nbsp;点击：7256&nbsp;/&nbsp;评论：14" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500629547.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500629547.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3869516" title="一镜到底40所高中热舞
                                        UP:心木屏溪
                                        发布于2017-07-21 17:34:07&nbsp;/&nbsp;点击：7256&nbsp;/&nbsp;评论：14" target="_blank">一镜到底40所高中热舞</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/568099.aspx" target="_blank" title="心木屏溪" class="text-overflow">UP: 心木屏溪</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>7256</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>14</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>8</i>
                                    </span>
                                        <a href="/v/ac3869977" title="Idol School偶像学校DANCE BREAK
                                    UP:脑残雀
                                    发布于2017-07-21 21:01:29&nbsp;/&nbsp;点击：4105&nbsp;/&nbsp;评论：4" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500641955.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500641955.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3869977" title="Idol School偶像学校DANCE BREAK
                                        UP:脑残雀
                                        发布于2017-07-21 21:01:29&nbsp;/&nbsp;点击：4105&nbsp;/&nbsp;评论：4" target="_blank">Idol School偶像学校DANCE BREAK</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/199029.aspx" target="_blank" title="脑残雀" class="text-overflow">UP: 脑残雀</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>4105</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>4</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>9</i>
                                    </span>
                                        <a href="/v/ac3870309" title="【小焦】疑心暗鬼❤️黑丝❤️绝对领域#色气的小姐姐喜欢吗#
                                    UP:小焦儿vjv
                                    发布于2017-07-22 02:00:39&nbsp;/&nbsp;点击：3177&nbsp;/&nbsp;评论：9" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500658926.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500658926.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3870309" title="【小焦】疑心暗鬼❤️黑丝❤️绝对领域#色气的小姐姐喜欢吗#
                                        UP:小焦儿vjv
                                        发布于2017-07-22 02:00:39&nbsp;/&nbsp;点击：3177&nbsp;/&nbsp;评论：9" target="_blank">【小焦】疑心暗鬼❤️黑丝❤️绝对领域#色气的小姐姐喜欢吗#</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/10334343.aspx" target="_blank" title="小焦儿vjv" class="text-overflow">UP: 小焦儿vjv</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>3177</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>9</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>10</i>
                                    </span>
                                        <a href="/v/ac3869783" title="【惟安】Electric ・Magic♪将心相连的魔法音乐
                                    UP:苏惟安
                                    发布于2017-07-21 19:19:44&nbsp;/&nbsp;点击：2089&nbsp;/&nbsp;评论：2" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500635324.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500635324.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3869783" title="【惟安】Electric ・Magic♪将心相连的魔法音乐
                                        UP:苏惟安
                                        发布于2017-07-21 19:19:44&nbsp;/&nbsp;点击：2089&nbsp;/&nbsp;评论：2" target="_blank">【惟安】Electric ・Magic♪将心相连的魔法音乐</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/1193230.aspx" target="_blank" title="苏惟安" class="text-overflow">UP: 苏惟安</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>2089</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>2</strong></span>
                                        </p>
                                    </li>
                                </ul>
                                <ul data-con="2" class="hidden">
                                    <li class="has-img   ">
                                    <span>
                                        <i>1</i>
                                    </span>
                                        <a href="/v/ac3869126" title="【空绫玥】不行啊❤不要啊❤ 渔网袜高跟鞋有 马甲线无 但其实是首背上的歌
                                    UP:空绫玥
                                    发布于2017-07-21 15:23:06&nbsp;/&nbsp;点击：16.4万&nbsp;/&nbsp;评论：130" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500621275.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500621275.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3869126" title="【空绫玥】不行啊❤不要啊❤ 渔网袜高跟鞋有 马甲线无 但其实是首背上的歌
                                        UP:空绫玥
                                        发布于2017-07-21 15:23:06&nbsp;/&nbsp;点击：16.4万&nbsp;/&nbsp;评论：130" target="_blank">【空绫玥】不行啊❤不要啊❤ 渔网袜高跟鞋有 马甲线无 但其实是首背上的歌</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/1401465.aspx" target="_blank" title="空绫玥" class="text-overflow">UP: 空绫玥</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>16.4万</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>130</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img   ">
                                    <span>
                                        <i>2</i>
                                    </span>
                                        <a href="/v/ac3865099" title="【短短】-玉生烟 中国风翻跳
                                    UP:一只小短短OwO
                                    发布于2017-07-19 18:25:19&nbsp;/&nbsp;点击：14.6万&nbsp;/&nbsp;评论：210" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_19/1500473157.png?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_19/1500473157.png?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3865099" title="【短短】-玉生烟 中国风翻跳
                                        UP:一只小短短OwO
                                        发布于2017-07-19 18:25:19&nbsp;/&nbsp;点击：14.6万&nbsp;/&nbsp;评论：210" target="_blank">【短短】-玉生烟 中国风翻跳</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/2663901.aspx" target="_blank" title="一只小短短OwO" class="text-overflow">UP: 一只小短短OwO</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>14.6万</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>210</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img  has-img-last ">
                                    <span>
                                        <i>3</i>
                                    </span>
                                        <a href="/v/ac3867494" title="【小仙若】染上你的颜色 ❤突然卖萌
                                    UP:一只小仙若
                                    发布于2017-07-20 19:05:34&nbsp;/&nbsp;点击：11.2万&nbsp;/&nbsp;评论：336" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_20/1500548689.JPG?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_20/1500548689.JPG?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3867494" title="【小仙若】染上你的颜色 ❤突然卖萌
                                        UP:一只小仙若
                                        发布于2017-07-20 19:05:34&nbsp;/&nbsp;点击：11.2万&nbsp;/&nbsp;评论：336" target="_blank">【小仙若】染上你的颜色 ❤突然卖萌</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/8676540.aspx" target="_blank" title="一只小仙若" class="text-overflow">UP: 一只小仙若</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>11.2万</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>336</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>4</i>
                                    </span>
                                        <a href="/v/ac3856644" title="萝莉们化妆后简直大变脸~
                                    UP:黑白天空~~
                                    发布于2017-07-15 16:26:04&nbsp;/&nbsp;点击：92427&nbsp;/&nbsp;评论：105" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_15/1500107149.gif?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_15/1500107149.gif?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3856644" title="萝莉们化妆后简直大变脸~
                                        UP:黑白天空~~
                                        发布于2017-07-15 16:26:04&nbsp;/&nbsp;点击：92427&nbsp;/&nbsp;评论：105" target="_blank">萝莉们化妆后简直大变脸~</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/1373203.aspx" target="_blank" title="黑白天空~~" class="text-overflow">UP: 黑白天空~~</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>92427</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>105</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>5</i>
                                    </span>
                                        <a href="/v/ac3862538" title="【浅璟】✿桃源恋歌✿咬一口是甜蜜的味道✿
                                    UP:浅璟papa
                                    发布于2017-07-18 16:50:36&nbsp;/&nbsp;点击：53681&nbsp;/&nbsp;评论：49" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_18/1500367594.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_18/1500367594.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3862538" title="【浅璟】✿桃源恋歌✿咬一口是甜蜜的味道✿
                                        UP:浅璟papa
                                        发布于2017-07-18 16:50:36&nbsp;/&nbsp;点击：53681&nbsp;/&nbsp;评论：49" target="_blank">【浅璟】✿桃源恋歌✿咬一口是甜蜜的味道✿</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/1833411.aspx" target="_blank" title="浅璟papa" class="text-overflow">UP: 浅璟papa</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>53681</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>49</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>6</i>
                                    </span>
                                        <a href="/v/ac3859346" title="【E.X】❀桃源恋歌❀只因太思念你❤【A站初投稿】
                                    UP:EX炸裂
                                    发布于2017-07-17 10:52:03&nbsp;/&nbsp;点击：42981&nbsp;/&nbsp;评论：99" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_17/1500259749.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_17/1500259749.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3859346" title="【E.X】❀桃源恋歌❀只因太思念你❤【A站初投稿】
                                        UP:EX炸裂
                                        发布于2017-07-17 10:52:03&nbsp;/&nbsp;点击：42981&nbsp;/&nbsp;评论：99" target="_blank">【E.X】❀桃源恋歌❀只因太思念你❤【A站初投稿】</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/12439728.aspx" target="_blank" title="EX炸裂" class="text-overflow">UP: EX炸裂</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>42981</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>99</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>7</i>
                                    </span>
                                        <a href="/v/ac3865678" title="【兔姬】❤恋爱循环❤初恋的味道你感觉到了吗❤
                                    UP:有知鹿影视文化
                                    发布于2017-07-19 23:08:16&nbsp;/&nbsp;点击：31488&nbsp;/&nbsp;评论：10" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_19/1500476626.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_19/1500476626.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3865678" title="【兔姬】❤恋爱循环❤初恋的味道你感觉到了吗❤
                                        UP:有知鹿影视文化
                                        发布于2017-07-19 23:08:16&nbsp;/&nbsp;点击：31488&nbsp;/&nbsp;评论：10" target="_blank">【兔姬】❤恋爱循环❤初恋的味道你感觉到了吗❤</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/11804361.aspx" target="_blank" title="有知鹿影视文化" class="text-overflow">UP: 有知鹿影视文化</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>31488</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>10</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>8</i>
                                    </span>
                                        <a href="/v/ac3869487" title="老婆又发了两段小视频
                                    UP:心木屏溪
                                    发布于2017-07-21 17:26:27&nbsp;/&nbsp;点击：27641&nbsp;/&nbsp;评论：24" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_21/1500629158.png?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_21/1500629158.png?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3869487" title="老婆又发了两段小视频
                                        UP:心木屏溪
                                        发布于2017-07-21 17:26:27&nbsp;/&nbsp;点击：27641&nbsp;/&nbsp;评论：24" target="_blank">老婆又发了两段小视频</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/568099.aspx" target="_blank" title="心木屏溪" class="text-overflow">UP: 心木屏溪</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>27641</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>24</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>9</i>
                                    </span>
                                        <a href="/v/ac3858235" title="【欧尼】染上你的颜色 ❤今天的你是什么颜色的呢
                                    UP:铁板欧尼酱
                                    发布于2017-07-16 15:56:39&nbsp;/&nbsp;点击：26942&nbsp;/&nbsp;评论：29" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_16/1500191494.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_16/1500191494.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3858235" title="【欧尼】染上你的颜色 ❤今天的你是什么颜色的呢
                                        UP:铁板欧尼酱
                                        发布于2017-07-16 15:56:39&nbsp;/&nbsp;点击：26942&nbsp;/&nbsp;评论：29" target="_blank">【欧尼】染上你的颜色 ❤今天的你是什么颜色的呢</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/1803006.aspx" target="_blank" title="铁板欧尼酱" class="text-overflow">UP: 铁板欧尼酱</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>26942</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>29</strong></span>
                                        </p>
                                    </li>
                                    <li class="has-img channel-rank-after  ">
                                    <span>
                                        <i>10</i>
                                    </span>
                                        <a href="/v/ac3858237" title="【苔苔】纯洁的未来之景
                                    UP:Norinori
                                    发布于2017-07-16 15:57:20&nbsp;/&nbsp;点击：12233&nbsp;/&nbsp;评论：27" target="_blank" class="fl img-wp">
                                            <img data-original="http://imgs.aixifan.com/content/2017_07_16/1500191249.jpg?imageView2/1/w/180/h/100" src="http://imgs.aixifan.com/content/2017_07_16/1500191249.jpg?imageView2/1/w/180/h/100" width="90" height="50" style="display: inline;"></a>
                                        <b>
                                            <a href="/v/ac3858237" title="【苔苔】纯洁的未来之景
                                        UP:Norinori
                                        发布于2017-07-16 15:57:20&nbsp;/&nbsp;点击：12233&nbsp;/&nbsp;评论：27" target="_blank">【苔苔】纯洁的未来之景</a>
                                        </b>
                                        <p class="p1 text-overflow">
                                            <a href="http://www.acfun.cn/u/12434406.aspx" target="_blank" title="Norinori" class="text-overflow">UP: Norinori</a></p>
                                        <p class="p2">
                                        <span class="icon icon-view-player">
                                            <strong>12233</strong></span>
                                            <span class="icon icon-comments">
                                            <strong>27</strong></span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </section>
                </div>

            </div>
            {{--主体右半部分结束--}}
            <div class="fl channel-operate column-left">
                <!--Created by user on 16/3/9.-->
                @foreach($tjvideo as $k=>$v)
                <section data-cid="130" tid="{{$tids[$k]['tid']}}" tname="{{$tids[$k]['tname']}}" class="clearfix column-box area area-channel area-channel-channel area125">
                    <div data-tab="">
                        <header class="clearfix area-header">
                            <div class="fl channel-symbol"></div>
                            <a href="{{url('list/'.$tids[$k]['tid'])}}" target="_blank" class="area-title">{{$tids[$k]['tname']}}</a>

                            <a href="{{url('list/'.$tids[$k]['tid'])}}" target="_blank" class="fr area-more">
                                <span>更多</span>
                                <i class="icon icon-arrow-slim-right"></i>
                            </a>
                            <div class="clearfix hidden"></div>
                        </header>
                        <section data-pagenum="1" m-id="198" class="video-main">
                            <div data-con="0" class="column-box area-main active ">
                                <div class="clearfix module-video crop-margin">
                                    @foreach($v as $key=>$value)
                                    <figure class="fl block-box block-video ">
                                        <a href="{{url('/play/'.$value['vid'])}}" target="_blank" class="block-img has-danmu">
                                            <img src="{{asset($value['img'])}}" >
                                            <time>10:04</time></a>
                                        <figcaption class="block-title">
                                            <b>
                                                <a href="{{url('/play/'.$value['vid'])}}" target="_blank" title="{{$value['title']}}
                                            UP:{{$value['name']}}
                                            发布于2017-07-19 16:40:33&nbsp;/&nbsp;点击:{{$value['click']}}&nbsp;/&nbsp;评论:{{$value['comment']}}">{{$value['title']}}</a>
                                            </b>
                                            <p class="clearfix">
                                                <span class="icon icon-view-player">{{$value['click']}}</span>
                                                <span class="icon icon-danmu">{{$value['comment']}}</span></p>
                                        </figcaption>
                                    </figure>
                                    @endforeach
                                </div>
                            </div>
                            <div data-con="1" class="column-box area-main hidden ">
                                <div class="clearfix module-video crop-margin"></div>
                            </div>

                        </section>
                    </div>
                </section>
                @endforeach
            </div>
        </section>

    </div>
@endsection
@section('js')
    <script src="{{asset('/static/js/aq_auth.js')}}"></script>
    <script>
        $(function(){
            $('#nav li[tid={{$tid}}]').addClass('active');
            var aa = $('#nav>.nav-sub ul[tid={{$tid}}]').html();

            $('#main>#channel-nav ul[tid={{$tid}}]').html($('#main>#channel-nav ul[tid={{$tid}}]').html()+aa);
        })
    </script>
@endsection

