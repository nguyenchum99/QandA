

@extends('admin.layouts.index')
@section('content')


    <h3>Danh sách câu hỏi khảo sát có/không</h3>
    <div style ="width: 50%">
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

    <form method="post" action="{{url("admin/question/add_ques_yesno")}}">
        <h4>Tạo câu hỏi có/không</h4>
        <div class="form-group">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
            <textarea type="text" rows="2" name="question" class="form-control" placeholder="Nội dung câu hỏi" ></textarea>
        </div>
        <input type="submit" name="submit" value="Tạo câu hỏi có/không" class="btn btn-primary" />
    </form>

    </div>

    <div style="width: 90%;margin-top: 20px;">
    <table border="2" class="table table-striped" >
       
        <tr id="tbl-first-row" style="font-weight: bold;">
            <td width="10%">ID câu hỏi</td>
            <td width="10%">ID người dùng</td>
            <td width="45%">Câu hỏi</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>

        {{-- lấy dữ liệu từ database hiện thị lên view --}}
        @foreach ($ques_yesno as $l)
            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->question}}</td>
                <td><a href="{{url("admin/question/edit/{$l->id}")}}">Sửa</a></td>
                <td><a onclick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không?')"
                     href="{{url("admin/question/delete/{$l->id}")}}">Xóa</a></td>
            </tr>
        @endforeach
        
    </table>
        <div aria-label="Page navigation">
            {{$ques_yesno->links()}}
        </div>
    </div>
    {{-- <h3>Danh sách câu hỏi khảo sát lựa chọn đáp án</h3>
    <table border="2" class="table table-striped" style="width: 90%">
       
        <tr id="tbl-first-row" style="font-weight: bold;">
            <td width="10%">ID câu hỏi</td>
            <td width="10%">ID người dùng</td>
            <td width="30%">Câu hỏi</td>
            <td width="20%">Lựa chọn</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr> --}}

        {{-- lấy dữ liệu từ database hiện thị lên view --}}
        {{-- @foreach ($choices as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->question}}</td>
                <td>{{$c->choice}}</td>
               
            </tr>
        @endforeach --}}
        
    {{-- </table>
    
        <div aria-label="Page navigation">
            {{$choices->links()}}
        </div>
 --}}

@endsection