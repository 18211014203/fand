@extends('layouts.admin')
@section('content')
    
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <div class="result_content">
            <h1>用户详情</h1>         

<hr>
<form action="{{ url('/admin/admin/adminupdate') }}" method="post">
        @foreach($admin as $k=>$v)
        {{ csrf_field() }}
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">管理员ID</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$v['id']}}" disabled>
          <input type="hidden" name="id" value="{{$v['admin_id']}}">
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">管理员</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$v['adminname']}}" disabled name="adminname">
          <p style="color: red;font-weight: bold;">{{$v['jname']}}</p>
        </div>
      
         <div class="form-group has-success">
            <label class="control-label" for="inputSuccess1">密码</label>
            <input type="password" class="form-control" id="inputSuccess1" style="width:400px"
            value="" name="password" id="password" placeholder="不公开">
            @if(session('error'))
                <p>{{session('error')}}</p>
            @endif
        </div>
        <script>
        $('#password').blur(function(){
          if($(this).val()==''){
           
            alert('密码不能为空!');
          }
        });

        </script>


        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">联系电话</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$v['tel']}}" name="tel">
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">联系邮箱</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{$v['email']}}" name="email">
        </div>
        


        <div class="form-group has-success" style="margin-bottom: 40px">
        <label class="control-label" for="inputSuccess1"> 角色名称</label>
         <label>
          
            @if($v['jiaose_id']==1)
            <input type="radio"  value="1" name="jiaose_id" checked> 金牌管理员
            <input type="radio"  value="2" name="jiaose_id">银牌管理员
            <input type="radio"  value="3" name="jiaose_id">铜牌管理员
            @endif
            @if($v['jiaose_id']==2)
            <input type="radio"  value="1" name="jiaose_id"> 金牌管理员
            <input type="radio"  value="2" name="jiaose_id" checked>银牌管理员
            <input type="radio"  value="3" name="jiaose_id">铜牌管理员
            @endif
            @if($v['jiaose_id']==3)
            <input type="radio"  value="1" name="jiaose_id"> 金牌管理员
            <input type="radio"  value="2" name="jiaose_id">银牌管理员
            <input type="radio"  value="3" name="jiaose_id" checked>铜牌管理员
            @endif
            </label>
        </div>

           @endforeach



        <button type="submit" class="btn btn-success" style="margin-bottom: 70px">点击修改资料</button> 

        <button type="button" class="btn btn-success" style="margin-bottom: 70px" id="button">返回用户列表</button> 
</form>

    <script type="text/javascript">
    $('#button').click(function(){
        history.go(-1);
    });
    </script>


@endsection