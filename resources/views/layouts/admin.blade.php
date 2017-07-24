<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('admin/style/css/layer.css')}}">
	<link rel="stylesheet" href="{{asset('admin/style/font/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('static/bootstrap-validator/bootstrapValidator.css')}}">
    <script type="text/javascript" src="{{asset('admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/style/js/ch-ui.admin.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/bootstrap-validator/bootstrapValidator.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/bootstrap-validator/zh_CN.js')}}"></script>    
    <script type="text/javascript" src="{{asset('/layer.js')}}"></script>
	@section('css')

	@show
    <style type="text/css">
        ul li{
            float: left;
            margin-left:20px; 
        }
        .pagination{
            float: right;
            margin: 20px 20px 0px 0px;
        }
		.padself{
			padding:5px 0px;
		}

    </style>
</head>
<body>
<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理</div>
			<ul>
				<li><a href="{{ asset('/admin/admin/index') }}" class="active">首页</a></li>
				<!-- <li><a href="#">管理页</a></li> -->
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员：{{ session('admin') }}</li>
				<li><a href="/admin/user/editpsw/{{ session('admin') }}" target="_self">修改密码</a></li>
				<li><a href="/admin/login/quit/{{ session('admin') }}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>用户操作</h3>
                <ul class="sub_menu">

                    <li><a href="{{url('/admin/user/user')}}" target="_self"><i class="fa fa-fw fa-plus-square"></i>用户列表</a></li>
                    <li><a href="{{ url('/admin/user/insert')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>添加用户</a></li>

                </ul>
            </li>
             <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>管理员</h3>
                <ul class="sub_menu">

                    <li style="font-size:12px"><a href="{{url('/admin/admin/admin')}}" target="_self"><i class="fa fa-fw fa-plus-square"></i>浏览管理员</a></li>
                    <li style="font-size:12px"><a href="{{url('/admin/admin/admininsert')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>添加管理员</a></li>
                 
                </ul>
            </li>
  			<li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>权限浏览</h3>
                <ul class="sub_menu">
					 <li style="font-size:12px"><a href="{{url('/admin/admin/select')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>权限总览</a></li>
					<li style="font-size:12px"><a href="{{url('/admin/admin/auth')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>权限添加</a></li>
                    <li style="font-size:12px"><a href="{{url('/admin/admin/jin')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>金牌管理员</a></li>
                    <li style="font-size:12px"><a href="{{url('/admin/admin/yin')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>银牌管理员</a></li>
                    <li style="font-size:12px"><a href="{{url('/admin/admin/tong')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>铜牌管理员</a></li>
                </ul>
            </li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>分类操作</h3>
				<ul class="sub_menu">

					<li><a href="{{url('/admin/type/add')}}" target="_self"><i class="fa fa-fw fa-plus-square"></i>添加分类</a></li>
					<li><a href="{{url('/admin/type/index')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>分类列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>视频操作</h3>
				<ul class="sub_menu">
					<li><a href="{{url('/admin/video/add')}}" target="_self"><i class="fa fa-fw fa-plus-square"></i>添加视频</a></li>
					<li><a href="{{url('/admin/video/index')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>视频列表</a></li>


				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>推荐视频操作</h3>
				<ul class="sub_menu">
					<li><a href="{{url('/admin/recommend/index')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>视频列表</a></li>
				</ul>
			</li>
			<li>



				<h3><i class="fa fa-fw fa-clipboard"></i>友情链接管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('/admin/url/url')}}" target="_self"><i class="fa fa-fw fa-plus-square"></i>友情链接</a></li>
					<li><a href="{{url('/admin/url/inserturl')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>添加链接</a></li>
				</ul>
			</li>			
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>排行榜</h3>
				<ul class="sub_menu">
					<li><a href="{{url('/rank/rank')}}" target="_self"><i class="fa fa-fw fa-plus-square"></i>总排行榜</a></li>
				<!-- 	<li><a href="{{url('/admin/url/inserturl')}}" target="_self"><i class="fa fa-fw fa-list-ul"></i>添加链接</a></li> -->
				</ul>
			</li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
                <ul class="sub_menu">


                    <li><a href="{{url('/admin/config/index')}}" target="_self"><i class="fa fa-fw fa-cubes"></i>网站配置</a></li>
                </ul>
            </li>


                </ul>

	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
@section('content')




@show
	<!--主体部分 结束-->


    <!--底部 开始-->
	<div class="bottom_box">
		<div style="float:right;margin-right:480px">
		{{Config('web.copyright')}}.</div>
	</div>
	<!--底部 结束-->

<script type="text/javascript" src="{{asset('static/layer-v3.0.3/layer/layer.js')}}"></script>
</body>
</html>