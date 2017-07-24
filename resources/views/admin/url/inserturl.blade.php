@extends('layouts.admin')
@section('content')
		
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <div class="result_content">
            <h1>链接详情</h1>         

<hr>
<form action="/admin/url/urldata" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">友情链接名</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="" name="name">
        </div>
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">链接域名</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="" name="url">
        </div>        
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">链接LOGO</label>
          <input type="file" name="img" class="photo" value="">
        </div>
        <button type="submit" class="btn btn-success" style="margin-bottom: 70px">确认</button> 
</form>

@endsection