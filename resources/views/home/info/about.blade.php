@extends("home.layout.info")

@section('css')

    <link rel="stylesheet" href="{{asset('/home/css/info.css')}}" />

@endsection

@section("area-main")
    <!-- main  主体 -->

    @parent
    <div id="cont-right" class="block r">
        <div class="mainer">
            {!! $about !!}
        </div>
    </div>
    <span class="clearfix"></span>

@endsection
@section('js')

@endsection