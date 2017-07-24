@extends("home.layout.info")

@section('css')

@endsection

@section("area-main")
    <!-- main  主体 -->

    @parent
    <div id="cont-right" class="block r">
        <div class="mainer">
            {!!$contact!!}
        </div>
    </div>
    <span class="clearfix"></span>

@endsection
@section('js')

@endsection