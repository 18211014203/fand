@extends('layouts.admin')
@section('css')
  <script type="text/javascript" src="{{ asset('/home/js/ueditor.config.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/home/js/ueditor.all.min.js') }}"> </script>
  <script type="text/javascript" src="{{ asset('/home/js/lang/zh-cn/zh-cn.js') }}"></script>
@endsection
@section('content')
  <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
      <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
      <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">网站配置管理</a> &raquo; 网站配置
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
      <div class="result_title">

        @if(session('error'))
          <p style="background:#f0ad4e">  {{session('error')}}</p>
        @endif
      </div>
      <div class="result_content">
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
        <div class="short_wrap">
          <a href="javascript:;" class="btn bg-info" id="update" ><i class="fa fa-refresh"></i>更新前台页面</a>
        </div>
      </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    <div class="result_content">
      <div class="result_wrap">
        <form class="form-horizontal" id="createForm" method="POST" action="{{url('admin/config/doedit')}}">
          {{csrf_field()}}
          <div class="modal-body">
            <input type="hidden" name="id" value="{{$config['id']}}">
            <div class="form-group demo2do-form-group">
              <label class="col-xs-3 control-label">网站title: </label>
              <div class="col-xs-8">
                <input type="text" name="title" value="{{$config['title']}}" class="form-control ">
              </div>
            </div>
            <div class="form-group demo2do-form-group">
              <label class="col-xs-3 control-label">关键字：</label>
              <div class="col-xs-8">
                <input type="text" name="keys" value="{{$config['keys']}}" class="form-control ">
              </div>
            </div>
            <div class="form-group demo2do-form-group">
              <label class="col-xs-3 control-label">网站logo：</label>
              <div class="col-xs-8" id="moduleParentDiv">

                <input type="file">
              </div>
            </div>
            <div class="form-group demo2do-form-group" id="img-logo">
              <label class="col-xs-3 control-label"></label>
              <input type="hidden" class="hide" name="logo" value="{{$config['logo']}}">
              <div class="col-xs-8">
                <img src="{{$config['logo']}}" alt=""width="80"  height="50">
              </div>
            </div>
            <div class="form-group demo2do-form-group">
              <label class="col-xs-3 control-label">版权：</label>
              <div class="col-xs-8">
                <input type="text" name="copyright"  class="form-control " value="{{$config['copyright']}}" placeholder="输入网站版权信息" >
              </div>
            </div>
            <div class="form-group demo2do-form-group">
              <label class="col-xs-3 control-label">网站描述 ：</label>
              <div class="col-xs-8">
                <input type="text" name="descript"  class="form-control "  placeholder="请输入对网站的描述(255字以内)" value="{{$config['descript']}}">
              </div>
            </div>
            <div class="form-group demo2do-form-group">
              <label class="col-xs-3 control-label">首页宽图主题 ：</label>
              <div class="col-xs-8">
                <input type="text" name="width_image_title"  class="form-control " value="{{$config['width_image_title']}}">
              </div>
            </div>
            <div class="form-group demo2do-form-group  ">
              <label class="col-xs-3 control-label">首页宽图：</label>
              <div class="col-xs-8" id="moduleParentDiv">
                <input type="file" >
              </div>
            </div>
            <div class="form-group demo2do-form-group" id="img-width">
              <label class="col-xs-3 control-label"></label>
              <input type="hidden" class="hide"  name="width_image" value="{{$config['width_image']}}">
              <div class="col-xs-8">
                <img src="{{$config['width_image']}}" alt=""width="600"  height="50" >
              </div>
            </div>
            <div class="form-group demo2do-form-group  ">
              <label class="col-xs-3 control-label">上传图片路径：</label>
              <div class="col-xs-8" id="moduleParentDiv">
                <input type="text" name="img_path" value="{{$config['img_path']}}" class="form-control ">
              </div>
            </div>
            <div class="form-group demo2do-form-group  ">
              <label class="col-xs-3 control-label">上传视频路径：</label>
              <div class="col-xs-8" id="moduleParentDiv">
                <input type="text" name="video_path" value="{{$config['video_path']}}" class="form-control ">
              </div>
            </div>
            <div class="form-group demo2do-form-group">
              <label class="col-xs-3 control-label">关于我们 ：</label>
              <div class="col-xs-8">
                <!-- 加载编辑器的容器 -->
                <script id="container" name="about" type="text/plain">{{$config['about']}}</script>
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('container',{
                        toolbars: [
                            ['source', 'undo', 'redo', 'bold', 'italic', 'underline','preview','justifyleft',
                                'justifyright',
                                'justifycenter',
                                'justifyjustify',
                                'customstyle',],
                            ['fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
                        ],
                        autoHeightEnabled: true,
                        autoFloatEnabled: true
                    });
                </script>
                {{--<textarea name="desc" id="" cols="30" rows="10" placeholder="关于网站团队的">{{$config['descript']}}</textarea>--}}
              </div>
            </div>
            <div class="form-group demo2do-form-group">
              <label class="col-xs-3 control-label">联系我们 ：</label>
                <div class="col-xs-8">
                  <!-- 加载编辑器的容器 -->
                  <script id="container2" name="contact" type="text/plain">{{$config['contact']}}</script>
                  <!-- 实例化编辑器 -->
                  <script type="text/javascript">
                      var ue2 = UE.getEditor('container2',{
                          toolbars: [
                              [ 'source', 'undo', 'redo', 'bold', 'italic', 'underline','preview','justifyleft',
                                  'justifyright',
                                  'justifycenter',
                                  'justifyjustify',
                                  'customstyle',],
                              ['fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
                          ],
                          autoHeightEnabled: true,
                          autoFloatEnabled: true
                      });
                  </script>
                  {{--<textarea name="desc" id="" cols="30" rows="10" placeholder="关于网站团队的">{{$config['descript']}}</textarea>--}}
                </div>
            </div>


          </div>
          <div class="modal-footer">
            <input type="submit"  class="btn btn-success btn-shadow btn-shadow-success demo2do-btn" value="修改">
            <button type="button" class="btn btn-default btn-shadow btn-shadow-default demo2do-btn" data-dismiss="modal">取消</button>
          </div>
        </form>
      </div>
    </div>


  </div>
  <script type="text/javascript">
    // 上传图片
      $(function () {
          var arr = [$('#img-logo'),$('#img-width')];
          var obj = $("input[type=file]").change(uploadImage);

      function uploadImage() {
//                            判断是否有选择上传文件
          var imgPath = $(this).val();
          var i = obj.index(this);
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

          var formData = new FormData();
          formData.append('img', this.files[0]);
          formData.append('_token', '{{csrf_token()}}');


          $.ajax({
              type: "POST",
              url: "/admin/type/upload",
              data: formData,
              async: true,
              cache: false,
              contentType: false,
              processData: false,
              success: function (data) {
                  console.log(data);
                  if (data == 'aabb') {
                      alert('上传失败');
                      return false;
                  }
                  alert("上传成功");
                  arr[i].find('img').attr('src', '{{asset("/")}}' + data);
                  arr[i].find('input').val(data);

                  {{--$('#pic').attr('src', '{{asset("/")}}' + data);--}}
                  {{--$('#upload_path').val(data);--}}
//
              },
              error: function (XMLHttpRequest, textStatus, errorThrown) {
                  alert("上传失败，请检查网络后重试");
              }
          });
      }
      });
      // 表单验证
      $(function(){
          $('#createForm').bootstrapValidator({
              message: 'This value is not valid',
              fields: {
                  title: {
                      validators: {
                          notEmpty: {
                              message: '网站标题不能为空'
                          },
                          stringLength: {
                              min: 2,
                              max: 50,
                              message: '网站标题必须是2-10位'
                          }
                      }
                  },
                  keys: {
                      validators: {
                          notEmpty: {
                              message: '网站关键字必填'
                          },
                          stringLength: {
                              min: 2,
                              max: 50,
                              message: '网站关键字必须是4-50位'
                          }
                      }
                  },
                  logo: {
                      validators: {
                          notEmpty: {
                              message: '网站logo图片必须上传,不能为空'
                          }
                      }
                  },
                  copyright: {
                      validators: {
                          notEmpty: {
                              message: '版权必填'
                          },
                          stringLength: {
                              max: 50,
                              message: '版权信息不能超过50个字符'
                          }
                      }
                  },
                  width_image_title: {
                      validators: {
                          notEmpty: {
                              message: '宽图标题不能为空'
                          },
                          stringLength: {
                              max: 50,
                              message: '宽图标题不能超过10个字符'
                          }
                      }
                  },
                  width_image: {
                      validators: {
                          notEmpty: {
                              message: '宽图必须上传'
                          }
                      }
                  },
                  descript: {
                      validators: {
                          notEmpty: {
                              message: '网站描述不能为空'
                          },
                          stringLength: {
                              max: 255,
                              message: '网站描述不能超过255个字符'
                          }
                      }
                  },
                  about: {
                      validators: {
                          notEmpty: {
                              message: '关于我们内容不能为空'
                          }
                      }
                  },
                  contact: {
                      validators: {
                          notEmpty: {
                              message: '联系我们内容不能为空'
                          }
                      }
                  },
                  img_path: {
                      validators: {
                          notEmpty: {
                              message: '图片上传路径不能为空'
                          }
                      }
                  },
                  video_path: {
                      validators: {
                          notEmpty: {
                              message: '视频 上传路径不能为空'
                          }
                      }
                  }

              }
          });
      })
      //  ajax发送更新申请
      $(function(){
          $('#update').click(function(){
              //询问框
              layer.confirm('您确定要根据现有的网站配置,更新前台页面？', {
                  btn: ['确定','取消'] //按钮
              }, function(){
                  $.post('{{url('admin/config/update')}}',{'_token':'{{csrf_token()}}'},function(data){
                          layer.msg(data.msg);
                  });
              }, function(){

              });
          });
      })
  </script>
@endsection