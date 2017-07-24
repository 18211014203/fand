@extends('layouts.admin')
@section('content')

        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <!--面包屑导航 开始-->
            <div class="crumb_warp">
                <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
                <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">分类管理</a> &raquo; 分类列表
            </div>
            <!--面包屑导航 结束-->

            <!--结果集标题与导航组件 开始-->
            <div class="result_wrap">
                <div class="result_title">

                    @if(session('error'))
                        <p style="background:#f0ad4e">  {{session('error')}}</p>
                    @endif
                </div>
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
                            <p style="background:#f0ad4e" class="error"> {{session('error')}}</p>
                        @endif
                        @if(session('success'))
                            <p class="success"> {{session('success')}}</p>
                        @endif

                    </div>
                    <script>
                        $(function(){
                            setTimeout(function(){
                                $('.result_title').hide();
                            },2000);

                        })
                    </script>
                    <div class="short_wrap">
                        <a href="/admin/type/add"><i class="fa fa-plus"></i>新增分类</a>

                        <a href="javascript:;" ><i class="fa fa-refresh"></i>更新排序</a>
                    </div>
                </div>

            </div>
            <!--结果集标题与导航组件 结束-->
            <div class="result_content">

                <table class="list_tab">
                    <tr>
                        <th>序号</th>
                        <th>ID</th>
                        <th>分类名</th>
                        <th>父分类</th>
                        <th>分类图片</th>
                        <th>操作</th>

                    </tr>
                    @foreach($type as $k=>$v)
                    <tr>

                        <td ><input type="text" tid="{{$v['tid']}}" style="width:30px" value="{{$v['order']}}" class="form-control" size="5"></td>
                        <td>{{$v['tid']}}</td>
                        @if($v['pid']==0)
                        <td>
                                <a href="{{url('/admin/type/index/'.$v['tid'])}}">{{$v['tname']}}
                                </a>
                        </td>
                            <td>
                                {{$v['pname']}}
                            </td>
                        @else
                         <td>
                             {{$v['tname']}}
                        </td>
                        <td>
                            <a href="{{url('admin/type/index')}}">{{$v['pname']}}</a>
                        </td>

                        @endif
                        <script>

                            function del(tid){
                                layer.confirm('是否确认删除？', {
                                    btn: ['确定','取消'] //按钮
                                }, function(){
                                    location.href = '{{url('/admin/type/delete/')}}/'+tid;

                                }, function(){
                                    return false;
                                });
                            }
                        </script>
                        <td><img src="{{$v['timg']}}" alt="" style="width:80px;height:40px"></td>

                        <td>
                            <a href="{{url('/admin/type/detail/'.$v['tid'])}}" id="detail" class="list">详情修改</a>
                            <a href="javascript:;" onclick="del({{$v['tid']}})" id="delete" class="list">删除</a>
                        </td>
                    </tr>
                  @endforeach
                </table>

            </div>
            {{--{!! $type->append($request)->render() !!}--}}
            
        </div>
        <script>
            $(function(){
                $('input').change(function(){
                    var order = $(this).val();
                    var tid = $(this).attr('tid');
                    $.get('{{url('/admin/type/order')}}',{tid:tid,order:order},function(data){
                       layer.alert(data.msg);
                       if(data.status==200){
                           location.href = location.href;
                       }
                    })
                });


            })
        </script>
@endsection