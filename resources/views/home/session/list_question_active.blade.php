
@extends('home.layouts.index_page')
@section('content')


<div class="main-right">
    <h2>Câu hỏi trong phiên hỏi đáp mở</h2>
    <h3>Phiên hỏi đáp: {{$session ->name_session}}</h3>

    <form method="post" action="{{url("user/session/create_question/{$session->id}")}}">
        <div class="form-group">

            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <h4>Tạo câu hỏi</h4>    
            <textarea type="text" name="question" rows="3"
            class="form-control" placeholder="Nội dung câu hỏi..." ></textarea>
        </div>
        <input type="submit" name="submit" value="Thêm câu hỏi trong phiên" class="btn btn-primary" />
    </form>

        @foreach($list as $l)

        <div class="box"><a href="{{url("user/session/create_answer/{$l->id}")}}">
                <div class="row">  
                    <div class="col-md-2">
                        <img src="{{URL::asset('/img/hoi-cham.jpg')}}" 
                        alt="image" style="height: 75px;width:75px;margin-top:10px" >
                    </div>
                    
                    <div class="col-md-10 box-right">
                        <p class="title">Câu hỏi: {{$l->question}}</p>
                        <p>Đăng bởi: {{$l->name}}</p>
                        <p>Phiên hỏi-đáp: {{$l->name_session}}</p>
                        <p class="time">Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                ->diffForHumans()
                            }}</p>
                    </div>
                </div>
            </a>
        </div>

        @endforeach

       
       
</div>

@endsection