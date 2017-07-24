@extends("home.layout.index")

@section('css')
    <link rel="stylesheet" href="{{asset('/static/css/core.min.css')}}">
    <link rel="stylesheet" href="{{asset('/static/css/index.min.css')}}">
@endsection
@section("main")
    <!-- main start -->
    <div id="main" class="main">
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

                        <li>
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


        @foreach($type as $k=>$v)

            @if(!empty($tjvideo[$v['tid']]))
                @if($k<=2)
                    @if($k==2)
                    <!-- 双图广告 -->
                        <div b-id="9" b-name="【10】双图广告" b-type="8" class="area area-ad">
                            <div class="wp clearfix">
                                <a href="" target="_blank" m-id="40" class="fl">
                                    <img src="{{asset($adver[0]['img'])}}"  /></a>
                                <a href="" target="_blank" m-id="41" class="fr">
                                    <img src="{{asset($adver[1]['img'])}}"/></a>
                            </div>
                        </div>
                        <!-- 双图广告 end -->
                    @endif
                        <!-- 版块 -->
                        <section  tid="{{$v['tid']}}" tname="{{$v['tname']}}" class="wp clearfix column-box area area-channel area-channel-big">
                            <div data-tab="" class="column-left">
                                <header class="clearfix area-header">
                                    <h3 class="fl area-title">
                                        <a href="javascript:;" target="_blank">
                                            <img src="{{$v['timg']}}"  width="40" height="40" class="fl" /></a>
                                        <b>
                                            <a href="javascript:;" target="_blank">{{$v['tname']}}</a></b>
                                    </h3>

                                    <a href="/list/{{$v['tid']}}" target="_blank" class="fr area-more">
                                        <span>更多</span>
                                        <i class="icon icon-arrow-slim-right"></i>
                                    </a>
                                    <div m-id="16" style="display:none;" m-name="文字连接" m-type="4" class="fr area-recommend">
                                        <p>
                                <span>
                                    <a href="http://www.acfun.cn/spn/sonygeek" target="_blank" title="索尼极客养成计划">索尼极客养成计划</a>
                                    <i>/</i>
                                </span>
                                            <span>
                                    <a href="/v/ac3648565" target="_blank" title="全国电视相声大赛">全国电视相声大赛</a>
                                    <i>/</i>
                                </span>
                                        </p>
                                    </div>
                                </header>

                                <div class="clearfix column-box area-main">

                                    <div m-id="14" m-name="大图视频推荐" m-type="7" class="fl module module-video-big">
                                        <a href="{{url('/play/'.$tjvideo[$v['tid']][0]['vid'])}}" target="_blank"  class="mask-video has-danmu">
                                            <img src="{{$tjvideo[$v['tid']][0]['img']}}"  width="340" height="240" />

                                            <span class="mask-video-icon">
                                    <i class="icon icon-triangle-right"></i>
                                </span>
                                        </a>
                                        <p>
                                            <b class="text-overflow">
                                                <a href="{{ url('/play/'.$tjvideo[$v['tid']][0]['vid']) }}" target="_blank" >
                                                    {{$tjvideo[$v['tid']][0]['title']}}
                                                </a>
                                            </b>
                                            <em class="text-overflow">{{$tjvideo[$v['tid']][0]['desc']}}</em></p>
                                    </div>
                                    <div data-pagecount="4" data-showlength="11" m-id="15" m-name="小图视频推荐" m-type="8" class="clearfix module-video">

                                        @foreach($tjvideo[$v['tid']] as $key => $value)
                                            @if($key!==0)
                                                <figure class="fl block-box block-video @if($value['upload_time']<(time()-3600*24*7)) is-recommend @endif">
                                                    <a href="{{url('/play/'.$value['vid'])}}" data-did="5344456" target="_blank" class="block-img has-danmu">
                                                        <img src="{{asset($value['img'])}}" width="100%" height="100%" />

                                                        <i>@if($value['upload_time']<(time()-3600*24*7))推荐 @endif</i>
                                                    </a>
                                                    <figcaption class="block-title">
                                                        <b>
                                                            <a href="{{url('/play/'.$value['vid'])}}" target="_blank">
                                                                {{$value['title']}}
                                                            </a>
                                                        </b>
                                                        <p class="clearfix">
                                                            <span class="icon icon-view-player">{{$value['click']}}</span>
                                                            <span class="icon icon-danmu">{{$value['comment']}}</span></p>
                                                    </figcaption>
                                                </figure>
                                            @endif

                                        @endforeach
                                    </div>

                                </div>

                            </div>


                            <div class="column-right" style="display: none">
                                <section data-tab="" b-id="4" b-name="{{$v['tname']}}" b-type="4" class="module module-rank">
                                    <header class="clearfix module-header">
                                        <div class="fl module-title">
                                            <b>
                                                <a href="javascript:;" target="_blank" title="{{$v['tname']}}排行榜">
                                                    {{$v['tname']}}排行榜
                                                </a>
                                            </b>
                                        </div>

                                    </header>
                                    <div m-id="17" m-name="排行榜" m-type="17" class="module-main">
                                        <div class="module-con">
                                            <ul data-con="1">

                                                <li class="has-img">
                                        <span>
                                            <i>1</i>
                                        </span>
                                                    <a href="/v/ac3810827" title="【阅后即瞎】这段相声把纽约黑手党老大听哭了&#13;UP:阅后即瞎&#13;发布于2017-06-26 21:18:35&#160;/&#160;点击：41.8万&#160;/&#160;评论：814" target="_blank" class="fl img-wp">
                                                        <img data-original="http://imgs.aixifan.com/content/2017_06_26/1498479232.jpg?imageView2/1/w/180/h/100" src="/static/picture/1.png" width="90" height="50" /></a>
                                                    <b>
                                                        <a href="/v/ac3810827" title="【阅后即瞎】这段相声把纽约黑手党老大听哭了&#13;UP:阅后即瞎&#13;发布于2017-06-26 21:18:35&#160;/&#160;点击：41.8万&#160;/&#160;评论：814" target="_blank">【阅后即瞎】这段相声把纽约黑手党老大听哭了</a></b>
                                                    <p class="text-overflow">
                                                        <a href="http://www.acfun.cn/u/11842903.aspx" target="_blank" title="阅后即瞎">UP: 阅后即瞎</a></p>
                                                    <p>
                                            <span class="icon icon-view-player">
                                                <strong>41.8万</strong></span>
                                                        <span class="icon icon-comments">
                                                <strong>814</strong></span>
                                                    </p>
                                                </li>
                                                <li class="has-img">
                                        <span>
                                            <i>2</i>
                                        </span>
                                                    <a href="/v/ac3810823" title="【奥雷】童年阴影系列之三十九《东方三侠》速看&#13;UP:奥雷卡尔克斯&#13;发布于2017-06-26 21:16:50&#160;/&#160;点击：17.9万&#160;/&#160;评论：188" target="_blank" class="fl img-wp">
                                                        <img data-original="http://imgs.aixifan.com/content/2017_06_26/1498480770.jpg?imageView2/1/w/180/h/100" src="/static/picture/1.png" width="90" height="50" /></a>
                                                    <b>
                                                        <a href="/v/ac3810823" title="【奥雷】童年阴影系列之三十九《东方三侠》速看&#13;UP:奥雷卡尔克斯&#13;发布于2017-06-26 21:16:50&#160;/&#160;点击：17.9万&#160;/&#160;评论：188" target="_blank">【奥雷】童年阴影系列之三十九《东方三侠》速看</a></b>
                                                    <p class="text-overflow">
                                                        <a href="http://www.acfun.cn/u/878702.aspx" target="_blank" title="奥雷卡尔克斯">UP: 奥雷卡尔克斯</a></p>
                                                    <p>
                                            <span class="icon icon-view-player">
                                                <strong>17.9万</strong></span>
                                                        <span class="icon icon-comments">
                                                <strong>188</strong></span>
                                                    </p>
                                                </li>
                                                <li class="has-img has-img-last">
                                        <span>
                                            <i>3</i>
                                        </span>
                                                    <a href="/v/ac3811073" title="【搬运】广西车神叛逆少年之夺命125 第十一章更新了！！&#13;UP:丶折一束月光为镜&#13;发布于2017-06-26 23:05:47&#160;/&#160;点击：15.2万&#160;/&#160;评论：94" target="_blank" class="fl img-wp">
                                                        <img data-original="http://imgs.aixifan.com/content/2017_06_26/1498489138.png?imageView2/1/w/180/h/100" src="/static/picture/1.png" width="90" height="50" /></a>
                                                    <b>
                                                        <a href="/v/ac3811073" title="【搬运】广西车神叛逆少年之夺命125 第十一章更新了！！&#13;UP:丶折一束月光为镜&#13;发布于2017-06-26 23:05:47&#160;/&#160;点击：15.2万&#160;/&#160;评论：94" target="_blank">【搬运】广西车神叛逆少年之夺命125 第十一章更新了！！</a></b>
                                                    <p class="text-overflow">
                                                        <a href="http://www.acfun.cn/u/1751102.aspx" target="_blank" title="丶折一束月光为镜">UP: 丶折一束月光为镜</a></p>
                                                    <p>
                                            <span class="icon icon-view-player">
                                                <strong>15.2万</strong></span>
                                                        <span class="icon icon-comments">
                                                <strong>94</strong></span>
                                                    </p>
                                                </li>
                                                <li>
                                        <span>
                                            <i>4</i>
                                        </span>
                                                    <a href="/v/ac3810558" title="名著村版《深夜食堂》你一定没看过&#13;UP:大蝈小酱&#13;发布于2017-06-26 19:16:01&#160;/&#160;点击：11.8万&#160;/&#160;评论：66" target="_blank">名著村版《深夜食堂》你一定没看过</a></li>

                                            </ul>
                                            <ul data-con="2" class="hidden">
                                                <li class="has-img">
                                        <span>
                                            <i>1</i>
                                        </span>
                                                    <a href="/v/ac3798061" title="黑人小伙Wil Aime 的神作短片合集&#13;UP:黑白天空~~&#13;发布于2017-06-21 21:06:19&#160;/&#160;点击：81.6万&#160;/&#160;评论：455" target="_blank" class="fl img-wp">
                                                        <img data-original="http://imgs.aixifan.com/content/2017_06_21/1498050373.gif?imageView2/1/w/180/h/100" src="/static/picture/1.png" width="90" height="50" /></a>
                                                    <b>
                                                        <a href="/v/ac3798061" title="黑人小伙Wil Aime 的神作短片合集&#13;UP:黑白天空~~&#13;发布于2017-06-21 21:06:19&#160;/&#160;点击：81.6万&#160;/&#160;评论：455" target="_blank">黑人小伙Wil Aime 的神作短片合集</a></b>
                                                    <p class="text-overflow">
                                                        <a href="http://www.acfun.cn/u/1373203.aspx" target="_blank" title="黑白天空~~">UP: 黑白天空~~</a></p>
                                                    <p>
                                            <span class="icon icon-view-player">
                                                <strong>81.6万</strong></span>
                                                        <span class="icon icon-comments">
                                                <strong>455</strong></span>
                                                    </p>
                                                </li>
                                                <li class="has-img">
                                        <span>
                                            <i>2</i>
                                        </span>
                                                    <a href="/v/ac3800635" title="速度激情面 @野食小哥&#13;UP:野食小哥&#13;发布于2017-06-22 18:25:18&#160;/&#160;点击：56.2万&#160;/&#160;评论：659" target="_blank" class="fl img-wp">
                                                        <img data-original="http://imgs.aixifan.com/content/2017_06_22/1498125556.png?imageView2/1/w/180/h/100" src="/static/picture/1.png" width="90" height="50" /></a>
                                                    <b>
                                                        <a href="/v/ac3800635" title="速度激情面 @野食小哥&#13;UP:野食小哥&#13;发布于2017-06-22 18:25:18&#160;/&#160;点击：56.2万&#160;/&#160;评论：659" target="_blank">速度激情面 @野食小哥</a></b>
                                                    <p class="text-overflow">
                                                        <a href="http://www.acfun.cn/u/4551417.aspx" target="_blank" title="野食小哥">UP: 野食小哥</a></p>
                                                    <p>
                                            <span class="icon icon-view-player">
                                                <strong>56.2万</strong></span>
                                                        <span class="icon icon-comments">
                                                <strong>659</strong></span>
                                                    </p>
                                                </li>
                                                <li class="has-img has-img-last">
                                        <span>
                                            <i>3</i>
                                        </span>
                                                    <a href="/v/ac3804757" title="2017年6月第4周碉堡傻缺视频合辑&#13;UP:关注撸主三十年&#13;发布于2017-06-24 09:56:37&#160;/&#160;点击：53.5万&#160;/&#160;评论：77" target="_blank" class="fl img-wp">
                                                        <img data-original="http://imgs.aixifan.com/content/2017_06_24/1498265748.gif?imageView2/1/w/180/h/100" src="/static/picture/1.png" width="90" height="50" /></a>
                                                    <b>
                                                        <a href="/v/ac3804757" title="2017年6月第4周碉堡傻缺视频合辑&#13;UP:关注撸主三十年&#13;发布于2017-06-24 09:56:37&#160;/&#160;点击：53.5万&#160;/&#160;评论：77" target="_blank">2017年6月第4周碉堡傻缺视频合辑</a></b>
                                                    <p class="text-overflow">
                                                        <a href="http://www.acfun.cn/u/331065.aspx" target="_blank" title="关注撸主三十年">UP: 关注撸主三十年</a></p>
                                                    <p>
                                            <span class="icon icon-view-player">
                                                <strong>53.5万</strong></span>
                                                        <span class="icon icon-comments">
                                                <strong>77</strong></span>
                                                    </p>
                                                </li>
                                                <li>
                                        <span>
                                            <i>4</i>
                                        </span>
                                                    <a href="/v/ac3806055" title="网络上常见的GIF动态图 第六十四期&#13;UP:九星之歌&#13;发布于2017-06-24 20:12:54&#160;/&#160;点击：47.3万&#160;/&#160;评论：167" target="_blank">网络上常见的GIF动态图 第六十四期</a></li>
                                                <li>
                                        <span>
                                            <i>5</i>
                                        </span>
                                                    <a href="/v/ac3800871" title="自从这群歪果仁被中国方言虐到怀疑人生以后。。。&#13;UP:歪果仁研究协会&#13;发布于2017-06-22 19:13:01&#160;/&#160;点击：47万&#160;/&#160;评论：714" target="_blank">自从这群歪果仁被中国方言虐到怀疑人生以后。。。</a></li>
                                                <li>
                                        <span>
                                            <i>6</i>
                                        </span>
                                                    <a href="/v/ac3797604" title="老家的表弟来和我借钱，究其原因后的我大怒&#13;UP:酷酷的滕&#13;发布于2017-06-21 18:11:47&#160;/&#160;点击：44万&#160;/&#160;评论：387" target="_blank">老家的表弟来和我借钱，究其原因后的我大怒</a></li>
                                                <li>
                                        <span>
                                            <i>7</i>
                                        </span>
                                                    <a href="/v/ac3810827" title="【阅后即瞎】这段相声把纽约黑手党老大听哭了&#13;UP:阅后即瞎&#13;发布于2017-06-26 21:18:35&#160;/&#160;点击：41.8万&#160;/&#160;评论：814" target="_blank">【阅后即瞎】这段相声把纽约黑手党老大听哭了</a></li>
                                                <li>
                                        <span>
                                            <i>8</i>
                                        </span>
                                                    <a href="/v/ac3795346" title="广西车神叛逆少年之夺命125 第十章来辣！！上代恩怨！&#13;UP:比尔的兔子&#13;发布于2017-06-20 22:53:00&#160;/&#160;点击：37.8万&#160;/&#160;评论：309" target="_blank">广西车神叛逆少年之夺命125 第十章来辣！！上代恩怨！</a></li>
                                                <li>
                                        <span>
                                            <i>9</i>
                                        </span>
                                                    <a href="/v/ac3800550" title="【奥雷】看完直呼过瘾的动作片《侠盗高飞》速看&#13;UP:奥雷卡尔克斯&#13;发布于2017-06-22 18:06:51&#160;/&#160;点击：32.7万&#160;/&#160;评论：331" target="_blank">【奥雷】看完直呼过瘾的动作片《侠盗高飞》速看</a></li>
                                                <li>
                                        <span>
                                            <i>10</i>
                                        </span>
                                                    <a href="/v/ac3795239" title="【奥雷】丧葬用品店的悲惨故事《鬼三惊2》速看&#13;UP:奥雷卡尔克斯&#13;发布于2017-06-20 21:50:27&#160;/&#160;点击：32.1万&#160;/&#160;评论：278" target="_blank">【奥雷】丧葬用品店的悲惨故事《鬼三惊2》速看</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </section>
                        <!-- 版块 end -->
                @elseif($k>2)
                        <!-- 版块2 -->
                        <section  tid="{{$v['tid']}}" tname="{{$v['tname']}}" class="wp clearfix column-box area area-channel area-channel-middle">
                            <div data-tab="" class="column-left">
                                <header class="clearfix area-header">
                                    <h3 class="fl area-title">
                                        <a href="javascript:;" target="_blank">
                                            <img src="{{$v['timg']}}"  width="40" height="40" class="fl" /></a>
                                        <b>
                                            <a href="javascript:;" target="_blank">{{$v['tname']}}</a></b>
                                    </h3>

                                    <a href="{{url('/list/'.$v['tid'])}}" target="_blank" class="fr area-more">
                                        <span>更多</span>
                                        <i class="icon icon-arrow-slim-right"></i>
                                    </a>

                                </header>
                                <div m-id="45" m-name="小图视频推荐" m-type="8" class="column-box area-main">
                                    <div data-pagecount="4" data-showlength="10" class="clearfix module-video">

                                        @foreach($tjvideo[$v['tid']] as $key => $value)
                                            @if($key<10)
                                                <figure class="fl block-box block-video @if($value['upload_time']<(time()-3600*24*7)) is-recommend @endif">
                                                    <a href="{{url('/play/'.$value['vid'])}}" data-did="5344456" target="_blank" class="block-img has-danmu">
                                                        <img src="{{asset($value['img'])}}" width="100%" height="100%" />
                                                        <i>@if($value['upload_time']<(time()-3600*24*7))推荐 @endif</i>
                                                    </a>
                                                    <figcaption class="block-title">
                                                        <b>
                                                            <a href="/v/ac3810569" target="_blank">
                                                                {{$value['title']}}
                                                            </a>
                                                        </b>
                                                        <p class="clearfix">
                                                            <span class="icon icon-view-player">{{$value['click']}}</span>
                                                            <span class="icon icon-danmu">{{$value['comment']}}</span></p>
                                                    </figcaption>
                                                </figure>
                                            @endif

                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <div class="column-right" style="display: none">
                                <section data-tab="" b-id="11" b-name="【11】影视" b-type="5" class="module module-rank">
                                    <header class="clearfix module-header">
                                        <div class="fl module-title">
                                            <b>
                                                <a href="/rank/list/#cid=68;range=1" target="_blank" title="影视排行榜">影视排行榜</a></b>
                                        </div>
                                        <div class="fr module-tab">
                                            <a href="javascript:;" data-nav="1" class="active">日榜</a>
                                          </div>
                                    </header>
                                    <div m-id="47" m-name="排行榜" m-type="17" class="module-main">
                                        <div class="module-con">
                                            <ul data-con="1">
                                             
                                            </ul>
                                            <ul data-con="2" class="hidden">
                                                <li class="has-img">
                                        <span>
                                            <i>1</i>
                                        </span>
                                                    <a href="/v/ac3795611" title="【1080P】生化危机：复仇 【2017】【中英字幕 】&#13;UP:fsffsfs&#13;发布于2017-06-21 02:07:50&#160;/&#160;点击：133.8万&#160;/&#160;评论：1087" target="_blank" class="fl img-wp">
                                                        <img data-original="http://imgs.aixifan.com/content/2017_06_20/1497981969.jpg?imageView2/1/w/180/h/100" src="/static/picture/1.png" width="90" height="50" /></a>
                                                    <b>
                                                        <a href="/v/ac3795611" title="【1080P】生化危机：复仇 【2017】【中英字幕 】&#13;UP:fsffsfs&#13;发布于2017-06-21 02:07:50&#160;/&#160;点击：133.8万&#160;/&#160;评论：1087" target="_blank">【1080P】生化危机：复仇 【2017】【中英字幕 】</a></b>
                                                    <p class="text-overflow">
                                                        <a href="http://www.acfun.cn/u/282040.aspx" target="_blank" title="fsffsfs">UP: fsffsfs</a></p>
                                                    <p>
                                            <span class="icon icon-view-player">
                                                <strong>133.8万</strong></span>
                                                        <span class="icon icon-comments">
                                                <strong>1087</strong></span>
                                                    </p>
                                                </li>
                                                <li class="has-img">
                                        <span>
                                            <i>2</i>
                                        </span>
                                                    <a href="/v/ac3801332" title="这是史上最搞笑的连环杀手&#13;UP:吐嚎影院&#13;发布于2017-06-22 22:04:14&#160;/&#160;点击：22万&#160;/&#160;评论：66" target="_blank" class="fl img-wp">
                                                        <img data-original="http://imgs.aixifan.com/content/2017_06_22/1498140064.gif?imageView2/1/w/180/h/100" src="/static/picture/1.png" width="90" height="50" /></a>
                                                    <b>
                                                        <a href="/v/ac3801332" title="这是史上最搞笑的连环杀手&#13;UP:吐嚎影院&#13;发布于2017-06-22 22:04:14&#160;/&#160;点击：22万&#160;/&#160;评论：66" target="_blank">这是史上最搞笑的连环杀手</a></b>
                                                    <p class="text-overflow">
                                                        <a href="http://www.acfun.cn/u/2084707.aspx" target="_blank" title="吐嚎影院">UP: 吐嚎影院</a></p>
                                                    <p>
                                            <span class="icon icon-view-player">
                                                <strong>22万</strong></span>
                                                        <span class="icon icon-comments">
                                                <strong>66</strong></span>
                                                    </p>
                                                </li>
                                                <li class="has-img has-img-last">
                                        <span>
                                            <i>3</i>
                                        </span>
                                                    <a href="/v/ac3805628" title="【木鱼微剧场】《Legal High/胜者即是正义》（P5）燃！最终Boss三木的仙羽化学案&#13;UP:木鱼水心&#13;发布于2017-06-24 16:58:35&#160;/&#160;点击：17.7万&#160;/&#160;评论：129" target="_blank" class="fl img-wp">
                                                        <img data-original="http://imgs.aixifan.com/content/2017_06_24/1498294698.jpg?imageView2/1/w/180/h/100" src="/static/picture/1.png" width="90" height="50" /></a>
                                                    <b>
                                                        <a href="/v/ac3805628" title="【木鱼微剧场】《Legal High/胜者即是正义》（P5）燃！最终Boss三木的仙羽化学案&#13;UP:木鱼水心&#13;发布于2017-06-24 16:58:35&#160;/&#160;点击：17.7万&#160;/&#160;评论：129" target="_blank">【木鱼微剧场】《Legal High/胜者即是正义》（P5）燃！最终Boss三木的仙羽化学案</a></b>
                                                    <p class="text-overflow">
                                                        <a href="http://www.acfun.cn/u/707822.aspx" target="_blank" title="木鱼水心">UP: 木鱼水心</a></p>
                                                    <p>
                                            <span class="icon icon-view-player">
                                                <strong>17.7万</strong></span>
                                                        <span class="icon icon-comments">
                                                <strong>129</strong></span>
                                                    </p>
                                                </li>
                                                <li>
                                        <span>
                                            <i>4</i>
                                        </span>
                                                    <a href="/v/ac3803091" title="【电影·拯救世界】犯罪喜剧《小孩好黑》你见过这么短的黑人吗？&#13;UP:地下11楼&#13;发布于2017-06-23 15:37:07&#160;/&#160;点击：17.6万&#160;/&#160;评论：238" target="_blank">【电影·拯救世界】犯罪喜剧《小孩好黑》你见过这么短的黑人吗？</a></li>
                                                <li>
                                        <span>
                                            <i>5</i>
                                        </span>
                                                    <a href="/v/ac3802523" title="让外国人震惊的武打动作片，究竟有多牛b？&#13;UP:电影纵贯线&#13;发布于2017-06-23 12:26:32&#160;/&#160;点击：17.2万&#160;/&#160;评论：103" target="_blank">让外国人震惊的武打动作片，究竟有多牛b？</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <footer class="module-footer">
                                        <a href="/rank/list/#cid=68;range=1" target="_blank" class="more">查看完整榜单
                                            <i class="icon icon-arrow-slim-right"></i></a>
                                    </footer>
                                </section>
                            </div>
                        </section>
                        <!-- 版块2 end -->
                @endif

            @endif

        @endforeach


        <!-- 动画 -->
        <div style="width: 250px;height: 400px;margin: -2415px 140px 0px 5px;float: right;">
        <div>
        <p style="font-size: 20px;font-weight: 20px;margin-top:0px ">动画排行榜</p><br>
        @foreach($donghua as $k=>$v)
        @if($k<2)
