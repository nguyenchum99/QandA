
@extends('admin.layouts.index')

@section('content')

        <h3>Danh sách câu hỏi khảo sát</h3>
        <div style ="width: 40%">
            <h3>Tạo khảo sát </h3>
            @if(session('thongbao'))

            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>

            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                
                    @foreach ($errors -> all() as $err)
                        {{$err}}<br>
                    @endforeach
                
                </div>
            @endif

            <form method="post" action="{{url("admin/question/add_ques_choice")}}">
                <h4>Tạo câu hỏi chọn/đáp án</h4>
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
                    <textarea type="text" rows="2" name="question" class="form-control" placeholder="Nội dung câu hỏi" ></textarea>
                    <br><input type="text" name="choice1" class="form-control" placeholder="Đáp án 1">
                    <br><input type="text" name="choice2" class="form-control" placeholder="Đáp án 2">
                    <br><input type="text" name="choice3" class="form-control" placeholder="Đáp án 3">
                    <br><input type="text" name="choice4" class="form-control" placeholder="Đáp án 4">
                </div>
                <input type="submit" name="submit" value="Tạo" class="btn btn-primary" style="background-color: #737373"/>
            </form>

        </div>

    <button type="submit"  class="btn btn-primary" style="background-color: #737373;margin-top: 10px">
        <a href="{{url("admin/question/layout_opinion")}}" style="color: #ffffff;text-decoration: none;">Tạo phiếu lấy ý kiến phản hồi</a></button>
    <div style="width: 90%;margin-top: 20px;">
        <table border="2" class="table table-striped" style="width: 90%">
       
            <tr id="tbl-first-row" style="font-weight: bold;">
                <td width="10%">ID câu hỏi</td>
                <td width="10%">ID người dùng</td>
                <td width="30%">Câu hỏi</td>
                <td width="20%">Lựa chọn</td>
            </tr> 
    
            @foreach ($choices as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->user_id}}</td>
                    <td>{{$c->question}}</td>
                    <td>{{$c->choice}}</td>
                   
                </tr>
            @endforeach
            
        </table>
        
        </div>

@endsection

