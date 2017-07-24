@extends('layouts.admin')
@section('content')
		
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <div class="result_content">
            <h1>用户详情</h1>         

<hr>
<form action="{{ url('/admin/user/update') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">用户UID</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$reg['uid']}}" disabled>
          <input type="hidden" name="uid" value="{{ $reg['uid'] }}">
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">用户名</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$reg['username']}}" disabled name="username">
        </div>
          <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">VIP:</label>
            <span>
                 @if($reg['vip']==1)
                    VIP用户
                @else 
                    非VIP用户
                @endif   

            </span>
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">头像</label>
          <img src="{{$reg['photo']}}" alt="" class="img-thumbnail" style="width:140px;height:100px">
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">个性签名</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:400px"
          value="{{$reg['sign']}}" name="sign">
        </div>
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">昵称</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$reg['name']}}" name="name">
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">电话</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$reg['tel']}}" name="tel">
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">积分</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$reg['score']}}" disabled>
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">注册时间</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$reg['regtime']}}" disabled>
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">生日</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$reg['birth']}}" name="birth">
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">邮箱</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:400px"
          value="{{$reg['email']}}" name="email">
        </div>
       

        <div class="form-group has-success" style="margin-bottom: 40px">
        <label class="control-label" for="inputSuccess1">性别</label>
         <label>
         @if($reg['sex']=='m')
            <input type="radio" id="checkboxError" value="m" name="sex" checked>男
        
            <input type="radio" id="checkboxError" value="w" name="sex">女
         @else
            <input type="radio" id="checkboxError" value="m" name="sex">男
        
            <input type="radio" id="checkboxError" value="w" name="sex" checked>女
         @endif
            </label>
        </div>

           



        <button type="submit" class="btn btn-success" style="margin-bottom: 70px">点击修改资料</button> 

        <button type="button" class="btn btn-success" style="margin-bottom: 70px" id="button">返回用户列表</button> 
</form>

    <script type="text/javascript">
    $('#button').click(function(){
        location.href='{{ url('/admin/user/user') }}';
    });
    </script>


@endsection