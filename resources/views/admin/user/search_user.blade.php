@extends('admin.layouts.index')
@section('content')
    
    <table class="table table-striped">
        <h4>Tìm kiếm : {{$tukhoa}}</h4>
        <!-- <tr id="tbl-first-row">
            <td width="5%">id</td>
            <td width="30%" style="white-space: nowrap ;">Tên đăng nhập</td>
            <td width="30%">E-mail</td>
            <td width="20%">Mật khẩu</td>
            <td width="5%">Level</td>
        </tr>
 -->
        
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
        <ul class="pagination">
            <li>
                <a aria-label="Previous" href="#">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>

@endsection