<img src="{{$v['img']}}" style="width: 50px;height: 40px;background-color: blue;margin: -12px 0px 0px 5px ">
<span style="display: block;margin: -39px 0px 0px 60px"><a>{{$v['title']}}</a></span><br>

        @endif
        @if($k>3 && $k<12)
<div style="height: 10px"></div>

<span style="margin: -12px 0px 0px 10px;overflow:hidden;height: 10px"><a>{{$v['title']}}</a></span>
        @endif
        @endforeach
        </div>
            
        </div>
        <!-- 音乐 -->
   <div style="width: 250px;height: 400px;margin: -1907px 140px 0px 5px;float: right;">
        <div>
        <p style="font-size: 20px;font-weight: 20px;margin-top:0px ">音乐排行榜</p><br>
        @foreach($yinyue as $k=>$v)
        @if($k<2)
<img src="{{$v['img']}}" style="width: 50px;height: 40px;background-color: blue;margin: -12px 0px 0px 5px ">
<span style="display: block;margin: -39px 0px 0px 60px"><a>{{$v['title']}}</a></span><br>

        @endif
        @if($k>3 && $k<12)
<div style="height: 10px"></div>

<span style="margin: -12px 0px 0px 10px;overflow:hidden;height: 10px"><a>{{$v['title']}}</a></span>
        @endif
        @endforeach
        </div>
            
        </div>
        <!-- 游戏 -->
         <div style="width: 250px;height: 400px;margin: -1270px 140px 0px 5px;float: right;">
        <div>
        <p style="font-size: 20px;font-weight: 20px;margin-top:0px ">游戏排行榜</p><br>
        @foreach($game as $k=>$v)
        @if($k<2)
