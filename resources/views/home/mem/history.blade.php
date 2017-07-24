@extends("home.layout.mem")

@section('css')
    <link rel="stylesheet" href="{{asset('/home/css/layer.css')}}">
@endsection

@section("area-main")
    <!-- main  主体 -->

          @parent
                <div id="area-main-right" class="r">
                    <div id="area-cont-right">

                        <div id="block-title-banner">
                            <p>历史</p>
                            <div>
                                <a href="/member/info">AcFun</a>
                                <span class="d">History</span></div>
                            <span class="clearfix"></span>
                        </div>
                        <div id="block-banner-right" class="block banner">
                            <a href="javascript:;" data-type="views" class="tab active">
                                <i class="icon"></i>浏览历史</a>
                        </div>

                        <div id="block-first" class="block">
                            <div class="mainer">
                                <p class="alert alert-info">
                                    <button id="btn-clear-history" title="点击清空所有历史记录" class="btn danger r">
                                        <i class="icon icon-times-circle-o"></i>清空历史记录</button>下方列表中记录着您近期的浏览历史记录。
                                    <br>您可以点击右侧按钮以清空所有历史记录。
                                    <span class="clearfix"></span></p>

                                <p class="divider"></p>

                                <div id="list-history">

                                    @if(!empty($video[0]))
                                    @foreach($video as $k=>$v)
                                    <div data-index="" class="item block item-views item-post">
                                        <div class="inner">
                                            <div class="l">
                                                <a target="_blank" href="{{url('play')}}/{{$v['vid']}}" class="thumb thumb-preview">
                                                    <img src="{{asset($v['img'])}}" class="preview">
                                                    <div class="cover"></div>
                                                </a>

                                            </div>
                                            <div class="r"  style="float:left;margin-left:50px;">
                                                <p class="block-title">
                                                    <a href="{{url('/v/'.$v['tid']).'/index'}}" title="点击访问{{$v['tname']}}频道" target="_blank" class="channel">{{$v['tname']}}</a>
                                                    <a target="_blank" href="{{url('play')}}/{{$v['vid']}}" class="title">{{$v['title']}}</a></p>
                                                <div class="area-info">
                                                    <a target="_blank" href="javascript:;" class="name ">{{$v['name']}}</a>/ 发布于
                                                    <span class="time pts">{{date('m月d日(星期w) H时i分',$v['upload_time'])}}</span></div>
                                                <p class="hint-time-history">浏览于 {{date('m月d日(星期w) H时i分',$v['looktime'])}}</p>
                                                <button title="删除历史记录" data-id="{{$v['id']}}" class="btn danger mini btn-delete">
                                                    <i class="icon icon-times-circle-o"></i>删除历史记录
                                                </button>
                                            </div>



                                            <span class="clearfix"></span>
                                        </div>
                                        <div class="area-cont">
                                            <p class="cont"></p>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div id="pager" class="area-pager ">
                                            {!! $video->render() !!}
                                    </div>
                                    @else
                                        <p class="alert">尚未有任何历史</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

@endsection
@section('js')
    <script type="text/javascript" src="{{asset('static/layer-v3.0.3/layer/layer.js')}}"></script>
    <script>
        $(function(){
            $('#pager ul>li>*').addClass('pager pager-forces');
            $('#pager ul>li[class=active]').find('span').addClass('active');
        })

        $(function(){
            $('.inner .r>.btn').click(function(){
                var id = $(this).attr('data-id');
                $.get('{{url('member/del')}}'+'/'+id,function(data){
                    if(data.status==200){
                        location.href = location.href;
                    }
                    layer.msg(data.msg);

                });
            });
        })
        $(function(){
            $('#btn-clear-history').click(function(){

                $.get('{{url('member/del/all')}}',function(data){
                    if(data.status==200){
                       location.href = location.pathname;
                    }
                    layer.msg(data.msg);

                });
            });
        })

    </script>
@endsection