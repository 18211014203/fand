@extends('layouts.admin')
@section('content')
		
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <div class="result_content">
            <h1>权限添加</h1>         
          @if(session('success'))
            <p style="color: red">{{ session('success') }}</p>
          @endif
          @if(session('error'))
            <p style="color: red">{{ session('error') }}</p>
          @endif

<hr>
<form action="/admin/admin/auths" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">权限路由名</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="" name="authname" required>
        </div>
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">权限路由地址</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="" name="authurl" required>
        </div>
         <div class="" style="margin-bottom: 40px">
        <label class="control-label" for="inputSuccess1">角色权限分配</label>
        <p style="color: #ccc;font-size: 12px;margin-left: 50px">必选项</p>
			<div class="checkbox" style="margin:-55px 0px 0px 120px"><input type="checkbox" value="1" name="auth[]">金牌管理员</div>
        	
            <div class="checkbox" style="margin:0px 0px 0px 120px"><input type="checkbox" value="2" name="auth[]">银牌管理员</div>
			
            <div class="checkbox" style="margin:0px 0px 0px 120px"><input type="checkbox" value="3" name="auth[]">铜牌管理员</div>
            

  
        </div>
        <button type="submit" class="btn btn-success" style="margin-bottom: 70px">确认</button> 
        <button type="button" class="btn btn-success" style="margin-bottom: 70px" id="click">返回</button> 
</form>
  <script>
  $('#click').click(function(){
    history.go(-1);
  });
  </script>
@endsection