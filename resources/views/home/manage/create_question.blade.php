@extends('home.layouts.index_page')
@section('content')


<div class="top">
        <div class="row"> 
            <div class="left col-sm-3"><center>
                <img src="{{URL::asset('/img/q-and-a.jpg')}}" style="height:60%; width:60%;">
                </center>
            </div>
            <div class="col-sm-7 right">
                <p style="color: #e63900;font-size: 18px;"><span class="fa fa-lock">
                </span>Phiên hỏi đáp: {{$session->name_session}}</p>
                <p style="color: #e63900;"><span class="fa fa-history">
                </span>Thời gian tạo:  {{ \Carbon\Carbon::createFromTimeStamp(strtotime($session->created_at))
                                    ->diffForHumans()}}</p>
            </div>
        </div>
</div>

<div class="botton">
   
    
        <div class="content" style="background-color: #ebebe0">
            {{-- hiện thị nội dung câu hỏi --}}

            <form method="post" action="{{$session->id}}">
                <div class="form-group" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <h4>Nhập nội dung câu hỏi</h4>    
                    <textarea type="text" name="question" rows="3"
                    class="form-control" placeholder="..." ></textarea>
                </div>
                <input type="submit" name="submit" value="Thêm câu hỏi trong phiên" class="btn btn-primary"  style="background-color: #e63900"/>
            </form>

      
    </div>


@endsection