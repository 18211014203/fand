@extends('layouts.admin')
@section('content')
    
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <div class="result_content">
            <h1>管理员添加</h1>         

<hr>
<form action="{{ url('/admin/admin/insertdata') }}" method="post">
        {{ csrf_field() }}

         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">管理员</label>
          <input type="text" class="form-control" id="adminname" style="width:250px"
          value="{{ old('adminname') }}" name="adminname" required>
          @if(session('errors'))
            <p style="color: red;font-weight: bold;">{{session('errors')}}</p>
        @endif
        </div>
        
      		
		<script>
		$('#adminname').blur(function(){

			var a=$(this).val();	

			$.get('/admin/admin/uniquer',{'adminname':a},function(msg){

					if(msg==1){
						

						alert('这个账号已存在,请重新输入一个账号!');

						$('#adminname').val('');
					}
			});
		});

		</script>

         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">密码</label>
          <input type="password" class="form-control" id="password" style="width:400px"
          value="{{ old('password') }}" name="password" required>
        </div>

		<div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">重复密码</label>
          <input type="password" class="form-control" id="rpassword" style="width:400px"
          value="{{ old('rpassword') }}" name="rpassword" required>
        </div>
		
		<script>
		$('#rpassword').blur(function(){

			var a=$('#password').val();
			var b=$(this).val();

			if(a != b)
			{
  
				alert('两次密码不一致,请重新输入!');

				$(this).val('');
			}
		});

		</script>

        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">联系电话</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{ old('tel') }}" name="tel" required>
        </div>

         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">联系邮箱</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{ old('email') }}" name="email" required>
        </div>

        <div class="form-group has-success" style="margin-bottom: 40px">
        <label class="control-label" for="inputSuccess1">注册角色</label>
        @if(session('error'))
        		<p style="color: red;font-weight: bold;">{{session('error')}}</p>
        @endif
         <label>
            <input type="radio"  value="1" name="jiaose_id" class="jiaose">金牌管理员
            <input type="radio"  value="2" name="jiaose_id" class="jiaose">银牌管理员
            <input type="radio"  value="3" name="jiaose_id" class="jiaose">铜牌管理员
        </div>

        <button type="submit" class="btn btn-success" style="margin-bottom: 70px" id="sub">点击添加</button> 

        <button type="button" class="btn btn-success" style="margin-bottom: 70px" id="button">返回用户列表</button> 
</form>

  <script type="text/javascript">
    $('#button').click(function(){
        history.go(-1);
    });

    </script>>


@endsection