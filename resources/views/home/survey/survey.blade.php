@extends('home.layouts.index_page')
@section('content')

<div class="top" >
        <div class="form-group" style="margin-left: 20px;color: #e63900"> 
            
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
    <div class="botton">
            <div class="main-right">
                <div class="content" style="background-color: #ffffff;border-radius: 10px">
                    {{-- hiện thị nội dung câu hỏi --}}
                        <div class="form-group" >
                            <p class="title" style="color: #e63900;">Câu hỏi có/không: {{$l->question}} ?</p>
                            <p style="color: #e63900">Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                ->diffForHumans()}}</p>
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
                                    style="background-color: #e63900; margin-left:10px;" class="btn btn-primary"/>
                                </div>
                        </form>
                </div>
            </div>
    </div>
    @endforeach


    @foreach($ques_choice as $l)
    <div class="botton" ><a href="{{url("user/survey/list_choice/{$l->id}")}}"  style="text-decoration: none;">
            <div class="main-right">
                <div class="content" style="background-color: #ffffff;border-radius: 10px">
                    {{-- hiện thị nội dung câu hỏi --}}
                        <div class="form-group" >
                            <p  class="title" style="color:red;">Câu hỏi lựa chọn: {{$l->question}} ?</p>
                        </div>
                </div>
            </div>
        </a>
    </div>
 @endforeach

@endsection