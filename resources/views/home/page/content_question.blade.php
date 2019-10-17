@extends('home.layouts.index_page')
@section('content')

<div class="botton">
    <div class="header">
        <p class="title">Đăng bới: Thành viên ẩn danh</p>
        <p class="time">22 ngày trước</p>
    </div>
    <div class="main-right">
       
        <div class="content">

            <div class="noidung">
                <ul>
                    <li >Nội dung câu hỏi:{{$list_question->user_id}}</li>
                    <li>{{$list_question->question}}</li>
                    <li>3 lượt thích</li>
                </ul>

            </div>

            <p><i class="fa fa-thumbs-o-up"></i> Thích</p>
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