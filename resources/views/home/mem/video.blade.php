@extends("home.layout.mem")

@section("css")
    <link rel="stylesheet" href="{{asset('/static/css/upload_video.css')}}">
    <link rel="stylesheet" href="{{asset('/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('static/bootstrap-validator/bootstrapValidator.css')}}">
    <script type="text/javascript" src="{{asset('static/bootstrap-validator/bootstrapValidator.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/bootstrap-validator/zh_CN.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bootstrap.min.js')}}"></script>
    <script src="{{asset('static/js/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/uploadify.css')}}">

@endsection


@section("area-main")
    @parent

    <div id="area-main-right" class="r">
    <div id="area-cont-right">

        {{--<script src="http://cdn.aixifan.com/dotnet/20130418/script/member/upload-video.min.js?v=1.1.77"></script>--}}
        <div class="container" style="width:720px;">
            <div id="block-banner-right" class="block banner">
                <a href="#area=upload-video" class="tab active">
                    <i class="icon"></i>视频投稿</a>
                <a href="#area=post-history" class="tab">
                    <i class="icon"></i>过往投稿</a>
                <a href="#area=post-manage" class="tab">
                    <i class="icon"></i>视频管理</a>
            </div>
            <!--#go-old-->
            <!-- a.go-old 返回旧版-->
            <div id="uploadVideo" onsubmit="return false" data-focus="auto" data-save="uploadVideo" class="upload cfix form" style="width:720px;margin:0px;">
                <form class="form-horizontal" id="createForm" method="POST" action="{{url('admin/video/doadd')}}" >
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
                            <label class="col-xs-3 control-label">上传人：</label>
                            <div class="col-xs-8">
                                <input type="text" disabled name="name" value="官方" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group demo2do-form-group">
                            <label class="col-xs-3 control-label">缩略图：</label>
                            <div class="col-xs-8" id="moduleParentDiv">
                                <input type="file"name="img" id="img">
                            </div>
                        </div>
                        <div class="form-group demo2do-form-group" id="tr">
                            <label class="col-xs-3 control-label"></label>
                            <input type="text" class="hide" name="timg" id="upload_path">
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
                                <a href="javascript:$('#file_upload').uploadify('upload', '*')">开始上传</a>

                                <a href="javascript:$('#file_upload').uploadify('stop')">停止上传</a>
                            </div>
                            <script type="text/javascript">

                                $(function() {
                                    $('#file_upload').uploadify({
                                        'formData'     : {
                                            '_token'     : '{{csrf_token()}}'
                                        },
                                        'swf'      : '/admin/uploadify.swf',
                                        'uploader' : '/admin/video/upload',
                                        'height' : '30',
                                        'width' : '120',
                                        'auto'  : false,

                                        // 上传文件的大小限制
                                        'fileSizeLimit' : '2GB',
                                        // 这个属性值必须设置fileTypeExts属性后才有效，默认ALLfile
                                        'fileTypeDesc' : '请选择.mvk .mp4 .swf .avi .wmv文件',
                                        // 设置可以选择的文件的类型
                                        'fileTypeExts' : '*.mvk;*.mp4;*.swf;*.avi;*.wmv',
                                        // method 默认为post

                                        // multi 默认true 可以上传多个 uploadLimit为最大上传数量
                                        'multi' : false,
                                        'uploadLimit' : 1,
                                        "queueSizeLimit" : 1,
                                        // 设置上传进度显示方式，默认percentage显示上传百分比，speed显示上传速度
                                        'progressData' : 'speed',
                                        // 是否自动将已完成任务从队列中删除，如果设置为false则会一直保留此任务显示。默认true
                                        'removeCompleted' : true,
                                        'cancelImg': '{{asset('/static/images/uploadify-cancel.png')}}',


                                        'onUploadSuccess':function(file, data, response){
                                            if(data==2){
                                                alert('视频上传失败');
                                                return false;
                                            }else{
                                                $('#video').val(data);
                                                alert('视频上传成功');
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
                                            alert(msgText);
                                            return false;
                                        }

                                    });
                                });
                            </script>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input type="submit"  class="btn btn-success btn-shadow btn-shadow-success demo2do-btn" value="添加">
                        <button type="button" class="btn btn-default btn-shadow btn-shadow-default demo2do-btn" data-dismiss="modal">取消</button>
                    </div>
                </form>
            </div>
    </div>
    </div>
        <script type="text/javascript">
            $(function () {

                $("#photo").change(function () {

                    uploadImage();
                });
            });

            function uploadImage() {
//                            判断是否有选择上传文件
                var imgPath = $("#photo").val();
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
//                                            alert(formData);
                $.ajax({
                    type: "POST",
                    url: "/member/upload",
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        alert("上传成功");
                        $('#pic').attr('src','{{asset("/")}}'+data);
                        $('#pic').show();
                        $('#upload_path').val(data);
//                                                    setTimeout(function(){
//
//                                                        location.href= 'www.baidu.com';
//                                                    },500);


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

            console.log(tt.html());
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