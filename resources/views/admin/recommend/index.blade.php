@extends('layouts.admin')
@section('content')

        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px;margin-bottom:100px;">
            <!--面包屑导航 开始-->
            <div class="crumb_warp">
                <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
                <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">推荐视频管理</a> &raquo; 推荐视频列表
            </div>
            <!--面包屑导航 结束-->

            <!--结果集标题与导航组件 开始-->
            <div class="result_wrap">

                <div class="result_content">
                    <div class="result_title">

                        @if(session('errors'))
                            <ul style="list-style:list;" id="info" class="list-group">
                                @foreach($errors ->all() as $error)
                                    <li class="bg-danger">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if(session('error'))
                            <p style="background:#f0ad4e"  class="bg-error"> {{session('error')}}</p>
                        @endif
                        @if(session('success'))
                            <p class="bg-success"> {{session('success')}}</p>
                        @endif

                    </div>
                    <script>
                        $(function(){
                            setTimeout(function(){
                                $('.result_title').hide();
                            },2000);

                        })
                    </script>
                    <div class="short_wrap"><a href="javascript:;"><i class="fa fa-plus"></i>关键字查询</a>
                        <input type="text" value="@if(!empty($search['key'])){{$search['key']}}@endif" id="key">
                        <button onclick="search()">搜索</button>
                    </div>

                    <div class="short_wrap padself">
                        <a href="javascript:;"><i class="fa fa-plus"></i>各种推荐:</a>
                        <a href="{{url('/admin/recommend/index/1')}}" class="btn btn-info
@if($tjstatus=='1')
                                btn-warning
@endif">栏目推荐</a>
                        <a href="{{url('/admin/recommend/index/2')}}" class="btn btn-info
@if($tjstatus=='2')
                                btn-warning
@endif">轮播图推荐</a>
                        <a href="{{url('/admin/recommend/index/3')}}" class="btn btn-info
@if($tjstatus=='3')
                                btn-warning
@endif">top推荐</a>
                    </div>

                    <div class="short_wrap padself">
                        <a href="{{url('/admin/recommend/index/1')}}" ><i class="fa fa-plus"></i>栏目推荐:</a>
                        @foreach($type as $k=>$v)
                            <a href="{{url('/admin/recommend/index/1?tid='.$v['tid'])}}" class="btn btn-info
@if(!empty($search['tid'])&&$v['tid'] ==  $search['tid'])
                                    btn-warning
@endif">{{$v['tname']}}推荐</a>
                        @endforeach
                    </div>

                    <script>
                        // 关键字搜索
                        function search(){
                            var key= $('#key').val();
                                if(!location.search){
                                    location.href = location.href + '?key='+key;
                                }else{
                                    location.href = location.href + '&key='+key;
                                }

                            return false;
                        }

                    </script>
                </div>

            </div>
            <!--结果集标题与导航组件 结束-->
            <div class="result_content">

                <table class="list_tab">
                    <tr>
                        <th>排序</th>
                        <th>ID</th>
                        <th>视频id</th>
                        <th>推荐视频标题</th>
                        <th>分类</th>
                        <th>推荐视频图片</th>
                        <th>上传时间</th>
                        <th>推荐状态</th>
                        <th>操作</th>

                    </tr>
                    @foreach($video as $k=>$v)
                    <tr>

                        <td><input type="text" name="order" id="{{$v['id']}}" style="width:40px" value="{{$v['order']}}"></td>
                        <td>{{$v['id']}}</td>
                        <td>
                            {{$v['vid']}}
                        </td>
                         <td>
                             {{$v['title']}}
                        </td>
                        <td>
                            {{$v['tname']}}
                        </td>
                        <td><img src="{{$v['img']}}" alt="" style="width:80px;height:40px"></td>
                        <td>{{date('Y-m-d H:i;s',$v['upload_time'])}}</td>
                        <td>
                            {{$status[$v['tjstatus']]}}
                        </td>
                        <script>
                            // 取消推荐
                            function del(id){
                                layer.confirm('是否确认取消推荐？', {
                                    btn: ['确定','取消'] //按钮
                                }, function(){
                                    $.get('{{url('/admin/recommend/del')}}',{id:id},function(data){
                                        layer.alert(data.msg);
                                        if(data.status==200){
                                            location.href = location.href;
                                        }
                                    })

                                }, function(){

                                });
                            }
                        </script>


                        <td>

                            <a href="javascript:;" data-id="{{$v['id']}}"  class="btn btn-sm btn-primary xxoo" >更改推荐类型</a>

                            <a href="javascript:;" onclick="del({{$v['id']}})" id="delete" class="btn btn-sm btn-danger">取消推荐</a>
                        </td>
                    </tr>
                  @endforeach
                </table>

            </div>
            {!! $video->appends($search)->render() !!}
            
        </div>
        <script>
            $(function(){
                // 排序ajax
                $('.list_tab input').change(function(){
                    var order = $(this).val();
                    var id = $(this).attr('id');
                    $.get('{{url('/admin/recommend/order')}}',{id:id,order:order},function(data){
                        alert(data.msg);
                        if(data.status==200){
                            location.href = location.href;
                        }
                    })
                });
                // 更改推荐类型弹框
                $('.xxoo').click(function(){
                    layer.open({
                        type: 1,
                        title : '更改推荐类型',
                        skin: 'layui-layer-demo', //样式类名
                        closeBtn: 1, //不显示关闭按钮
                        anim: 2,
                        shadeClose: true, //开启遮罩关闭
                        content: '<div id="abbb">' +
                        '<a class="btn btn-info" href="{{url('admin/recommend/change/1')}}?id='+$(this).attr('data-id')+'" >设为栏目推荐</a>'+
                        '<a class="btn btn-info" href="{{url('admin/recommend/change/2')}}?id='+$(this).attr('data-id')+'" >设为轮播图推荐</a>' +
                        '<a class="btn btn-info" href="{{url('admin/recommend/change/3')}}?id='+$(this).attr('data-id')+'" >设为top推荐</a>' +
                        '<a class="btn btn-info" href="{{url('admin/recommend/change/4')}}?id='+$(this).attr('data-id')+'" >设为猴子推荐</a>' +
                        '</div> <style>' +
                        '#abbb{' +
                        'width:200px;height:250px;}' +
                        '#abbb>a{' +
                        'display:block;margin:0px 40px;margin-top:30px}</style>'


                    });
                })
            })
        </script>

@endsection