<img src="{{$v['img']}}" style="width: 50px;height: 40px;background-color: blue;margin: -12px 0px 0px 5px ">
<span style="display: block;margin: -39px 0px 0px 60px"><a>{{$v['title']}}</a></span><br>

        @endif
        @if($k>3 && $k<14)
<div style="height: 10px"></div>

<span style="margin: -12px 0px 0px 10px;overflow:hidden;height: 10px"><a>{{$v['title']}}</a></span>
        @endif
        @endforeach
        </div>
            
        </div>
        <!-- 科技 -->
        <div style="width: 250px;height: 400px;margin: -755px 140px 0px 5px;float: right;overflow: hidden;">
        <div>
        <p style="font-size: 20px;font-weight: 20px;margin-top:0px ">科技排行榜</p><br>
        @foreach($keji as $k=>$v)
        @if($k<2)
<img src="{{$v['img']}}" style="width: 50px;height: 40px;background-color: blue;margin: -12px 0px 0px 5px ">
<span style="display: block;margin: -39px 0px 0px 60px"><a>{{$v['title']}}</a></span><br>

        @endif
        @if($k>3 && $k<10)
<div style="height: 10px"></div>

<span style="margin: -12px 0px 0px 10px;overflow:hidden;height: 10px"><a>{{$v['title']}}</a></span>
        @endif
        @endforeach
        </div>
            
        </div>
        <!-- 舞蹈 -->
             <div style="width: 250px;height: 400px;margin: -375px 140px 0px 5px;float: right;overflow: hidden;">
        <div>
        <p style="font-size: 20px;font-weight: 20px;margin-top:0px ">舞蹈排行榜</p><br>
        @foreach($dance as $k=>$v)
        @if($k<2)
<img src="{{$v['img']}}" style="width: 50px;height: 40px;background-color: blue;margin: -12px 0px 0px 5px ">
<span style="display: block;margin: -39px 0px 0px 60px"><a>{{$v['title']}}</a></span><br>

        @endif
        @if($k>3 && $k<10)
<div style="height: 10px"></div>

<span style="margin: -12px 0px 0px 10px;overflow:hidden;height: 10px"><a>{{$v['title']}}</a></span>
        @endif
        @endforeach
        </div>
            
        </div>

    </div>
@endsection
@section('js')
    <script src="{{asset('/static/js/aq_auth.js')}}"></script>
@endsection