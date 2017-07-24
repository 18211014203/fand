@extends('layouts.admin')
@section('content')
    <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
        <!--面包屑导航 开始-->
        <div class="crumb_warp">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">分类管理</a> &raquo; 修改分类
        </div>
        <!--面包屑导航 结束-->

        <!--结果集标题与导航组件 开始-->
        <div class="result_wrap">
            <div class="result_title">

                @if(session('errors'))
                    <ul style="list-style:list;" id="info" class="list-group">
                        @foreach($errors ->all() as $error)
                            <li class="bg-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                @if(session('error'))
                    <p style="background:#f0ad4e" class="error"> {{session('error')}}</p>
                @endif
                @if(session('success'))
                    <p class="success"> {{session('success')}}</p>
                @endif

            </div>
            <script>
                $(function(){
                    setTimeout(function(){
                        $('#info').hide();
                    },2000);

                })
            </script>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="/admin/type/add"><i class="fa fa-plus"></i>新增分类</a>

                    <a href="javascript:;"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
        </div>
        <!--结果集标题与导航组件 结束-->
        <div class="result_content">
            <div class="result_wrap">
                <form action="{{url('admin/type/edit')}}" id="memform"  method="post" enctype="multipart/form-data">
                    <table class="add_tab">
                        <input type="hidden" name="tid" value="{{$type['tid']}}">
                        {{csrf_field()}}
                        <tbody>
                        <tr>
                            <th width="120"><i class="require">*</i>父分类：</th>
                            <td>
                                <select name="pid">

                                    <option value="{{$type['pid']}}">{{$type['pname']}}</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require">*</i>分类名称：</th>
                            <td><input type="name" name="tname" value="{{$type['tname']}}" class="form-control "></td>
                        </tr>
                        <tr>
                            <th><i class="require">*</i>缩略图：</th>
                            <td><input type="file" name="img" id="img"></td>
                        </tr>


                        <tr  id="tr" >
                            <th></th>
                            <td>
                                <input type="text" class="hide" name="timg" id="upload_path">
                                <img src="{{$type['timg']}}" alt=""width="300" height="200" id="pic">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td id="submit">
                                <input type="submit"class="btn primary" value="提交">
                                <input type="button" class="btn info" class="back" onclick="history.go(-1)" value="返回">
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>


    </div>
    <script type="text/javascript">
        $(function () {
            $("#img").change(function () {

                uploadImage();
            });
        });

        function uploadImage() {
//                            判断是否有选择上传文件
            var imgPath = $("#img").val();
            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }

            var formData = new FormData($('#memform')[0]);


            $.ajax({
                type: "POST",
                url: "/admin/type/upload",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if(data=='aabb'){
                        alert('上传失败');
                        return false;
                    }
                    alert("上传成功");
                    $('#pic').attr('src','{{asset("/")}}'+data);
                    $('#tr').show();
                    $('#upload_path').val(data);
//
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        }
    </script>

@endsection