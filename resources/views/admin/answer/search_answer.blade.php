

@extends('admin.layouts.index')
@section('content')
    
    <table class="table table-striped">
        <h4>Tìm kiếm : {{$tukhoa}}</h4>
        <tr id="tbl-first-row">
                <td width="12%">ID câu trả lời</td>
                <td width="12%">ID người dùng</td>
                <td width="12%">ID câu hỏi</td>
                <td width="60%">Bình luận</td>
                <td width="5%">Sửa</td>
                <td width="5%">Xóa</td>
            </tr>

        {{-- lấy dữ liệu từ database hiện thị lên view --}}
        @foreach ($answer as $l)
            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->question_id}}</td>
                <td>{{$l->answer}}</td>
                <td><a href="{{url("admin/answer/edit/{$l->id}")}}">Sửa</a></td>
                <td><a href="{{url("admin/answer/delete/{$l->id}")}}">Xóa</a></td>
            </tr>
        @endforeach
        
    </table>
    

@endsection