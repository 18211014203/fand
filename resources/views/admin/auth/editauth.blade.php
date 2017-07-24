@extends('layouts.admin')
@section('content')
		
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <div class="result_content">
            <h1>权限路由修改</h1>         

<hr>


<form action="/admin/admin/edit/{{$data['id']}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
    
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">权限路由名</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$data['urldesc']}}" name="urldesc">
        </div>
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">权限路由地址</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:350px"
          value="{{$data['urlname']}}" name="urlname">
        </div>

        <button type="submit" class="btn btn-success" style="margin-bottom: 70px">确认修改</button> 
</form>

@endsection