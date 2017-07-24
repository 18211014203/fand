
<span class="clearfix"></span>
</div>
</div>
</div>
<span class="clearfix"></span>
<!-- main 主体结束 -->


<!-- footer -->
<div id="footer">
    <div id="footer-inner">
        <div class="top-footer">
            <div class="l">
                <div class="unit unit-0">
                    <div class="a">合作</div>
                    <div class="b">
                        <a id="" target="_blank" href="{{url('info/about')}}" data-id="" class="a-0">关于我们</a>
                        <a id="" target="_blank" href="{{url('info/contact')}}" data-id="" class="a-1">联系我们</a>

                        <span class="clearfix"></span>
                    </div>
                </div>


                <div class="unit unit-3">
                    <div class="a">友情链接</div>
                    <div class="b">
                        <p>
                        @foreach($url as $k=>$v)
                            @if($k!=0&&$k%2==0)
                                <br>
                            @endif
                            <a href="{{url($v['url'])}}" target="_blank" class="mr0">{{$v['name']}}</a>
                        @endforeach
                        </p>
                        <span class="clearfix"></span>
                    </div>
                </div>

                <span class="clearfix"></span>
                <div class="arrow-right"></div>
                <div class="erweima">
                    <div class="arrow-top"></div>
                    <img src="http://cdn.aixifan.com/dotnet/20130418/project/sanae/style/image/erweima.jpg" width="140px" height="140px" /></div>
            </div>
            <div class="r">
                <div id="avatar-ac-footer" class="hidden">
                    <img src="/static/picture/1.gif" alt="1.gif">
                </div>
            </div>
            <span class="clearfix"></span>
        </div>
        <div class="bottom-footer">

            <a id="a-logo-footer" href="/"></a>
            <p>{{Config('web.copyright')}}  保留所有权利</p>
            <p id="hint-time-released" data-time="2017.7.3 14:50:12" class="hidden">Released at 2017.7.3 14:50:12.</p></div>
    </div>
</div>
<!-- footer end -->



</body>

</html>

@section("js")

@show





