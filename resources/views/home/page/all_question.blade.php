
@extends('home.layouts.index_page')
@section('content')


<div class="main-right">
        @foreach($list as $l)

        <div class="box">
                <div class="row">  
                    <div class="col-md-2">
                        <img src="{{URL::asset('/img/hoi-cham.jpg')}}" alt="image" style="height: 75px;width:75px;margin-top:10px" >
                    </div>
                    <div class="col-md-10 box-right"><a href="{{url("user/page/question_answer/{$l->id}")}}" >
                        <p class="title">{{$l->question}}</p>
                        <p>Phiên hỏi-đáp: phiên hỏi đáp</p>
                        <p class="time">22 ngày trước</p>
                        </a>
                    </div>
                </div>

        </div>

        @endforeach

        <div aria-label="Page navigation">
                {{$list->links()}}
        </div>
       
</div>

@endsection