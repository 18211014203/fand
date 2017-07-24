@include("home.layout.head")
{{--@include("home.layout.mainleft")--}}

<link rel="stylesheet" href="{{asset('/home/css/info.css')}}" />

@section("area-main")

            <div id="header-inner" class="inner">
                <a id="logo-home-member" href="/" title="认真你就输了"></a>
                <div id="block-title-banner" class="no-select">
                    <p>关于我们</p>
                    <div>
                        <a href="/">AcFun</a>
                        <span class="d">About Us</span></div>
                    <span class="clearfix"></span>
                </div>
            </div>
        </div>
        <div id="mainer" style="min-height: 29px;">
            <div id="mainer-inner">
                <div id="guide-left" class="block l">
                    <div class="mainer">
                        <a href="{{url('info/about')}}" data-title="About Us" class="item data-about"
                        @if(!empty($about))
                            active
                            @endif>关于我们</a>
                        <a href="{{url('info/contact')}}" data-title="Contact Us" class="item data-contact
                        @if(!empty($contact))
                                active
                                @endif">联系我们</a>


                    </div>
                </div>



@show
@section('area')

@show

@include("home.layout.foot")