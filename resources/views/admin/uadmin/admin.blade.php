@extends('layouts.admin')
@section('content')
		
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            @if(!session('error'))
            <div class="result_content">
            <h1>管理员列表</h1>
                <table class="list_tab">
                    <tr>                     
                        <th>ID</th>
                        <th>管理员</th>
                        <th>密码</th>
                        <th>电话</th>
                        <th>邮箱</th>
						<th>管理员角色</th>
                        <th>操作</th>
                    </tr>
                    @foreach($admin as $k=>$v)
                    <tr>
                        <td>{{$v['admin_id']}}</td>
                        <td>{{$v['adminname']}}</td>
                        <td>{{$v['password']}}</td>
                        <td>{{$v['tel']}}</td>
                        <td>{{$v['email']}}</td>
                        <td>{{$v['jname']}}</td>
                        <td>
                            <a href="/admin/admin/admindetail/{{$v['admin_id']}}" class="list">详情</a>
                            <a href="/admin/admin/admindelete/{{$v['admin_id']}}" class="list">删除</a>
                        </td>
                    </tr>
                  @endforeach
                </table>

            </div>
            {!! $admin->render() !!}

        </div>
          @else
            <p style="margin:30px 0px 0px 25px;font-size:20px">{{ session('error') }}</p>
            @endif
@endsection