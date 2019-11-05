

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
        <h3>Danh sách người dùng</h3>
        <form method = "get" action= "{{route('search_user')}}" id="searchForm" role="search">
                <input type="hidden" name="_token" value ="{{csrf_token()}}";>
                <div class="input-group" style="margin: 10px 0 29px 0; width: 30%"> 
                    <input  type="text" class="form-control"  name="tukhoa" placeholder="Tìm kiếm..." >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    
                </div>
        </form>

    <table border="2" class="table table-striped" style="width: 90%">
        
        <tr id="tbl-first-row" style="font-weight: bold;">

            <td width="5%">ID</td>
            <td width="20%" style="white-space: nowrap ;">Tên đăng nhập</td>
            <td width="20%">E-mail</td>
            {{-- <td width="10%">Mật khẩu</td> --}}
            <td width="5%">Quyền</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>

        </tr>
        
        @foreach($list_user as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                {{-- <td style="text-overflow: ellipsis">{{$u->password}}</td> --}}
                <td>
                        @if($u->level == 1)
                            {{"Admin"}}
                        @else
                            {{"User"}}
                        @endif
                </td>
                <td><a href="{{url("admin/user/edit/{$u->id}")}}">Sửa</a></td>
                <td><a onclick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không?')" href="{{url("admin/user/delete/{$u->id}")}}">Xóa</a></td>
            </tr>
       @endforeach
       
    </table>
    
    <div aria-label="Page navigation">
        {{$list_user->links()}}
    </div>

@endsection