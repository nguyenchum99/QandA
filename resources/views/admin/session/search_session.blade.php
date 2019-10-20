

@extends('admin.layouts.index')
@section('content')
    
    <table class="table table-striped">
        <h4>Tìm kiếm : {{$tukhoa}}</h4>
        <tr id="tbl-first-row">
                <td width="12%">ID phiên</td>
                <td width="12%">ID người dùng</td>
                <td width="68%">Tên phiên</td>
                <td width="5%">Sửa</td>
                <td width="5%">Xóa</td>
            </tr>

        {{-- lấy dữ liệu từ database hiện thị lên view --}}
        @foreach ($session as $l)
            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->name_session}}</td>
                <td><a href="#">Sửa</a></td>
                <td><a href="{{url("admin/session/delete_session/{$l->id}")}}">Xóa</a></td>
            </tr>
        @endforeach
        
    </table>
    

@endsection