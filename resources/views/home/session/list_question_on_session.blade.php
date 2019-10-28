
@extends('home.layouts.index_page')
@section('content')


<div class="main-right">
    <h2>Câu hỏi trong phiên đã đóng</h2>
  

        @foreach($list as $l)

        <div class="box">
                <div class="row">  
                    <div class="col-md-2">
                        <img src="{{URL::asset('/img/hoi-cham.jpg')}}" 
                        alt="image" style="height: 75px;width:75px;margin-top:10px" >
                    </div>
                    
                    <div class="col-md-10 box-right"><a href="{{url("user/page/question_answer/{$l->id}")}}" >
                        <p class="title">{{$l->question}}</p>
                        <p>Phiên hỏi-đáp: {{$l->name_session}}</p>
                        <p class="time">{{$l->created_at}}</p>
                        </a>
                    </div>
                </div>

        </div>

        @endforeach

       
       
</div>

@endsection