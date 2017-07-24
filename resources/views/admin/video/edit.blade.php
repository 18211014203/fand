@extends('layouts.admin')
@section('content')
    <script src="{{asset('static/js/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/uploadify.css')}}">
    <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
        <!--面包屑导航 开始-->
        <div class="crumb_warp">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">视频管理</a> &raquo; 视频审核修改
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
                        $('.result_title').hide();
                    },2000);

                })
            </script>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="/admin/video/add"><i class="fa fa-plus"></i>新增视频</a>

                    <a href="/admin/video/index"><i class="fa fa-list"></i>视频列表</a>
                </div>
            </div>
        </div>
        <!--结果集标题与导航组件 结束-->
        <div class="result_content">
            <div class="result_wrap">
                <form class="form-horizontal" id="createForm" method="POST" action="{{url('admin/video/doedit')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="vid" value="{{$video['vid']}}">
                    <div class="modal-body">
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">视频所属分类：</label>
                            <div class="col-xs-8">

                                <select id="stype2" name="tid" class="form-control">
                                    <option value="{{$video['tid']}}" selected>{{$video['tname']}}</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">视频名称: </label>
                            <div class="col-xs-8">
                                <input type="text" name="title" value="{{$video['title']}}" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">上传人：</label>
                            <div class="col-xs-8">
                                <input type="text" disabled name="name" value="{{$video['name']}}" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">缩略图：</label>
                            <div class="col-xs-8" id="moduleParentDiv">
                                <img src="{{asset($video['img'])}}" alt=""width="300"   height="200" id="pic">
                            </div>

                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label"></label>
                            <div class="col-xs-8">
                                <a href="javascript:;" class="btn btn-sm btn-warning" onclick=img.click()>点击修改缩略图</a>
                                <input type="file"  style="opacity:0;"  name="img" id="img">
                                <input type="hidden"  style="opacity:0;" name="timg" id="upload_path">
                            </div>

                        </div>

                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">标签 ：</label>
                            <div class="col-xs-8">
                                <input type="text" name="label"  class="form-control " value="{{$video['label']}}" placeholder="输入标签,多个以 '-' 连接" >
                            </div>
                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">描述 ：</label>
                            <div class="col-xs-8">
                                <textarea name="desc" id="" cols="30" rows="10" placeholder="请输入对视频的描述(255字以内)">{{$video['desc']}}</textarea>
                            </div>
                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">上传时间 ：</label>
                            <div class="col-xs-8">
                                <input type="text" readonly value="{{date('Y-m-d H:i:s',$video['upload_time'])}}">
                            </div>
                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">上传视频 ：</label>
                            <div class="col-xs-8">

                                <div id="a1"></div>
                                <script type="text/javascript" src="/ckplayer/ckplayer.js" charset="utf-8"></script>
                                <script type="text/javascript">
                                    // cdplayer  播放视频
                                    var flashvars={
                                        f:'{{url($video['video'])}}',
                                        c:0
                                    };
                                    var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
                                    CKobject.embedSWF('/ckplayer/ckplayer.swf','a1','ckplayer_a1','600','400',flashvars,params);
                                </script>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-info">保存修改</button>
                        <a href="{{url('admin/video/index')}}" class="btn btn-danger">放弃修改返回</a>
                        @if($video['status']=='1')
                            <button  id="check" onclick="location.href='{{url('admin/video/check'.'/'.$video['vid'])}}';" class="btn btn-default btn-info" >通过审核</button>
                        @endif
                        @if($video['status']=='2')
                            <button  id="freeze" onclick="location.href='{{url('admin/video/freeze'.'/'.$video['vid'])}}';" class="btn btn-default btn-info" >冻结</button>
                        @endif
                        @if($video['status']=='3')
                            <button  id="unfreeze" onclick="location.href='{{url('admin/video/unfreeze'.'/'.$video['vid'])}}';" class="btn btn-default btn-primary" >解冻</button>
                        @endif
                        @if($video['status']!='4')
                            <button  id="recommend"  class="btn btn-default btn-warning" >设为推荐</button>
                        @endif

                        <script>
                            $('#recommend').click(function(){
                                $.get('{{url('admin/video/recommend'.'/'.$video['vid'])}}',function(data){
                                    if(data==2){
                                        layer.alert('设置失败');return fasle;
                                    }
                                    layer.alert('设置成功');
                                    $('#recommend').css('display','none');
                                });
                            });
                        </script>
                    </div>
                </form>
            </div>

        </div>


    </div>
    <script type="text/javascript">
        // img上传ajax
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

            var formData = new FormData($('#createForm')[0]);


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
                    $('#pic').attr('src','{{asset("")}}'+data);

                    $('#upload_path').val(data);
//
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        }
    </script>
    <script>
        // 前台表单验证
        $(function(){
            $('#createForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    type: {
                        validators: {
                            notEmpty: {
                                message: '分类不能为空'
                            }
                        }
                    },
                    tid: {
                        validators: {
                            notEmpty: {
                                message: '子分类不能为空'
                            }
                        }
                    },
                    title: {
                        validators: {
                            notEmpty: {
                                message: '视频标题不能为空'
                            },
                            stringLength: {
                                min: 2,
                                max: 50,
                                message: '视频名称必须是2-50位'
                            }
                        }
                    },
                    img: {
                        validators: {
                            notEmpty: {
                                message: '必须上传封面图片'
                            }
                        }
                    },
                    label: {
                        validators: {
                            notEmpty: {
                                message: '必须添加至少一个标签'
                            },
                            stringLength: {
                                max: 255,
                                message: '不能超过255位'
                            }
                        }
                    },
                    desc: {
                        validators: {
                            notEmpty: {
                                message: '必须填写一段视频的描述'
                            },
                            stringLength: {
                                max: 255,
                                message: '不能超过255位'
                            }
                        }
                    }
                }
            });
        })



    </script>
@endsection