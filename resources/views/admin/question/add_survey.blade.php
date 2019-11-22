
@extends('admin.layouts.index')

@section('content')

        
        <div  class="container">
            <h3>Danh sách câu hỏi khảo sát</h3>
            <h3>Tạo khảo sát </h3>
            @if(session('thongbao'))

            <div class="alert alert-success" style="width: 50%">
                {{session('thongbao')}}
            </div>

        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger" style="width: 50%">
                    
                @foreach ($errors -> all() as $err)
                    {{$err}}<br>
                @endforeach
                    
            </div>
        @endif


            <form method="post" action="{{url("admin/question/add_ques_choice")}}">
                <h4>Tạo câu hỏi chọn/đáp án</h4>
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
                    <textarea type="text" rows="2" cols="50" name="question"  
                  placeholder="Nội dung câu hỏi" ></textarea>
                    <div class="row">
                        <div class="left col-sm-3" >
                            <input type="text" name="choice1" placeholder="Đáp án 1" class="form-control" >
                            <br><input type="text" name="choice2"  placeholder="Đáp án 2" class="form-control" >
                        </div>
                        <div class="col-sm-3 right" style="margin-top: 26px;">
                            <input type="text" name="choice3" placeholder="Đáp án 3" class="form-control" >
                            <br><input type="text" name="choice4"  placeholder="Đáp án 4" class="form-control" >
                        </div>
                    </div>
                </div>
                <br><input type="submit" name="submit" value="Tạo" class="btn btn-primary" style="background-color: #737373"/>
            </form>


    <br><button type="submit"  class="btn btn-primary" style="background-color: #737373;margin-top: 10px">
        <a href="{{url("admin/question/layout_opinion")}}" style="color: #ffffff;text-decoration: none;">Tạo phiếu lấy ý kiến phản hồi</a></button>
    <div style="width: 90%;margin-top: 20px;">
        <table border="2" class="table table-striped" style="width: 90%">
       
            <tr id="tbl-first-row" style="font-weight: bold;">
                <td width="10%">ID câu hỏi</td>
                <td width="10%">ID người dùng</td>
                <td width="30%">Câu hỏi</td>
               
            </tr> 
    
            @foreach ($choices as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->user_id}}</td>
                    <td><a href="{{url("admin/question/chart_choice/{$c->id}")}}">{{$c->question}}</a></td> 
    
                </tr>
            @endforeach
            
        </table>
        
        </div>
    </div>
@endsection

