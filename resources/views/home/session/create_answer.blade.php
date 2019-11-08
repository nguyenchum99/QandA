@extends('home.layouts.index_page')
@section('content')

<div class="top">
        <div class="row"> 
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <h3>Danh sách câu trả lời </h3>
                <p style="color: red;font-size: 18px;">
                Câu hỏi: {{$question->question}}</p>
                <p>Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($question->created_at))
                                ->diffForHumans()
                            }}</p>
            </div>
        </div>
</div>

<div class="botton">
   
    <div class="main-right">
        <div class="content">
            {{-- hiện thị nội dung câu hỏi --}}

            <form method="post" action="{{url("user/session/create_answer/{$question->id}")}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <h4>Nhập nội dung câu trả lời </h4>    
                    <textarea type="text" name="answer" rows="3"
                    class="form-control" placeholder="Nội dung câu trả lời..." ></textarea>
                </div>
   
                <input type="submit" name="submit" value="Trả lời" class="btn btn-primary" />
            </form>

        </div>
    </div>


    @foreach($list as $l)
    <div class="botton">
   
            <div class="main-right">
                <div class="content" style="background-color: #ffffff">
                    {{-- hiện thị nội dung câu hỏi --}}
                        <div class="form-group">
                            <p>Đăng bởi: {{$l->name}}</p>
                            <p>Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                    ->diffForHumans()}}</p>
                            <p>Trả lời: {{$l->answer}}</p>
                        </div>
                </div>
            </div>

    @endforeach

@endsection