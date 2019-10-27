

@extends('admin.layouts.index')
@section('content')
    
    <table border="2" class="table table-striped">
        <h4>Tìm kiếm : {{$tukhoa}}</h4>
        <tr id="tbl-first-row" style="font-weight: bold;">
                <td width="12%">ID câu hỏi</td>
                <td width="13%">ID người dùng</td>
                <td width="12%">ID phiên</td>
                <td width="60%">Câu hỏi</td>
                <td width="5%">Sửa</td>
                <td width="5%">Xóa</td>
        </tr>

        {{-- lấy dữ liệu từ database hiện thị lên view --}}
        @foreach ($question as $l)
            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->session_id}}</td>
                <td>{{$l->question}}</td>
               
                <td><a href="{{url("admin/question/edit/{$l->id}")}}">Sửa</a></td>
                <td><a onclick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không?')" href="{{url("admin/question/delete/{$l->id}")}}">Xóa</a></td>
            </tr>
        @endforeach
        
    </table>
    

@endsection