@extends('home.layouts.index_page')
@section('content')

<div class="top" >
        <div class="form-group" style="margin-left: 20px;color: #e63900"> 
            
                <h3 ><b>Phiếu lấy ý kiến phản hồi</b></h3>
                <h5> Đề nghị cho biết ý kiến đánh giá của bạn bằng cách Tích chọn vào 
                     giá trị tương ứng (1..5)
                     về từng vấn đề trong quá trình tham gia khảo sát này.
                     Thang đánh giá: 1 = Hoàn toàn không đồng ý, 2 = 
                     Cơ bản không đồng ý, 3 = Phân vân, 4 = Cơ bản đồng ý, 5 = Hoàn toàn đồng ý.<h5>
                @if(session('thongbao'))
                        
                <div class="alert alert-success" style="width: 60%">
                    {{session('thongbao')}}
                </div>
            
             @endif
        </div>

</div>

    
    {{-- hiển thị câu hỏi lựa chọn --}}
    <div class="botton" >
            <div class="main-right" >
                <div class="content" style="background-color: #ffffff;border-radius: 10px">
                    {{-- hiện thị nội dung câu hỏi --}}
                        <div class="form-group" >
                            <p class="title" style="color:red;">{{$question->question}}</p>
                        </div>
                    
                       

                        
                            <form action="{{url("user/survey/opinion/{$question->id}")}}" method="post">
                               
                                @foreach($list as $list )
                                <div  class="form-group">
                                <p>{{$list->choice}}</p>
                                <input type="hidden" name="_token" value="{{csrf_token()}}"     /> 
                               
                                    <div class="form-group" style="margin-left:35px"> 
                                            <label class="radio-inline">
                                                <input name="answer[{{$list->id}}]" value="1" type="radio" checked=""> 1
                                            </label>
                                            <label class="radio-inline">
                                                <input name="answer[{{$list->id}}]" value="2" type="radio"  > 2
                                            </label>
                                            <label class="radio-inline">
                                                <input name="answer[{{$list->id}}]" value="3"  type="radio"  > 3
                                            </label>
                                            <label class="radio-inline">
                                                <input name="answer[{{$list->id}}]" value="4" type="radio" > 4
                                            </label>
                                            <label class="radio-inline">
                                                <input name="answer[{{$list->id}}]" value="5"  type="radio"  > 5
                                            </label>
                                    </div>
                                @endforeach                                           
                            </div>
                            <input type="submit"  value="Trả lời"   
                            style="background-color:  #e63900; margin-left:35px;" class="btn btn-primary"/>
                        </form> 
                    </div>  
                    
                  
                </div>
            </div>
    


@endsection