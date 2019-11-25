
@extends('home.layouts.index_page')
@section('content')


<div class="top" >
    <h3 style="color:#0059b3">Câu hỏi trong phiên đã đóng</h3>
  
        @foreach($list as $l)

        <div class="content" style="margin-top: 15px;border-radius: 10px;background-color: #ffffff"><a href="{{url("user/page/question_answer/{$l->id}")}}" style="text-decoration: none;">
                <div class="row" >  
                    <div class="left col-sm-2">
                        <img src="{{URL::asset('/img/hoi-cham.jpg')}}" 
                        alt="image" style="height: 75px;width:75px;margin-top:10px" >
                    </div>
                    
                    <div class="col-sm-7 right"  style="background-color: #ffffff">
                        <p class="title" style="color:#e63900">Câu hỏi: {{$l->question}} ?</p>
                        <p><font size="2">Phiên hỏi-đáp: {{$l->name_session}}</p>
                        <p >Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
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