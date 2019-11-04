@extends('home.layouts.index_page')
@section('content')

<div class="top">
    @foreach($list_answer as $l)
        <div class="row"> 
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <img src="{{URL::asset('/img/q-and-a.jpg')}}">
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <p style="color: red;font-size: 18px;"><span class="fa fa-lock">
                </span></p>
                <p>Mô tả: Thảo luận</p>
                <p><span class="fa fa-lock">
                </span>Đăng bởi: </p>
                <p><span class="fa fa-lock">
                </span>Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                ->diffForHumans()
                            }}</p>
            </div>
        </div>
    @endforeach
</div>

<div class="botton">
     {{-- hiện thị sửa thành công --}}
     @if(session('thongbao'))

     <div class="alert alert-success">
         {{session('thongbao')}}
     </div>
     @endif

    <div class="header">
        <p class="title">Đăng bởi: Thành viên ẩn danh</p>
        <p class="time">Thời gian: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($question->created_at))
                                    ->diffForHumans()
                                }}</p>
    </div>
    <div class="main-right">
       
        <div class="content">
            {{-- hiện thị nội dung câu hỏi --}}
            <div class="noidung">
                <ul>
                    <li >Nội dung câu hỏi: {{$question->question}}</li>
                    
                    <li>
                        <form method="post" action="" class="fa fa-thumbs-o-up">
                            <input type="submit" name="count" value="Thích"/>
                        </form>
                    </li>
                </ul>
            </div>          
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