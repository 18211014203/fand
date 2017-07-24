@extends('layouts.admin')
@section('content')
		
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <div class="result_content">
            <h1>链接详情</h1>         

<hr>
<form action="/admin/url/edits" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">友情链接名</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{ $data['name'] }}" name="name">
          @if($data['status'])
              <p style="color: red;font-weight:bold; ">该链接以推荐至首页</p>
          @else
              <p style="color: green;font-weight:bold; ">该链接未推荐至首页</p>
          @endif
          <input type="hidden" name="id" value="{{ $data['id'] }}">
        </div>
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">链接域名</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{ $data['url'] }}" name="url">
        </div>        
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">链接LOGO</label>
          <img src="{{ $data['img'] }}" alt="" style="width: 100px;height:100px" class="img">
           <input type="file" name="img" class="photo" value="" required>
        </div>
        <button type="submit" class="btn btn-success" style="margin-bottom: 70px" id="but">确认修改</button> 

        <button type="button" class="btn btn-success" style="margin-bottom: 70px" id="button">返回列表</button> 
</form>
  <script>

  $('#button').click(function(){

    history.go(-1);

  });

  </script>



@endsection