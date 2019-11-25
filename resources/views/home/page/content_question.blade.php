@extends('home.layouts.index_page')
@section('content')

<div class="top">
    
        <div class="row"> 
            <div class="left col-sm-3" style="margin-left:20px;margin-top: 10px">
                <img src="{{URL::asset('/img/q-and-a.jpg')}}" style="heigth: 70%;width: 70%">
            </div>
            <div class="col-sm-7 right">
                <p class="title" style="color:red;">Câu hỏi: {{$question->question}}?</p>
                <p style="color:blue">Đăng bởi: người dùng ẩn danh</p>
                <p style="color:blue">Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($question->created_at))
                                ->diffForHumans()
                            }}</p>
            </div>
        </div>

</div>

<div class="botton" style="background:#f2f2f2 ">
    
          @foreach($list_answer as $l)
        <div class="content" style="background-color: #ffffff;border-radius: 10px; margin-top: 15px">
            {{-- hiển thị nội dung câu trả  lời của từng câu hỏi --}}
            <p style="color: red">Đăng bởi: người dùng ẩn danh</p>
            <p >Trả lời: {{$l->answer}}</p>
            <p >Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
            ->diffForHumans()}}</p>

        </div>
    @endforeach

</div>


@endsection