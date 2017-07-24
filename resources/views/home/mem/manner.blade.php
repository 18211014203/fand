@extends("home.layout.mem")
@section('css')
    <link rel="stylesheet" href="{{asset('/home/css/manner.css')}}">
@endsection
@section("area-main")
    @parent
    <div id="area-main-right" class="r">
        <div id="area-cont-right">
           <div id="block-title-banner">
                <p>过往投稿</p>
                <div>
                    <a href="/member/manner">AcFun</a>
                    <span class="d">Post History</span></div>
                <span class="clearfix"></span>
            </div>
            <div id="block-banner-right" class="block banner">
                <a href="{{url('member/video')}}" class="tab active">
                    <i class="icon"></i>视频投稿</a>

                <a href="{{url('member/manner')}}" class="tab">
                    <i class="icon"></i>过往投稿</a>
            </div>

            <div id="block-first" class="block">
                <div class="mainer">
                    <div id="list-channel-manage">
                        <div class="l">
                            <button data-tid="0" class="btn active primary">
                                <i class="icon icon-list"></i>所有分区</button>
                        </div>
                        <div class="r group">
                            @foreach($type as $v)
                            <button data-tid="{{$v['tid']}}" class="btn">{{$v['tname']}}</button>

                            @endforeach
                        </div>

                        <span class="clearfix"></span>
                    </div>
                    <div id="list-manage-manage">
                        <div data-tid="0" data-uid="{{$user['uid']}}" class="item block">
                             @if(!empty($video))
                                @foreach($video as $k=>$v)
                                    <div class="inner" style="overflow:hidden;">
                                <p class="hint-list-index">{{$k+1}}</p>
                                <div class="l">
                                    <a target="_blank" href="{{url('play/'.$v['vid'])}}" class="thumb thumb-preview">
                                        <img data-vid="{{$v['vid']}}" src="{{url($v['img'])}}" class="preview">
                                        <div class="cover"></div>
                                    </a>
                                </div>
                                <div class="r">
                                    <p class="block-title">
                                        <a href="{{url('v/'.$v['tid']).'/index'}}"  target="_blank" class="channel">{{$v['tname']}}</a>
                                        <a data-aid="3812968" target="_blank" href="{{url('play/'.$v['vid'])}}" title="" style="" class="title">{{$v['title']}}</a>

                                        </p>
                                    <div class="info">发布于
                                        <span class="time">{{date('m月d日(星期w) H时i分',$v['upload_time'])}}</span>&nbsp;&nbsp;/&nbsp;&nbsp;播放:
                                        <span class="views pts">{{$v['click']}}</span>&nbsp;&nbsp;评论:

                                        <span class="favors pts">{{$v['comment']}}</span></div>
                                    <p class="desc">{{$v['desc']}}</p>
                                    <div class="area-tag">
                                        <?php $arr = explode('-',$v['label']); ?>
                                        <a class="tag" href="javascirpt:;" target="_blank">@foreach($arr as $kk=>$vv) {{$vv}} @endforeach</a></div>
                                </div>
                                <div class="block-manage hide" >

                                    <button title="删除投稿" data-vid="{{$v['vid']}}" class="btn danger mini btn-delete">
                                        <i class="icon icon-times-circle-o"></i>删除
                                    </button>
                                </div>
                                <span class="clearfix"></span>
                            </div>@endforeach
                             @else
                                <p class="alert">尚未有任何投稿。</p>
                             @endif

                        </div>
                    </div>
                </div>
            </div>


@endsection
@section('js')
                <script>
                    $(function(){
                        $('#list-channel-manage button').click(function(){
                            var  tid = $(this).attr('data-tid');
                            var  uid ='{{$user['uid']}}';

                            $.post('{{url('member/data')}}',{'_token':'{{csrf_token()}}','tid':tid,'uid':uid},function(data){
                                $('#list-manage-manage').html(data);
                            });
                        });

                    })


                    $(function(){
                        $('.block-manage .btn-delete').click(function(){
                            var vid = $(this).attr('data-vid');
//                            alert(vid);
                            $.get('{{url('member/del')}}'+'/'+vid,function(data){

                            });
                        });
                    })
                </script>
@endsection