

@extends('admin.layouts.index')
@section('content')



    <div class="container">
        <h3>Danh sách câu hỏi khảo sát có/không</h3>
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

    <div class="row">

        <div class="left col-sm-3">
            <form method="post" action="{{url("admin/question/add_ques_yesno")}}">
                <label>Tạo câu hỏi có/không</label>
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
                    <textarea type="text" rows="2" name="question" class="form-control" placeholder="Nội dung câu hỏi" ></textarea>
                </div>
                <input type="submit" name="submit" value="Tạo câu hỏi có/không" class="btn btn-primary" style="background-color: #737373"/>
            </form>
        </div>

        <div class="col-sm-3 right" style ="margin-top: 27px">
            <form method="post" action="{{url("admin/question/add_ques")}}">
                <label>Tạo câu hỏi-đáp</label>
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
                    <textarea type="text" rows="2" name="question" class="form-control" placeholder="Nội dung câu hỏi" ></textarea>
                </div>
                <input type="submit" name="submit" value="Tạo câu hỏi" class="btn btn-primary" style="background-color: #737373"/>
            </form>
        </div>

    </div>

    </div>


    <div style="width: 90%;margin-top: 20px;">
        <h4>Danh sách câu hỏi có/không</h4>
        <table border="2" class="table table-striped" >
            <tr id="tbl-first-row" style="font-weight: bold;">
                <td width="10%">ID câu hỏi</td>
                <td width="10%">ID người dùng</td>
                <td width="40%">Câu hỏi</td>
                <td width="5%">Sửa</td>
                <td width="5%">Xóa</td>
            </tr>

            {{-- lấy dữ liệu từ database hiện thị lên view --}}
            @foreach ($ques_yesno as $l)
                <tr>
                    <td>{{$l->id}}</td>
                    <td>{{$l->user_id}}</td>
                    <td><a href="{{url("admin/question/chart/{$l->id}")}}">{{$l->question}}</a></td>
                    <td><a href="{{url("admin/question/edit_yesno/{$l->id}")}}">Sửa</a></td>
                    <td><a onclick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không?')"
                        href="{{url("admin/question/delete_yesno/{$l->id}")}}">Xóa</a></td>
                
                </tr>
            @endforeach
            
        </table>
        <div aria-label="Page navigation">
            {{$ques_yesno->links()}}
        </div>
    </div>

    <div style="width: 90%;margin-top: 20px;">
        <h4>Danh sách câu hỏi-đáp</h4>
        <table border="2" class="table table-striped" >
            <tr id="tbl-first-row" style="font-weight: bold;">
                <td width="10%">ID câu hỏi</td>
                <td width="10%">ID người dùng</td>
                <td width="40%">Câu hỏi</td>
                <td width="5%">Sửa</td>
                <td width="5%">Xóa</td>
            </tr>

            {{-- lấy dữ liệu từ database hiện thị lên view --}}
            @foreach ($question as $l)
                <tr>
                    <td>{{$l->id}}</td>
                    <td>{{$l->user_id}}</td>
                    <td><a href="{{url("admin/question/ques_answ/{$l->id}")}}">{{$l->question}}</a></td>
                    <td><a href="">Sửa</a></td>
                    <td><a onclick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không?')"
                        href="{{url("admin/question/delete_ques/{$l->id}")}}">Xóa</a></td>
                
                </tr>
            @endforeach
            
        </table>
        
    </div>
 

@endsection