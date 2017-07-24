@extends("home.layout.mem")

@section('css')
    <link rel="stylesheet" href="{{asset('/home/css/layer.css')}}">
@endsection
@section("area-main")
   @parent
                <div id="area-main-right" class="r">
                    <div id="area-cont-right">
                        <div id="block-title-banner"><p>稿件收藏</p><div><a href="/member/">AcFun</a><span class="d">Favourites of Contributions</span></div><span class="clerafix"></span></div>
                        <div id="block-first" class="block">
                            <div class="mainer">

                                <div id="list-channel-favourite">
                                    <div class="l">
                                        <button data-tid="all" class="btn active primary">
                                            <i class="icon icon-list"></i>所有分区</button>
                                    </div>
                                    <div class="r group">
                                        @foreach($type as $v)
                                            <button data-tid="{{$v['tid']}}" class="btn">{{$v['tname']}}</button>

                                        @endforeach
                                    </div>

                                    <span class="clearfix"></span>
                                </div>
                                <div id="list-favourite-favourite">
                                    @if(!empty($video[0]))
                                    @foreach($video as $k=>$v)
                                    <div data-vid="{{$v['vid']}}" data-id="{{$v['id']}}" class="item block">
                                        <div class="inner">
                                            <div class="l">
                                                <a href="{{url('play/'.$v['vid'])}}" target="_blank" class="thumb thumb-preview">
                                                    <img data-aid="3812129" src="{{asset($v['img'])}}" class="preview"></a>

                                            </div>
                                            <div class="r" style="float:left;margin-left:10px;overflow:hidden;width:500px;">
                                                <p class="block-title">
                                                    <a href="{{url('v/'.$v['vid'].'/index')}}" target="_blank" title="点击访问{{$v['tname']}}频道" class="channel">{{$v['tname']}}</a>
                                                    <a href="{{url('play/'.$v['vid'])}}" data-vid="{{$v['vid']}}" target="_blank" class="title">{{$v['title']}}</a></p>
                                                <div class="area-info">
                                                    <a href="javascript:;" target="_blank" class="name">{{$v['name']}}</a>&nbsp;&nbsp;/&nbsp;&nbsp;发布于
                                                    <span class="time pts">{{date('m月d日(星期w) H时i分',$v['upload_time'])}}</span>&nbsp;&nbsp;/&nbsp;&nbsp;播放:
                                                    <span class="views pts">{{$v['click']}}</span>&nbsp;&nbsp;评论:
                                                    <span class="comments pts">{{$v['comment']}}</span>&nbsp;&nbsp;收藏:
                                                    <span class="favors pts">{{$v['collect']}}</span></div>
                                                <p class="desc">{{$v['desc']}}</p>
                                                <div class="area-tag">
                                                    <a class="tag" href="javascript:;" target="_blank">{{$v['label']}}</a>

                                                </div>
                                            </div>
                                            <div class="block-manage" style="float:right">
                                                <button title="删除收藏" data-id="{{$v['id']}}" class="btn danger mini btn-delete">
                                                    <i class="icon icon-times-circle-o"></i>删除收藏</button>
                                            </div>

                                            <span class="clearfix"></span>
                                        </div>
                                    </div>
                                    @endforeach
                                        <div id="pager" class="area-pager ">
                                            {!! $video->render() !!}
                                        </div>
                                    @else
                                        <p class="alert"><i class="icon icon-info-circle"></i>尚未有任何收藏项目。</p>
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
//        var  page = $('#pager>ul>li>.active').html();
        $(function(){
            $('#list-channel-favourite button').click(function(){
                var  tid = $(this).attr('data-tid');
                location.href = '{{url('member/collect')}}?tid='+tid;
            });
            $('#list-favourite-favourite .inner>.block-manage>button').click(function(){
                var id = $(this).attr('data-id');
                $.get('{{url('member/collectdel')}}'+'/'+id,function(data){
                    if(data.status==200){
                        $('#list-favourite-favourite>.item[data-id='+id+']').hide();
                    }
                    layer.msg(data.msg);

                });
            });
        })
    </script>

@endsection