@extends('layouts.admin')
@section('content')
		
        <div class="result_wrap" style="width:1024px;margin:60px 0px 50px 200px">
            <div class="result_content">
            <h1>权限总览</h1>
            <p style="color: red">注意:请不要随意更改本表路由</p>
                <table class="list_tab">
                    <tr>                     
                        <th>权限名</th>
                        <th>路由地址</th>
                        <th>操作</th>
                    </tr>
                        
                    @foreach($data as $k=>$v)

                    <tr>
                        <td>{{$v['urldesc']}}</td>
                        <td>{{$v['urlname']}}</td>
                        <td>
                            <a href="/admin/admin/authedit/{{$v['id']}}" class="list">修改</a>
                            <a href="/admin/admin/delete/{{$v['id']}}" class="list">删除</a>
                        </td>
                    </tr>
                @endforeach

                </table>

            </div>

        </div>
@endsection