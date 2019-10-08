

@extends('admin.layouts.index')
@section('content')
    
        {{-- thông báo lỗi --}}
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            
                @foreach ($errors -> all() as $err)
                    {{$err}}<br>
                @endforeach
            
        </div>
        @endif

        {{-- hiện thị sửa thành công --}}
        @if(session('thongbao'))

        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
        @endif

    <table class="table table-striped">
        <h2>Danh sách người dùng</h2>
        <tr id="tbl-first-row">
            <td width="5%">id</td>
            <td width="30%" style="white-space: nowrap ;">Tên đăng nhập</td>
            <td width="30%">E-mail</td>
            <td width="20%">Mật khẩu</td>
            <td width="5%">Level</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>

        
        @foreach($user as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->password}}</td>
                <td>
                        @if($u->level == 1)
                            {{"Admin"}}
                        @else
                            {{"User"}}
                        @endif
                </td>
                <td><a href="{{url("admin/user/edit/{$u->id}")}}">Sửa</a></td>
                <td><a href="{{url("admin/user/delete/{$u->id}")}}">Xóa</a></td>
            </tr>
       @endforeach
       
    </table>
    
    <div aria-label="Page navigation">
        {{$user->links()}}
    </div>

@endsection