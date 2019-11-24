@extends('home.layouts.index_page')
@section('content')

<div class="top" >
        <div class="form-group" style="color: #000000"> 
            
                <h3><b>Khảo sát </b></h3>
                @if(session('thongbao'))
                        
                <div class="alert alert-success" style="width: 60%">
                    {{session('thongbao')}}
                </div>
            
             @endif
        </div>

</div>
  {{-- hiển thị danh sách câu hỏi có không --}}
    @foreach($list_question as $l)
        <div class="content" style="background-color: #ffffff;border-radius: 10px;margin-top:15px">
            {{-- hiện thị nội dung câu hỏi --}}
            <div class="form-group" >
                <p class="title">Câu hỏi có/không:</p>
                <p class="title" style="color: #e63900;"> {{$l->question}} ?</p>
            </div>
            <form action="{{url("user/survey/yes_no/{$l->id}")}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/> 
                    <div class="form-group" style="margin-left:37px">
                        <label class="radio-inline">
                            <input name="answer" value="0" checked="" type="radio"> Không
                        </label>
                        <label class="radio-inline">
                            <input name="answer" value="1" type="radio"> Có
                        </label>
                            <input type="submit"  value="Trả lời"  
                            style="background-color:#a6a6a6; color:#000000;margin-left: 10px" class="btn btn-primary"/>
                    </div>
            </form>
    
        </div>
    @endforeach


    @foreach($ques_choice as $l)
        <div class="content" style="background-color: #ffffff;border-radius: 10px;margin-top:15px">
            <a href="{{url("user/survey/list_choice/{$l->id}")}}"  style="text-decoration: none;">
                {{-- hiện thị nội dung câu hỏi --}}
                <div class="form-group" >
                    <p class="title">Câu hỏi lựa chọn: <p>
                    <p  class="title" style="color:red;">{{$l->question}} ?</p>
                </div>
            </a>
        </div>

 @endforeach



 @foreach($question as $l)
        <div class="content" style="background-color: #ffffff;border-radius: 10px;margin-top:15px">
            <div class="form-group" >
                <p class="title" style="color: #e63900;">Câu hỏi trả lời: {{$l->question}} ?</p>
            </div>
            <form action="{{url("user/survey/answer/{$l->id}")}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/> 
                    <div class="form-group" style="margin-left:37px;">
                        <textarea type="text" name="answer" rows="2"  style="width: 90%" class="form-control"
                         placeholder="Nội dung ..." ></textarea>
                         <br><input type="submit"  value="Trả lời" 
                        style="background-color:#a6a6a6; color:#000000;" class="btn btn-primary"/>
                    </div>
            </form>
        </div>

 @endforeach
        


 @foreach($opinion as $o)
    
    <div class="content" style="background-color: #ffffff;border-radius: 10px;margin-top:15px">
        <a href="{{url("user/survey/list_opinion/{$o->id}")}}"  style="text-decoration: none;"> 
            {{-- hiện thị nội dung câu hỏi --}}
        <div class="form-group" >
            <p class="title">Phiếu lấy ý kiến phản hồi:</p>
            <p  class="title" style="color:red;">{{$o->question}}</p>
        </div>
        </a>
    </div>
 @endforeach

@endsection