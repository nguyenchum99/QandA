@extends('admin.layouts.index')
@section('content')
    
    <table border="2" class="table table-striped">
        <h4>Tìm kiếm: {{$tukhoa}}</h4>
        <tr id="tbl-first-row" style="font-weight: bold;">
            <td width="5%">Id</td>
            <td width="30%" style="white-space: nowrap ;">Tên đăng nhập</td>
            <td width="30%">E-mail</td>
            <td width="20%">Mật khẩu</td>
            <td width="20%">Avatar</td>
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
                <td>{{$u->avatar}}</td>
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
    
   
@endsection
