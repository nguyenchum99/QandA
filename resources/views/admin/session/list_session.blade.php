

@extends('admin.layouts.index')
@section('content')
    

    @if(session('thongbao'))

        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>

    @endif
    
    <table class="table table-striped">
        <h2>Danh sách phiên hỏi đáp</h2>
        <tr id="tbl-first-row">
            <td width="12%">ID phiên</td>
            <td width="12%">ID người dùng</td>
            <td width="68%">Tên phiên</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>

        {{-- lấy dữ liệu từ database hiện thị lên view --}}
        @foreach ($list_session as $l)
            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->name_session}}</td>
                <td><a href="#">Sửa</a></td>
                <td><a href="{{url("admin/session/delete_session/{$l->id}")}}">Xóa</a></td>
            </tr>
        @endforeach
        
    </table>
    
    <div aria-label="Page navigation">
        {{$list_session->links()}}
    </div>


@endsection