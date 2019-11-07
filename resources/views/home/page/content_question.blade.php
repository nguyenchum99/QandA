@extends('home.layouts.index_page')
@section('content')

<div class="top">
    
        <div class="row"> 
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <img src="{{URL::asset('/img/q-and-a.jpg')}}">
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <p>Câu hỏi: {{$question->question}} </p>
                <p>Đăng bởi người dùng {{$question->user_id}}</p>
                <p>Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($question->created_at))
                                ->diffForHumans()
                            }}</p>
            </div>
        </div>

</div>

<div class="botton">
    <div class="main-right">
       
        <div class="content">
            {{-- hiển thị nội dung câu trả  lời của từng câu hỏi --}}
            @foreach($list_answer as $l)

                <div class="tra-loi">
                    <ul>
                        <li style="background: #1a88d652"><p></p><span class="fa fa-user"> Người dùng:{{$l->user_id}}</span></p>
                        <br>
                        <p class="time">Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                    ->diffForHumans()}}</p></li>
                        <li>Trả lời: {{$l->answer}}</li>
                        <li>
                        <form method="post" action="" class="fa fa-thumbs-o-up">
                            <input type="submit" name="count" value="Thích"/>
                        </form>
                    </li>
                    </ul>
                </div>
                    
            @endforeach

        </div>
    </div>


@endsection