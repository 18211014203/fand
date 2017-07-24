@extends('layouts.admin')
@section('content')
		
        <div class="result_wrap" style="width:1024px;margin:60px 0px 30px 200px">
            <div class="result_content">
            <h1>铜牌管理员权限浏览</h1>
                <table class="list_tab">
                    <tr>                     
                        <th>权限名</th>
                        <th>路由地址</th>
                        <th>操作</th>
                    </tr>
                
          
                    @foreach($tong as $k=>$v)
                    <tr>
                        <td>{{$v['urldesc']}}</td>
                        <td>{{$v['urlname']}}</td>
                        <td>
                            <a href="/admin/admin/authdelete/{{$v['jiaose_id']}}/{{$v['auth_id']}}" class="list">删除</a>
                        </td>
                    </tr>
                @endforeach

                </table>

            </div>


        </div>
@endsection