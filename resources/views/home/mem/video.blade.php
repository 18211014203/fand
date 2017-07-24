@extends("home.layout.mem")

@section("css")
    <link rel="stylesheet" href="{{asset('/static/css/upload_video.css')}}">
    <link rel="stylesheet" href="{{asset('/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/home/css/layer.css')}}">
    <link rel="stylesheet" href="{{asset('static/bootstrap-validator/bootstrapValidator.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('static/css/uploadify.css')}}">
    <style>
        #file_upload{
            margin-left:0px;
        }
        .modal-footer{
            margin-right:50px;
        }
        .modal-footer .btn{
            margin-right:20px;
        }
        .modal-footer *{
            float:right;
            margin-right:20px;
        }
    </style>
@endsection


@section("area-main")
    @parent

    <div id="area-main-right" class="r">
    <div id="area-cont-right">
        <div id="notice-info">

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

        {{--<script src="http://cdn.aixifan.com/dotnet/20130418/script/member/upload-video.min.js?v=1.1.77"></script>--}}
        <div class="container" style="width:720px;">
            <div id="block-banner-right" class="block banner">
                <a href="{{url('member/video')}}" class="tab active">
                    <i class="icon"></i>视频投稿</a>

                <a href="{{url('member/manner')}}" class="tab">
                    <i class="icon"></i>过往投稿</a>
            </div>
            <!--#go-old-->
            <!-- a.go-old 返回旧版-->
            <div id="uploadVideo" data-focus="auto" data-save="uploadVideo" class="upload cfix form" style="width:720px;margin:0px;">
                <form class="form-horizontal" id="createForm" method="POST" action="{{url('member/uvid')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">视频所属分类：</label>
                            <div class="col-xs-8">
                                <select id="stype" name="type" class="form-control">

                                    <option value="">请选择分区</option>
                                    @foreach($type as $k=>$v)
                                        <option value="{{$v['tid']}}">{{$v['tname']}}</option>
                                    @endforeach
                                </select>
                                <select id="stype2" name="tid" class="form-control">
                                    <option value="">请选择子分区</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">视频名称: </label>
                            <div class="col-xs-8">
                                <input type="text" name="title" class="form-control ">
                            </div>
                        </div>

                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">缩略图：</label>
                            <div class="col-xs-8" id="moduleParentDiv">
                                <button class="btn btn-primary" onclick="$('#img').click()">选择图片</button>
                                <input type="file" name="image" class="hide" id="img">
                            </div>
                        </div>
                        <div class="form-group demo2do-form-group" id="tr">
                            <label class="col-xs-3 control-label"></label>
                            <input type="hidden" name="img" value="" id="upload_path">
                            <div class="col-xs-8">
                                <img src="" alt=""width="300" class="hide"  height="200" id="pic">
                            </div>
                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">标签 ：</label>
                            <div class="col-xs-8">
                                <input type="text" name="label"  class="form-control " value="" placeholder="输入标签,多个以 '-' 连接" >
                            </div>
                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">描述 ：</label>
                            <div class="col-xs-8">
                                <textarea name="desc" id="" cols="30" rows="10" placeholder="请输入对视频的描述(255字以内)"></textarea>
                            </div>
                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">上传视频 ：</label>
                            <div class="col-xs-8">
                                <input type="hidden" name="video" id="video" value="">
                                <input id="file_upload" name="file_upload" type="file" multiple="true">
                                <a href="javascript:$('#file_upload').uploadify('upload', '*')" class="btn btn-primary">开始上传</a>

                                <a href="javascript:$('#file_upload').uploadify('stop')"class="btn btn-info">停止上传</a>
                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">

                        <button class="btn btn-default" onclick="location.href=location.href;">取消</button>
                        <input type="submit"  class="btn btn-success " value="添加">
                    </div>
                </form>
            </div>
    </div>
    </div>

    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('static/bootstrap-validator/bootstrapValidator.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/bootstrap-validator/zh_CN.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bootstrap.min.js')}}"></script>
    <script src="{{asset('static/js/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('static/layer-v3.0.3/layer/layer.js')}}"></script>

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
                layer.msg("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                layer.msg("请选择图片文件");
                return;
            }

            var formData = new FormData($('#createForm')[0]);


            $.ajax({
                type: "POST",
                url: "/member/image",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {

                    if(data=='aabb'){
                        layer.msg('上传失败');
                        return false;
                    }
                    layer.msg("上传成功");
                    $('#pic').attr('src',data);
                    $('#pic').removeClass('hide');
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
        var tt = $('#stype');
        abc = {!! json_encode($type2) !!}
                                console.log(abc);

        //            console.log(tt.html());
        tt.change(function(){
            for(var i=0;i<abc.length;i++){
                if($('#stype').val()=='-250'){
                    $('#stype2').html('<option value="-250">请选择子分区</option>').addClass('disabled');
                }

                if($('#stype').val()==abc[i][0].pid){
                    str = '';
                    for(var j=0;j<abc[i].length;j++){
                        str += '<option value="'+abc[i][j].tid+'">'+abc[i][j].tname+'</option>';
                    }
//                                            alert(str);
                    $('#stype2').html('<option value="-250">请选择子分区</option>'+str).removeClass('disabled').removeAttr('disabled');
                }

            }

        });
        // 验证表彰
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
        // 上传视频
        $(function() {
            $('#file_upload').uploadify({
                'formData'     : {
                    '_token'     : '{{csrf_token()}}'
                },
                'swf'      : '/admin/uploadify.swf',
                'uploader' : '/member/videoupload',
                'height' : '30',
                'width' : '120',
                'auto'  : false,

                // 上传文件的大小限制
                'fildeSizeLimit' : '2GB',
                // 这个属性值必须设置fileTypeExts属性后才有效，默认ALLfile
                'fileTypeDesc' : '请选择.mvk .mp4 .swf .avi .wmv文件',
                // 设置可以选择的文件的类型
                'fileTypeExts' : '*.mvk;*.mp4;*.swf;*.avi;*.wmv',
                // method 默认为post

                // multi 默认true 可以上传多个 uploadLimit为最大上传数量
                'multi' : false,
                'uploadLimit' : 5,
                "queueSizeLimit" : 5,
                // 设置上传进度显示方式，默认percentage显示上传百分比，speed显示上传速度
                'progressData' : 'speed',
                // 是否自动将已完成任务从队列中删除，如果设置为false则会一直保留此任务显示。默认true
                'removeCompleted' : false,
                'cancelImg': '{{asset('/static/images/uploadify-cancel.png')}}',


                'onUploadSuccess':function(file, data, response){
                    if(data==2){
                        layer.msg('视频上传失败');
                        return false;
                    }else{
                        $('#video').val(data);
                        layer.msg('视频上传成功');
                        $('#createForm').submit();
                        return false;
                    }

                },
                'onSelectError':function(file, errorCode, errorMsg){
                    var msgText = "上传失败\n";
                    switch (errorCode) {
                        case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
                            //this.queueData.errorMsg = "每次最多上传 " + this.settings.queueSizeLimit + "个文件";
                            msgText += "每次最多上传 " + this.settings.queueSizeLimit + "个文件";
                            break;
                        case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
                            msgText += "文件大小超过限制( " + this.settings.fileSizeLimit + " )";
                            break;
                        case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
                            msgText += "文件大小为0";
                            break;
                        case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
                            msgText += "文件格式不正确，仅限 " + this.settings.fileTypeExts;
                            break;
                        default:
                            msgText += "错误代码：" + errorCode + "\n" + errorMsg;
                    }
                    layer.msg(msgText);
                    return false;
                }

            });
        });

        // 提示信息自动消失
        $(function(){
            setTimeout(function(){
                $('#notice-info').hide();
            },2000);

        })

    </script>
@endsection