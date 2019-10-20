@extends('home.layouts.index_page')
@section('content')

<div class="top">
        <div class="row"> <center>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <img src="{{URL::asset('/img/q-and-a.jpg')}}">
            </div></center>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <p style="color: red;font-size: 18px;"><span class="fa fa-lock">
                </span>Phiên hỏi đáp</p>
                <p><span class="fa fa-lock">
                </span>Mô tả: Phiên hỏi đáp thử nghiệm</p>
                <p><span class="fa fa-lock">
                </span>Đăng bới: </p>
                <p><span class="fa fa-lock">
                </span>Thời gian tạo:22 ngày trước</p>
            </div>
        </div>
</div>

<div class="botton">
    <div class="header">
        <p class="title">Đăng bới: Thành viên ẩn danh</p>
        <p class="time">22 ngày trước</p>
    </div>
    <div class="main-right">
       
        <div class="content">
            {{-- hiện thị nội dung câu hỏi --}}
            <div class="noidung">
                <ul>
                    <li >Nội dung câu hỏi:</li>
                    <li>{{$list_question->question}}</li>
                    <li>3 lượt thích</li>
                </ul>

            </div>


            <p><i class="fa fa-thumbs-o-up"></i> Thích</p>
            {{-- hiển thị nội dung câu trả  lời của từng câu hỏi --}}
            @foreach($list_answer as $l)

                <div class="tra-loi">
                    <ul>
                        <li style="background: #1a88d652"><p></p><span class="fa fa-user"> Người dùng: {{$l->user_id}}</span></p>
                        <br>
                        <p class="time">22 ngày trước</p></li>
                        <li>{{$l->answer}}</li>
                    </ul>
                </div>
                    

            @endforeach

        </div>
    </div>


@endsection