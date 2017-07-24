@extends('layouts.admin')
@section('content')

        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <!--面包屑导航 开始-->
            <div class="crumb_warp">
                <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
                <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">视频管理</a> &raquo; 视频列表
            </div>
            <!--面包屑导航 结束-->

            <!--结果集标题与导航组件 开始-->
            <div class="result_wrap">
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
                <div class="result_content">
                    
                    <script>
                        $(function(){
                            setTimeout(function(){
                                $('.result_title').hide();
                            },2000);

                        })
                    </script>
                    <div class="short_wrap">
                        <a href="/admin/video/add"><i class="fa fa-plus"></i>新增视频</a>

                        {{--<a href="javascript:;" ><i class="fa fa-refresh"></i>更新排序</a>--}}
                        <input type="text" value="@if(!empty($search['key'])){{$search['key']}}@endif" id="key">
                        <button onclick="search()">搜索</button>
                    </div>
                    <script>
                        function search(){
                            var key= $('#key').val();
                                location.href = "{{url('admin/video/index')}}?key="+key;
                            return false;
                        }
                    </script>
                </div>

            </div>
            <!--结果集标题与导航组件 结束-->
            <div class="result_content">

                <table class="list_tab">
                    <tr>

                        <th>ID</th>
                        <th>视频标题</th>
                        <th>上传人</th>
                        <th>分类</th>
                        <th>视频图片</th>
                        <th>上传时间</th>
                        <th>状态</th>
                        <th>操作</th>

                    </tr>
                    @foreach($video as $k=>$v)
                    <tr>


                        <td>{{$v['vid']}}</td>
                         <td>
                             {{$v['title']}}
                        </td>
                        <td>
                            {{$v['name']}}
                        </td>
                        <td>
                            {{$v['tname']}}
                        </td>
                        <td><img src="{{$v['img']}}" alt="" style="width:80px;height:40px"></td>
                        <td>{{date('Y-m-d H:i;s',$v['upload_time'])}}</td>
                        <td>
                            {{$status[$v['status']]}}
                        </td>
                        <script>

                            function del(tid){
                                layer.confirm('是否确认删除？', {
                                    btn: ['确定','取消'] //按钮
                                }, function(){
                                    location.href = '{{url('/admin/video/delete/')}}/'+tid;

                                }, function(){
                                    return false;
                                });
                            }
                        </script>


                        <td>

                            <a href="{{url('/admin/video/detail/'.$v['vid'])}}" id="detail" class="btn btn-sm btn-primary">详情管理</a>

                            <a href="javascript:;" onclick="del({{$v['vid']}})" id="delete" class="btn btn-sm btn-danger">删除</a>
                        </td>
                    </tr>
                  @endforeach
                </table>

            </div>
            {!! $video->appends($search)->render() !!}
            
        </div>

@endsection