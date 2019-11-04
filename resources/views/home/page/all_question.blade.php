
@extends('home.layouts.index_page')
@section('content')


<div class="main-right">
    <h2>Danh sách các câu hỏi</h2>
    @if(session('thongbao'))

    <div class="alert alert-success">
        {{session('thongbao')}}
    </div>

@endif

        @foreach($list as $l)

        <div class="box">
                <div class="row">  
                    <div class="col-md-2">
                        <img src="{{URL::asset('/img/hoi-cham.jpg')}}" alt="image" 
                        style="height: 75px;width:75px;margin-top:10px" >
                    </div>
                    
                    <div class="col-md-10 box-right"><a href="{{url("user/page/question_answer/{$l->id}")}}" style="text-decoration: none;">
                        <p class="title">{{$l->question}}</p>
                        <p>Phiên hỏi-đáp: {{$l->name_session}}</p>
                        <p class="time">Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                ->diffForHumans()
                            }}</p>
                        </a>
                    </div>
                </div>

        </div>

        @endforeach

       
       
</div>

@endsection