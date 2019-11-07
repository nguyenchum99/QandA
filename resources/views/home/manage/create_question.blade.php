@extends('home.layouts.index_page')
@section('content')


<div class="top">
        <div class="row"> 
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <img src="{{URL::asset('/img/q-and-a.jpg')}}">
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <p style="color: red;font-size: 18px;"><span class="fa fa-lock">
                </span>Phiên hỏi đáp: {{$session->name_session}}</p>
                <p><span class="fa fa-lock">
                </span>Thời gian tạo:  {{ \Carbon\Carbon::createFromTimeStamp(strtotime($session->created_at))
                                    ->diffForHumans()}}</p>
            </div>
        </div>
</div>

<div class="botton">
   
    <div class="main-right">
        <div class="content">
            {{-- hiện thị nội dung câu hỏi --}}

            <form method="post" action="{{$session->id}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <h4>Nhập nội dung câu hỏi</h4>    
                    <textarea type="text" name="question" rows="3"
                    class="form-control" placeholder="Nội dung câu hỏi" ></textarea>
                </div>
   
                <input type="submit" name="submit" value="Thêm câu hỏi trong phiên" class="btn btn-primary" />
            </form>

        </div>
    </div>


@endsection