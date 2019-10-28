

@extends('admin.layouts.index')
@section('content')
    

    @if(session('thongbao'))

        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>

    @endif
    <h2>Danh sách câu hỏi</h2>

    <form method = "get" action= "{{route('search_question')}}" id="searchForm" role="search">
            <input type="hidden" name="_token" value ="{{csrf_token()}}";>
            <div class="input-group" style="margin: 10px 0 29px 0; width: 40%"> 
                <input  type="text" class="form-control"  name="tukhoa" placeholder="Tìm kiếm..." >
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                
            </div>
    </form>
    
    <table border="2" class="table table-striped">
       
        <tr id="tbl-first-row" style="font-weight: bold;">
            <td width="10%">ID câu hỏi</td>
            <td width="13%">ID người dùng</td>
            <td width="12%">ID phiên</td>
            <td width="45%">Câu hỏi</td>
            <td width="15%">Tạo câu trả lời</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>

        {{-- lấy dữ liệu từ database hiện thị lên view --}}
        @foreach ($list_question as $l)
            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->session_id}}</td>
                <td>{{$l->question}}</td>
                <td><a href="{{url("admin/question/add_answer/{$l->id}")}}">Tạo</a></td>
                <td><a href="{{url("admin/question/edit/{$l->id}")}}">Sửa</a></td>
                <td><a onclick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không?')" href="{{url("admin/question/delete/{$l->id}")}}">Xóa</a></td>
            </tr>
        @endforeach
        
    </table>
    
    <div aria-label="Page navigation">
        {{$list_question->links()}}
    </div>


@endsection