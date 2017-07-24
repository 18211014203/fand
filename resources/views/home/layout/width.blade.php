<!-- width image -->
<div class="header-banner">
    <style>
        @media screen and (max-width:1280px){ .header .header-banner .banner-href{ background-image: url({{asset(Config('web.width_image'))}}); } }
        @media screen and (min-width:1280px) and (max-width:1960px){ .header .header-banner .banner-href{ background-image: url({{asset(Config('web.width_image'))}}); } }
    </style>
    <a href="javascript:;" target="_blank" class="banner-href"></a>
    <span class="point hidden">{{Config('web.width_image_title')}}</span></div>
<!-- width image end -->