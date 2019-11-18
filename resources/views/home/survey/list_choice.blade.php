@extends('home.layouts.index_page')
@section('content')

<div class="top" >
        <div class="form-group" style="color:#000000"> 
            
                <h3 ><b>Câu hỏi khảo sát</b></h3>
                @if(session('thongbao'))
                        
                <div class="alert alert-success" style="width: 60%">
                    {{session('thongbao')}}
                </div>
            
             @endif
        </div>

</div>

    
    {{-- hiển thị câu hỏi lựa chọn --}}
         
    <div class="content" style="background-color: #ffffff;border-radius: 10px">
        {{-- hiện thị nội dung câu hỏi --}}
        <div class="form-group" >
            <p class="title" style="color:red;">Câu hỏi: {{$question->question}}</p>
                
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
            <input type="submit"  value="Trả lời" 
            style="background-color:#a6a6a6; color:#000000;margin-left: 35px" class="btn btn-primary"/>
            </form>   
    </div>


@endsection