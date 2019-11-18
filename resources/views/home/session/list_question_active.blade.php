
@extends('home.layouts.index_page')
@section('content')


<div class="main-right">
    <h3 style="color: #000000"><b>Câu hỏi trong phiên hỏi đáp mở</b></h3>
    <h4 style="color: red"><b>Phiên hỏi đáp: {{$session ->name_session}}<b></h4>

    <form method="post" action="{{url("user/session/create_question/{$session->id}")}}">
        <div class="form-group" style="color:   #000000">

            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <h4>Tạo câu hỏi</h4>    
            <textarea type="text" name="question" rows="3"
            class="form-control" placeholder="Nội dung câu hỏi..." ></textarea>
        </div>
        <input type="submit" name="submit" value="Thêm câu hỏi trong phiên" class="btn btn-primary"
        style="background-color:#a6a6a6; color:#000000" />
    </form>

        @foreach($list as $l)

        <div class="content"  style="margin-top: 15px;background: #ffffff;border-radius: 10px"><a href="{{url("user/session/create_answer/{$l->id}")}}">
                <div class="row">  
                    <div class="col-sm-2"><center>
                        <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                        style="height: 75px;width:75px;margin-top:10px;border-radius: 50%" >
                    </div></center>
                    
                    <div class="col-sm-7" >
                        <p class="title" style="color:red">Câu hỏi: {{$l->question}} ?</p>
                        <p><font size="2" >Đăng bởi: {{$l->name}}</p>
                        <p><font size="2" >Phiên hỏi-đáp: {{$l->name_session}}</p>
                        <p >Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                ->diffForHumans()
                            }}</p>
                    </div>
                </div>
            </a>
        </div>

        @endforeach

       
       
</div>

@endsection