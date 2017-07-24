@extends('layouts.admin')
@section('content')
		
        <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <div class="result_content">
            <h1>排行榜</h1>
            <div style="float: right;margin-top:-47px">
            <a href="{{ asset('/rank/update') }}"><button type="button" class="btn btn-danger">更新总排行</button></a></div>
            

            <span style="font-weight: bold;">时间排行:</span>
            <a href="{{ asset('/rank/click/d') }}"><button type="button" class="btn btn-info" style="background-color: red">日排行榜</button></a>
            <a href="{{ asset('/rank/click/w') }}"><button type="button" class="btn btn-info">周排行榜</button></a>
            <a href="{{ asset('/rank/click/m') }}"><button type="button" class="btn btn-info">月排行榜</button></a> 
            <br>
            <div style="height: 10px"></div>
            <span style="font-weight: bold;">类型排行:</span>
            @foreach($type as $a=>$b)
            	<a href="/rank/ttype/{{ $b['tid'] }}"><button type="button" class="btn btn-success">{{ $b['tname'] }}</button></a>
			@endforeach

                <table class="list_tab" style="text-align:center;margin-top: 20px">
                    <tr>  
                
                        <th>视频标号</th>
                        <th>视频标题</th>
                        <th>视频类型</th>
                        <th>视频</th>
                        <th>视频上传人</th>
                        <th>点击量</th>
                    </tr>

					@foreach($data as $k=>$v)
                    <tr>
                        <td>{{$v['vid']}}</td>
                        <td>{{$v['title']}}</td>
                        <td>{{$v['tname']}}</td>
                  <td><img src="{{ $v['img'] }}" alt="" style="width: 60px;height:50px"></td>
                        <td>{{$v['name']}}</td>    
                        <td>{{$v['dclick']}}</td>
                    </tr>
                    @endforeach
                </table>

            </div>
            {!! $data->render() !!}
            
        </div>

@endsection