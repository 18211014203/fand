@extends('layouts.admin')
@section('content')
		
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <div class="result_content">
            <h1>友情链接列表</h1>
                <table class="list_tab" style="text-align:center">
                    <tr>                     
                        <th>ID</th>
                        <th>链接名</th>
                        <th>链接地址</th>
                        <th>链接logo</th>
                        <th>状态</th>
                        <th>操作</th>
                        <th>管理</th>
                    </tr>
                    @foreach($data as $k=>$v)
                    <tr>
                        <td>{{$v['id']}}</td>
                        <td>{{$v['name']}}</td>
                        <td>{{$v['url']}}</td>
                        <td><img src="{{asset($v['img'])}}" alt="" style="width: 60px;height:50px"></td>
                        @if($v['status']==1)
                        <td style="color: red">已推荐</td>  
                        @else
                        <td style="color: green">未推荐</td>  
                        @endif                   
                        <td style="text-align: center">
                        <div style="width: 73px;margin:0px -50px 0px 10px">
                            <a href="/admin/url/edit/{{$v['id']}}" class="list">修改</a>
                            <a href="/admin/url/delete/{{$v['id']}}" class="list">删除</a>
                        </div>
                        </td>

                        @if($v['status'])
                            <td>
                            	<button type="button" class="btn btn-danger" value="{{$v['id']}}" id="lost" num="{{$v['status']}}">撤销推荐</button>
                            </td>
                        @else
                            <td>
                                <button type="button" class="btn btn-success" value="{{$v['id']}}" id="up" num="{{$v['status']}}">设为推荐</button>
                            </td>
                        @endif
                    </tr>
                  @endforeach
                </table>

            </div>
            {!! $data->render() !!}
            
        </div>

            <script>
                $('th').css('text-align','center');

                $('.btn-danger').click(function(){
                    //ID
                    var a=$(this).val();
                    //状态值
                    var b=$(this).attr('num');
            
                    //发送AJAX
                    $.get('/admin/url/status',{'id':a,'status':b},function(msg){
                       
                        layer.open({
                                      type: 1
                                      ,offset: 't' //具体配置参考：offset参数项
                                      ,content: '<div style="padding: 20px 80px;">该链接将从首页撤下!</div>'
                                      ,btn: '确定'
                                      ,btnAlign: 'c' //按钮居中
                                      ,shade: 0 //不显示遮罩
                                      ,yes: function(){
                                        layer.closeAll();
                                      }
                                    });




                        // alert('该链接将从首页撤下!');

                            location.href=location.href;
                    });
                });

                $('.btn-success').click(function(){
                    //ID
                    var a=$(this).val();
                    //状态值
                    var b=$(this).attr('num');

                    //发送AJAX
                    $.get('/admin/url/status',{'id':a,'status':b},function(msg){
                                 layer.open({
                                      type: 1
                                      ,offset: 't' //具体配置参考：offset参数项
                                      ,content: '<div style="padding: 20px 80px;">该链接将被推荐至首页!</div>'
                                      ,btn: '确定'
                                      ,btnAlign: 'c' //按钮居中
                                      ,shade: 0 //不显示遮罩
                                      ,yes: function(){
                                        layer.closeAll();
                                      }
                                    });
                          // alert('该链接将被推荐至首页!');

                            location.href=location.href;

                    });
                });
            </script>



@endsection