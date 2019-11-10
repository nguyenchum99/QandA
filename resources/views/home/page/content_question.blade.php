@extends('home.layouts.index_page')
@section('content')

<div class="top">
    
        <div class="row"> 
            <div class="left col-sm-3" style="margin-left:20px;margin-top: 10px">
                <img src="{{URL::asset('/img/q-and-a.jpg')}}" style="heigth: 70%;width: 70%">
            </div>
            <div class="col-sm-7 right">
                <p class="title" style="color:red;">Câu hỏi: {{$question->question}}?</p>
                <p style="color:blue">Đăng bởi: người dùng {{$question->user_id}}</p>
                <p style="color:blue">Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($question->created_at))
                                ->diffForHumans()
                            }}</p>
            </div>
        </div>

</div>

<div class="botton">
    <div class="main-right">
       
        <div class="content" style="background-color: #ebebe0;border-radius: 10px">
            {{-- hiển thị nội dung câu trả  lời của từng câu hỏi --}}
            @foreach($list_answer as $l)
                <div  style="border-radius:10px">
                    <ul>
                        <li style="background: #1a88d652;border-radius:10px"> Người dùng:{{$l->user_id}}</p>
                    
                       </li>
                        <li style="background-color: #ffffff;color:blue;border-radius:10px">Trả lời: {{$l->answer}}
                                <p class="time">Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                        ->diffForHumans()}}</p></li>
                    </ul>
                    <br>
                </div>
                    
            @endforeach

        </div>
    </div>


@endsection