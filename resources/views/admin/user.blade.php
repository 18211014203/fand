@extends('layouts.admin')
@section('content')
		
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <form class="form-inline" action="/admin/user/search" method="post">
            {{ csrf_field() }}
            <!-- 按名字或电话号码搜索 -->
              <div class="form-group">
                <label for="exampleInputEmail2">搜索</label>
                <input type="text" class="form-control" id="exampleInputEmail2" placeholder="请输入用户名或电话" name="keys" value="">
              </div>         
              <!-- 按年龄范围搜索      -->
                <div class="form-group">
                <label for="exampleInputEmail2"></label>
                <input type="text" class="form-control" id="exampleInputEmail2" placeholder="最小年龄" style="width:100px" name="agemin" value="">&nbsp;&nbsp;~&nbsp;&nbsp;
                <input type="text" class="form-control" id="exampleInputEmail2" placeholder="最大年龄" style="width:100px" name="agemax" value="">
              </div>
              <button type="submit" class="btn btn-default">点击搜索</button>
            </form>
            @if(!session('error'))
            <div class="result_content">
            <h1>用户列表</h1>
                <table class="list_tab">
                    <tr>                     
                        <th>UID</th>
                        <th>用户</th>
                        <th>密码</th>
                        <th>昵称</th>
                        <th>电话</th>
                        <th>积分</th>
                        <th>注册时间</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    @foreach($user as $k=>$v)
                    <tr>
                        <td>{{$v['uid']}}</td>
                        <td>{{$v['username']}}</td>
                        <td>{{$v['password']}}</td>
                        <td>{{$v['name']}}</td>
                        <td>{{$v['tel']}}</td>
                        <td>{{$v['score']}}</td>
                        <td>{{$v['regtime']}}</td>
                        <td>{{$v['status']}}</td>
                        <td>
                            <a href="/admin/user/detail/{{$v['uid']}}" class="list">详情</a>
                            <a href="/admin/user/delete/{{$v['uid']}}" class="list">删除</a>
                        </td>
                    </tr>
                  @endforeach
                </table>

            </div>
            {!! $user->render() !!}

        </div>
          @else
            <p style="margin:30px 0px 0px 25px;font-size:20px">{{ session('error') }}</p>
            @endif
@endsection