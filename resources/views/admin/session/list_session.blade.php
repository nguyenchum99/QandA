

@extends('admin.layouts.index')
@section('content')
    

    @if(session('thongbao'))

        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>

    @endif
    <h2>Danh sách phiên hỏi đáp</h2>
    <form method = "get" action= "{{route('search_session')}}" id="searchForm" role="search">
            <input type="hidden" name="_token" value ="{{csrf_token()}}";>
            <div class="input-group" style="margin: 10px 0 29px 0; width: 40%"> 
                <input  type="text" class="form-control"  name="tukhoa" placeholder="Tìm kiếm..." >
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                
            </div>
    </form>
    <table border="2" class="table table-striped">
      
        <tr id="tbl-first-row" style="font-weight: bold;">
            <td width="8%">ID phiên</td>
            <td width="13%">ID người dùng</td>
            <td width="50%">Tên phiên</td>
            <td width="10%">Tạo câu hỏi</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>

        {{-- lấy dữ liệu từ database hiện thị lên view --}}
        @foreach ($list_session as $l)
            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->name_session}}</td>
                <td><a href="{{url("admin/session/add_question/{$l->id}")}}">Tạo</a></td>
                <td><a href="{{url("admin/session/edit/{$l->id}")}}">Sửa</a></td>
                <td><a href="{{url("admin/session/delete_session/{$l->id}")}}">Xóa</a></td>
            </tr>
        @endforeach
        
    </table>
    
    <div aria-label="Page navigation">
        {{$list_session->links()}}
    </div>


@endsection