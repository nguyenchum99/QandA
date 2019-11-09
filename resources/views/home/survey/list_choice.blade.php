@extends('home.layouts.index_page')
@section('content')

<div class="top">
        <div class="row"> 
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <h3>Câu hỏi khảo sát</h3>
            </div>
        </div>
</div>
@if(session('thongbao'))
                        
<div class="alert alert-success">
    {{session('thongbao')}}
</div>

 @endif
    
    {{-- hiển thị câu hỏi lựa chọn --}}
    <div class="botton">
            <div class="main-right">
                <div class="content" style="background-color: #ffffff">
                    {{-- hiện thị nội dung câu hỏi --}}
                        <div class="form-group" >
                            <p>Câu hỏi: {{$question->question}}</p>
                            {{-- <p>Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                ->diffForHumans()}}</p> --}}
                        </div>
                        @foreach($choice as $c)
                        <form action="{{url("user/survey/choice/{$c->id}")}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/> 
                                <div class="form-group" style="margin-left:35px">
                                    <label class="radio-inline">
                                        <input name="answer" value="{{$c->id}}" checked="" type="radio"> {{$c->choice}}
                                    </label>
                                </div>
                            @endforeach
                            <input type="submit"  value="Trả lời"  style="background-color: #737373"/>
                        </form>   
                </div>
            </div>
    </div>


@endsection