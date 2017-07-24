<!-- footer -->
<div id="footer" class="footer">
    <div class="wp footer-con">
        <div class="clearfix footer-top">
            <div class="fl footer-nav">
                <div class="item-cooperation">
                    <h5>合作</h5>
                    <p>
                        <a href="{{url('info/about')}}" target="_blank">关于我们</a>

                        <a href="{{url('info/contact')}}" target="_blank" class="mr0">联系我们</a>
                    </p>

                </div>


                <div class="item-function">
                    <h5>友情链接</h5>
                    <p>

                        @foreach($url as $k=>$v)
                            @if($k!=0&&$k%2==0)
                                <br>
                            @endif
                            <a href="{{url($v['url'])}}" target="_blank" class="mr0">{{$v['name']}}</a>
                        @endforeach
                    </p>
                </div>

            </div>

        </div>
        {{--许可证--}}

        <div class="footer-bottom">
            <a href="{{url('/index')}}">
                <img src="{{asset(Config('web.logo'))}}" width="78" height="24"></a>
            <p>{{Config('web.copyright')}} 保留所有权利</p>
        </div>
    </div>
</div>
<!-- footer end -->

</body>

</html>
@section('js')

@show
