
@extends('home.layouts.index_page')
@section('content')


<div class="main-right">
    <h2>Danh sách phiên hỏi đáp đã đóng</h2>
       
    @foreach($name as $l)

        <div class="box">
                <div class="row">  
                    <div class="col-md-2">
                        <img src="{{URL::asset('/img/q-and-a.jpg')}}" alt="image" style="height: 75px;width:75px;margin-top:10px" >
                    </div>
                    <div class="col-md-10 box-right"><a href="{{url("user/session/list_question/{$l->id}")}}" >
                        <p class="title" style="color: red">{{$l->name_session}}</p>
                        <p>Chủ tọa: {{$l->name}}</p>
                        <p class="time">Đã đóng: </p>
                        <p>Số câu hỏi:</p>
                        </a>
                    </div>
                </div>
        </div>

    @endforeach

</div>

@endsection