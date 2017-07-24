@extends("home.layout.mem")


@section("css")
    <link rel="stylesheet" href="{{asset('/static/css/info.css')}}">
    <link rel="stylesheet" href="{{asset('admin/style/css/layer.css')}}">
    <link rel="stylesheet" href="{{asset('/bootstrap.min.css')}}">

@endsection
@section("js")
    <script type="text/javascript" src="{{asset('/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/layer-v3.0.3/layer/layer.js')}}"></script>
@endsection

@section("area-main")

    <!-- main  主体 -->
                @parent

                <div id="area-main-right" class="r">
                    <div id="area-cont-right">

                        <div id="block-title-banner">
                            <p>编辑资料</p>
                            <div>
                                <a href="{{url('/member/info')}}">AcFun</a>
                                <span class="d">Profile</span></div>
                            <span class="clearfix"></span>
                        </div>
                        <div id="block-banner-right" class="block banner">
                            <a href="{{url('/member/info')}}" class="tab active">
                                <i class="icon"></i>编辑资料</a>
                        </div>
                        <div id="block-first" class="block">
                            <div class="banner">
                                <p class="tab fixed">基本信息
                                    <span class="hint">Basic Information</span></p>
                            </div>
                            <div class="mainer form">

                                <div id="unit-basic" class="">
                                    <div class="l a">
                                        <a href="#area=change-avatar" class="thumb">
                                            <img id="img-avatar-personal"  src="{{asset($user['photo'])}}" class="avatar"></a>
                                    </div>
                                    <div class="l b">
                                        <a id="name-personal" href="javascript:;" class="name">{{$user['name']}}</a>
                                        <style>
                                            .b a{font-size: 16px;
                                                font-weight: bold;
                                                color: #c66;}
                                            #hint-reg-personal{
                                                font-size: 12px;
                                                color: #666;
                                                margin: 2px 0 0;}

                                        </style>
                                        <style rel="stylesheet" href="/static/css/info.css"></style>
                                        <span id="uid-personal">Uid:{{$user['uid']}}</span>

                                        <p id="hint-reg-personal">注册于 {{date("m月d日(星期w) H时i分",$user['regtime'])}}</p>

                                    </div>
                                    <span class="clearfix"></span>
                                </div>
                                <input type="file" id="photo" class="hide   ">
                                <p class="divider"></p>
                                <div class="unit-tool">
                                    <div class="l">
                                        <a id="btn-avatar-personal" href="javascript:;" class="btn primary" onclick="$('#photo').click()">
                                            <i class="icon icon-user"></i>修改头像
                                            </a>
                                        <a id="btn-sign-personal" href="#aphoto" class="btn primary">
                                            <i class="icon icon-edit"></i>修改个性签名</a>
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
                                            if (strExtension != 'jpg'
                                                && strExtension != 'png' && strExtension != 'bmp') {
                                                alert("请选择图片文件");
                                                return;
                                            }

                                            var formData = new FormData();

                                            formData.append('img',$('#photo')[0].files[0]);
                                            formData.append('uid','{{session('user')['uid']}}');
                                            formData.append('_token','{{csrf_token()}}');


                                            $.ajax({
                                                type: "POST",
                                                url: "/member/upload",
                                                data: formData,
                                                async: true,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                success: function(data) {

                                                    if(data=='aabb'){
                                                        alert('上传失败');
                                                        return false;
                                                    }
                                                    alert('上传成功');
                                                    $('#img-avatar-personal').attr('src',data);
                                                    $('#area-main-left img').attr('src',data);
                                                    $('#a-avatar-guide img').attr('src',data);

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

                                    <div class="r">
                                        <a id="btn-password-personal" href="/mem/f" class="btn info">
                                            <i class="icon icon-key"></i>修改密码</a>
                                    </div>
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                        </div>
                        <div id="block-second" class="block">
                            <div class="banner">
                                <p class="tab fixed">扩展信息
                                    <span class="hint">Extra Information</span></p>
                            </div>
                            <div class="mainer form">
                                <form action="/member/update" method="post" id="memform" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="uid" value="{{$user['uid']}}">

                                <p class="alert">扩展信息将会显示在用户的个人空间中。
                                    <br>请留空您不想暴露的个人信息，以免造成不必要的隐私泄露。</p>
                                <div class="unit">
                                    <div class="l a">
                                        <p class="subtitle">性别</p></div>
                                    <div class="l b">
                                        <select id="ipt-gender-personal" name="sex">
                                            <option value="x" @if($user['sex']=='x') selected @endif>不公开</option>
                                            <option value="m" @if($user['sex']=='w') selected @endif>男</option>
                                            <option value="w" @if($user['sex']=='m') selected @endif>女</option></select>
                                    </div>
                                    <span class="clearfix"></span>
                                </div>
                                <div class="unit">
                                    <div class="l a">
                                        <p class="subtitle">年龄</p></div>
                                    <div class="l b">
                                        <input id="ipt-home-personal" name="age" type="text" class="req" value="{{$user['age']}}" placeholder="请输入年龄">
                                    </div>
                                    <span class="clearfix"></span>
                                </div>
                                <p class="sub-divider"></p>
                                <div class="unit">
                                    <div class="l a">
                                        <p class="subtitle">真实姓名</p></div>
                                    <div class="l b">
                                        <input id="ipt-truename-personal" value="{{$user['name']}}" name="realname" data-length="0,8" type="text" class="name" placeholder="请输入真实姓名"></div>
                                    <span class="clearfix"></span>
                                </div>
                                    <a href="" name="aphoto"></a>
                                <div class="unit">
                                    <div class="l a">
                                        <p class="subtitle">所在地</p></div>
                                    <div class="l b">
                                            <select id="ipt-location-a-personal"name="province">
                                                <option value="不公开">不公开</option>
                                            <option value="安徽" @if(strstr($user['address'],'-',true)=="安徽") selected @endif>安徽</option>
                                            <option value="北京" @if(strstr($user['address'],'-',true)=="北京") selected @endif>北京</option>
                                            <option value="重庆" @if(strstr($user['address'],'-',true)=="重庆") selected @endif>重庆</option>
                                            <option value="福建" @if(strstr($user['address'],'-',true)=="福建") selected @endif>福建</option>
                                            <option value="甘肃" @if(strstr($user['address'],'-',true)=="甘肃") selected @endif>甘肃</option>
                                            <option value="广东" @if(strstr($user['address'],'-',true)=="广东") selected @endif>广东</option>
                                            <option value="广西" @if(strstr($user['address'],'-',true)=="广西") selected @endif>广西</option>
                                            <option value="贵州" @if(strstr($user['address'],'-',true)=="贵州") selected @endif>贵州</option>
                                            <option value="海南" @if(strstr($user['address'],'-',true)=="海南") selected @endif>海南</option>
                                            <option value="河北" @if(strstr($user['address'],'-',true)=="河北") selected @endif>河北</option>
                                            <option value="黑龙江" @if(strstr($user['address'],'-',true)=="黑龙江") selected @endif>黑龙江</option>
                                            <option value="河南" @if(strstr($user['address'],'-',true)=="河南") selected @endif>河南</option>
                                            <option value="湖北" @if(strstr($user['address'],'-',true)=="湖北") selected @endif>湖北</option>
                                            <option value="湖南" @if(strstr($user['address'],'-',true)=="湖南") selected @endif>湖南</option>
                                            <option value="内蒙古" @if(strstr($user['address'],'-',true)=="内蒙古") selected @endif>内蒙古</option>
                                            <option value="江苏" @if(strstr($user['address'],'-',true)=="江苏") selected @endif>江苏</option>
                                            <option value="江西" @if(strstr($user['address'],'-',true)=="江西") selected @endif>江西</option>
                                            <option value="吉林" @if(strstr($user['address'],'-',true)=="吉林") selected @endif>吉林</option>
                                            <option value="辽宁" @if(strstr($user['address'],'-',true)=="辽宁") selected @endif>辽宁</option>
                                            <option value="宁夏" @if(strstr($user['address'],'-',true)=="宁夏") selected @endif>宁夏</option>
                                            <option value="青海" @if(strstr($user['address'],'-',true)=="青海") selected @endif>青海</option>
                                            <option value="山西" @if(strstr($user['address'],'-',true)=="山西") selected @endif>山西</option>
                                            <option value="山东" @if(strstr($user['address'],'-',true)=="山东") selected @endif>山东</option>
                                            <option value="上海" @if(strstr($user['address'],'-',true)=="上海") selected @endif>上海</option>
                                            <option value="四川" @if(strstr($user['address'],'-',true)=="四川") selected @endif>四川</option>
                                            <option value="天津" @if(strstr($user['address'],'-',true)=="天津") selected @endif>天津</option>
                                            <option value="西藏" @if(strstr($user['address'],'-',true)=="西藏") selected @endif>西藏</option>
                                            <option value="新疆" @if(strstr($user['address'],'-',true)=="新疆") selected @endif>新疆</option>
                                            <option value="云南" @if(strstr($user['address'],'-',true)=="云南") selected @endif>云南</option>
                                            <option value="浙江" @if(strstr($user['address'],'-',true)=="浙江") selected @endif>浙江</option>
                                            <option value="陕西" @if(strstr($user['address'],'-',true)=="陕西") selected @endif>陕西</option>
                                            <option value="台湾" @if(strstr($user['address'],'-',true)=="台湾") selected @endif>台湾</option>
                                            <option value="香港" @if(strstr($user['address'],'-',true)=="香港") selected @endif>香港</option>
                                            <option value="澳门" @if(strstr($user['address'],'-',true)=="澳门") selected @endif>澳门</option>
                                            <option value="海外" @if(strstr($user['address'],'-',true)=="海外") selected @endif>海外</option>
                                            <option value="100" @if(strstr($user['address'],'-',true)=="100") selected @endif>其他</option></select>
                                        <select id="ipt-location-b-personal" name="city">
                                            <option value="不公开">不公开</option>
                                            @if(substr($user['address'],strpos($user['address'],'-')+1)!='') <option value="{{substr($user['address'],strpos($user['address'],'-')+1)}}" selected>{{substr($user['address'],strpos($user['address'],'-')+1)}}</option> @endif
                                        </select>
                                    </div>
                                    <span class="clearfix"></span>
                                </div>


                                <!-- -.unit.l.a p.subtitle 联系电话 .l.b input#ipt-tel-personal.tel(data-name="联系电话", data-length="0,20", type="tel") span.clearfix-->
                                <p class="sub-divider"></p>
                                <div class="unit">
                                        <div class="l a">
                                            <p class="subtitle">邮箱</p></div>
                                        <div class="l b">
                                            <input id="ipt-home-personal" data-name="个人空间地址" name="email" data-length="0,63" type="text" class="req" value="{{$user['email']}}" placeholder="请输入个人邮箱"></div>
                                        <span class="clearfix"></span>
                                    </div>

                                    <p class="divider"></p>


                                    <div class="unit">
                                        <div class="l a">
                                            <p class="subtitle">修改个性签名</p></div>
                                        <div class="l b">
                                            <input   name="sign" data-length="0,63" type="text" value="{{$user['sign']}}" ></div>
                                        <div class="uploadimg"></div>
                                        <span class="clearfix"></span>
                                    </div>
                                    <p class="divider"></p>
                                <div class="unit-tool">
                                    <input class="btn primary do" type="submit" value="保存个人资料">
                                    <span class="clearfix"></span>
                                </div>


                                    {{-- <div class="unit">--}}
                                    {{--<div class="l a">--}}
                                    {{--<p class="subtitle">邮箱地址</p></div>--}}
                                    {{--<div class="l b">--}}
                                    {{--<span id="ipt-email-personal" style="color: red;">验证成功后可获得3香蕉奖励</span>--}}
                                    {{--<a href="#area=verify-email" class="btn success r">--}}
                                    {{--<span>邮箱验证</span>--}}
                                    {{--<div class="i icon icon-angle-right"></div>--}}
                                    {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<span class="clearfix"></span>--}}
                                    {{--</div>--}}
                                    {{--<div class="unit">--}}
                                    {{--<div class="l a">--}}
                                    {{--<p class="subtitle">手机号码</p></div>--}}
                                    {{--<div class="l b">--}}
                                    {{--<span id="ipt-tel-personal" class="l">182*****203</span>--}}
                                    {{--<a href="#area=change-phone" class="btn success r verify-mobile">--}}
                                    {{--<span class="change-mobile">修改电话</span>--}}
                                    {{--<div class="i icon icon-angle-right"></div>--}}
                                    {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<span class="clearfix"></span>--}}
                                    {{--</div>--}}
                                </form>
                            </div>
                        </div>

                        <script>

                            (function() {
                                var e, r, a, n, t, s;
                                e = $("#block-second"),
                                    n = e.find("div.mainer:first"),
                                    t = $("#ipt-location-a-personal"),
                                    s = $("#ipt-location-b-personal"),
                                    t.change(function() {
                                        var e, r, a, n, i;
                                        for (e = ["不限"], e = function() {
                                            switch (t.val()) {
                                                case "安徽":
                                                    return ["不限", "合肥", "芜湖", "蚌埠", "淮南", "马鞍山", "淮北", "铜陵", "安庆", "黄山", "滁州", "阜阳", "宿州", "巢湖", "六安", "亳州", "池州", "宣城"];
                                                case "北京":
                                                    return ["不限", "东城区", "西城区", "崇文区", "宣武区", "朝阳区", "丰台区", "石景山区", "海淀区", "门头沟区", "房山区", "通州区", "顺义区", "昌平区", "大兴区", "怀柔区", "平谷区", "密云县", "延庆县"];
                                                case "重庆":
                                                    return ["不限", "万州区", "涪陵区", "渝中区", "大渡口区", "江北区", "沙坪坝区", "九龙坡区", "南岸区", "北碚区", "万盛区", "双桥区", "渝北区", "巴南区", "黔江区", "长寿区", "綦江县", "潼南县", "铜梁县", "大足县", "荣昌县", "璧山县", "梁平县", "城口县", "丰都县", "垫江县", "武隆县", "忠县", "开县", "云阳县", "奉节县", "巫山县", "巫溪县", "石柱土家族自治县", "秀山土家族苗族自治县", "酉阳土家族苗族自治县", "彭水苗族土家族自治县", "江津区", "合川区", "永川区", "南川区"];
                                                case "福建":
                                                    return ["不限", "福州", "厦门", "莆田", "三明", "泉州", "漳州", "南平", "龙岩", "宁德"];
                                                case "甘肃":
                                                    return ["不限", "兰州", "嘉峪关", "金昌", "白银", "天水", "武威", "张掖", "平凉", "酒泉", "庆阳", "定西", "陇南", "临夏", "甘南"];
                                                case "广东":
                                                    return ["不限", "广州", "韶关", "深圳", "珠海", "汕头", "佛山", "江门", "湛江", "茂名", "肇庆", "惠州", "梅州", "汕尾", "河源", "阳江", "清远", "东莞", "中山", "潮州", "揭阳", "云浮"];
                                                case "广西":
                                                    return ["不限", "南宁", "柳州", "桂林", "梧州", "北海", "防城港", "钦州", "贵港", "玉林", "百色", "贺州", "河池", "来宾", "崇左"];
                                                case "贵州":
                                                    return ["不限", "贵阳", "六盘水", "遵义", "安顺", "铜仁", "黔西南", "毕节", "黔东南", "黔南"];
                                                case "海南":
                                                    return ["不限", "海口", "三亚", "三沙", "其它"];
                                                case "河北":
                                                    return ["不限", "石家庄", "唐山", "秦皇岛", "邯郸", "邢台", "保定", "张家口", "承德", "沧州", "廊坊", "衡水"];
                                                case "黑龙江":
                                                    return ["不限", "哈尔滨", "齐齐哈尔", "鸡西", "鹤岗", "双鸭山", "大庆", "伊春", "佳木斯", "七台河", "牡丹江", "黑河", "绥化", "大兴安岭"];
                                                case "河南":
                                                    return ["不限", "郑州", "开封", "洛阳", "平顶山", "安阳", "鹤壁", "新乡", "焦作", "濮阳", "许昌", "漯河", "三门峡", "南阳", "商丘", "信阳", "周口", "驻马店", "济源"];
                                                case "湖北":
                                                    return ["不限", "武汉", "黄石", "十堰", "宜昌", "襄阳", "鄂州", "荆门", "孝感", "荆州", "黄冈", "咸宁", "随州", "恩施土家族苗族自治州", "仙桃", "潜江", "天门", "神农架"];
                                                case "湖南":
                                                    return ["不限", "长沙", "株洲", "湘潭", "衡阳", "邵阳", "岳阳", "常德", "张家界", "益阳", "郴州", "永州", "怀化", "娄底", "湘西土家族苗族自治州"];
                                                case "内蒙古":
                                                    return ["不限", "呼和浩特", "包头", "乌海", "赤峰", "通辽", "鄂尔多斯", "呼伦贝尔", "兴安盟", "锡林郭勒盟", "乌兰察布盟", "巴彦淖尔盟", "阿拉善盟"];
                                                case "江苏":
                                                    return ["不限", "南京", "无锡", "徐州", "常州", "苏州", "南通", "连云港", "淮安", "盐城", "扬州", "镇江", "泰州", "宿迁"];
                                                case "江西":
                                                    return ["不限", "南昌", "景德镇", "萍乡", "九江", "新余", "鹰潭", "赣州", "吉安", "宜春", "抚州", "上饶"];
                                                case "吉林":
                                                    return ["不限", "长春", "吉林", "四平", "辽源", "通化", "白山", "松原", "白城", "延边朝鲜族自治州"];
                                                case "辽宁":
                                                    return ["不限", "沈阳", "大连", "鞍山", "抚顺", "本溪", "丹东", "锦州", "营口", "阜新", "辽阳", "盘锦", "铁岭", "朝阳", "葫芦岛"];
                                                case "宁夏":
                                                    return ["不限", "银川", "石嘴山", "吴忠", "固原", "中卫"];
                                                case "青海":
                                                    return ["不限", "西宁", "海东", "海北", "黄南", "海南", "果洛", "玉树", "海西"];
                                                case "山西":
                                                    return ["不限", "太原", "大同", "阳泉", "长治", "晋城", "朔州", "晋中", "运城", "忻州", "临汾", "吕梁"];
                                                case "山东":
                                                    return ["不限", "济南", "青岛", "淄博", "枣庄", "东营", "烟台", "潍坊", "济宁", "泰安", "威海", "日照", "莱芜", "临沂", "德州", "聊城", "滨州", "菏泽"];
                                                case "上海":
                                                    return ["不限", "黄浦区", "卢湾区", "徐汇区", "长宁区", "静安区", "普陀区", "闸北区", "虹口区", "杨浦区", "闵行区", "宝山区", "嘉定区", "浦东新区", "金山区", "松江区", "青浦区", "南汇区", "奉贤区", "崇明县"];
                                                case "四川":
                                                    return ["不限", "成都", "自贡", "攀枝花", "泸州", "德阳", "绵阳", "广元", "遂宁", "内江", "乐山", "南充", "眉山", "宜宾", "广安", "达州", "雅安", "巴中", "资阳", "阿坝", "甘孜", "凉山"];
                                                case "天津":
                                                    return ["不限", "和平区", "河东区", "河西区", "南开区", "河北区", "红桥区", "塘沽区", "汉沽区", "大港区", "东丽区", "西青区", "津南区", "北辰区", "武清区", "宝坻区", "宁河县", "静海县", "蓟县", "滨海新区", "保税区"];
                                                case "西藏":
                                                    return ["不限", "拉萨", "昌都", "山南", "日喀则", "那曲", "阿里", "林芝"];
                                                case "新疆":
                                                    return ["不限", "乌鲁木齐", "克拉玛依", "吐鲁番", "哈密", "昌吉", "博尔塔拉", "巴音郭楞", "阿克苏", "克孜勒苏", "喀什", "和田", "伊犁", "塔城", "阿勒泰", "石河子"];
                                                case "云南":
                                                    return ["不限", "昆明", "曲靖", "玉溪", "保山", "昭通", "楚雄", "红河", "文山", "思茅", "西双版纳", "大理", "德宏", "丽江", "怒江", "迪庆", "临沧"];
                                                case "浙江":
                                                    return ["不限", "杭州", "宁波", "温州", "嘉兴", "湖州", "绍兴", "金华", "衢州", "舟山", "台州", "丽水"];
                                                case "陕西":
                                                    return ["不限", "西安", "铜川", "宝鸡", "咸阳", "渭南", "延安", "汉中", "榆林", "安康", "商洛"];
                                                case "台湾":
                                                    return ["不限", "台北市", "高雄市", "基隆市", "台中市", "台南市", "新竹市", "嘉义市", "台北县", "宜兰县", "桃园县", "新竹县", "苗栗县", "台中县", "彰化县", "南投县", "云林县", "嘉义县", "台南县", "高雄县", "屏东县", "澎湖县", "台东县", "花莲县", "其它"];
                                                case "香港":
                                                    return ["不限", "中西区", "东区", "九龙城区", "观塘区", "南区", "深水埗区", "黄大仙区", "湾仔区", "油尖旺区", "离岛区", "葵青区", "北区", "西贡区", "沙田区", "屯门区", "大埔区", "荃湾区", "元朗区", "其它"];
                                                case "澳门":
                                                    return ["不限", "花地玛堂区", "圣安多尼堂区", "大堂区", "望德堂区", "风顺堂区", "氹仔", "路环", "其它"];
                                                case "海外":
                                                    return ["不限", "美国", "英国", "法国", "俄罗斯", "加拿大", "巴西", "澳大利亚", "印尼", "泰国", "马来西亚", "新加坡", "菲律宾", "越南", "印度", "日本", "新西兰", "韩国", "德国", "意大利", "爱尔兰", "荷兰", "瑞士", "乌克兰", "南非", "芬兰", "瑞典", "奥地利", "西班牙", "比利时", "挪威", "丹麦", "波兰", "阿根廷", "白俄罗斯", "哥伦比亚", "古巴", "埃及", "希腊", "匈牙利", "伊朗", "蒙古", "墨西哥", "葡萄牙", "沙特阿拉伯", "土耳其", "其它"];
                                                case "其它":
                                                    return ["不限"];
                                                default:
                                                    return ["不公开"]
                                            }
                                        } (), a = "", n = 0, i = e.length; i > n; n++) r = e[n],
                                            a += '<option value="' + r + '"> ' + r + "</option>";
                                        return s.html(a)
                                    })
                            }).call(this);
                        </script>
                    </div>
                </div>


@endsection


