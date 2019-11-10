
@extends('home.layouts.index_page')
@section('content')


<div class="main-right">
    <h3><b>Câu hỏi trong phiên đã đóng</b></h3>
  
        @foreach($list as $l)

        <div class="box"><a href="{{url("user/page/question_answer/{$l->id}")}}" style="text-decoration: none;">
                <div class="row">  
                    <div class="left col-sm-2">
                        <img src="{{URL::asset('/img/hoi-cham.jpg')}}" 
                        alt="image" style="height: 75px;width:75px;margin-top:10px" >
                    </div>
                    
                    <div class="col-sm-7 right"  style="background-color: #ffffff">
                        <p class="title">{{$l->question}} ?</p>
                        <p><font size="2" color="blue">Phiên hỏi-đáp: {{$l->name_session}}</p>
                        <p class="time">Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                ->diffForHumans()
                            }}</p>
                        </a>
                    </div>
                </div>
            </a>
        </div>

        @endforeach

       
       
</div>

@endsection