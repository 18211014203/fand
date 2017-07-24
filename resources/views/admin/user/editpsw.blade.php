@extends('layouts.admin')
@section('content')
     
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <div class="result_content">
            <h1>管理员密码修改</h1>         
 @if(session('error'))
          <p style="margin:0px 0px 0px 0px;font-size:20px;color:red">{{ session('error') }}</p>
      @endif
<hr>
<form action="/admin/user/editpsws" method="post">
        {{ csrf_field() }}
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">管理员名</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{ $user['adminname'] }}" name="adminname" disabled>

          <input type="hidden" name="id" value="{{ $user['id'] }}">
        </div>
        <!-- 旧密码 -->
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">输入旧密码</label>
          <input type="password" class="form-control" id="old" style="width:250px"
          value="" name="oldpassword">
          <p class="old" style="color:red"></p>
        </div>
        <!-- 新密码         -->
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">输入新密码</label>
          <input type="password" class="form-control" id="new" style="width:250px"
          value="" name="newpassword">
        </div>
        <!-- 确认新密码 -->
          <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">确认新密码</label>
          <input type="password" class="form-control" id="news" style="width:250px"
          value="" name="newpasswords">
          <p class="news" style="color:red"></p>
        </div>
        <button type="submit" class="btn btn-success" style="margin-bottom: 70px" id="edit">确认修改</button> 

</form>

      <script type="text/javascript">

         $('#old').blur(function() {

           var old=$(this).val();

      $.get('/admin/user/old',{'oldpassword':old,'id':"{{ $user['id'] }}"},function(msg){
           
              alert(msg);

            });


         });
         //判断两次输入的新密码是否相同
         $('#news').blur(function() {
           var newpsw=$(this).val();
           var newpsws=$('#new').val();
           if(newpsw!=newpsws){
              $('.news').text('新密码不一致,请重新输入!');
           }
         });
      </script>


@endsection