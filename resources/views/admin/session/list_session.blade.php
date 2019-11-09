

@extends('admin.layouts.index')
@section('content')
    

<div style="width: 90%">
    <h2>Danh sách phiên hỏi đáp</h2>
    @if(session('thongbao'))

        <div class="alert alert-success" style="width:50%">
            {{session('thongbao')}}
        </div>

    @endif
    <form method = "get" action= "{{route('search_session')}}" id="searchForm" role="search">
            <input type="hidden" name="_token" value ="{{csrf_token()}}";>
            <div class="input-group" style="margin: 10px 0 29px 0; width: 40%"> 
                <input  type="text" class="form-control"  name="tukhoa" placeholder="Tìm kiếm..." >
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                
            </div>
    </form>
    <table border="2"  class="table table-striped">
    
        <tr id="tbl-first-row" style="font-weight: bold;">
           
            <td width="30%">Tên phiên</td>
            <td width="10%">Mật khẩu phiên</td>
            <td width="7%">Tạo câu hỏi</td>
            <td width="17%">Hoạt động</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>
    

        {{-- lấy dữ liệu từ database hiện thị lên view --}}
        @foreach ($list_session as $l)
            <tr>
                <td>{{$l->name_session}}</td>
                <td>{{$l->password_session}}
                <td><a href="{{url("admin/session/add_question/{$l->id}")}}">Tạo</a></td>
                <td> 

                    <form action="{{url("admin/session/open_close/{$l->id}")}}" method="post">          
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <select style="padding:3px;    background-color: #ededed;
                        "id ="select" name="option" value="{{$l->active}}" >
                            <option {{old('option',$l->active)=="1"? 'selected':''}} value="1"                             
                                >Mở</option>
                            <option {{old('option',$l->active)=="0"? 'selected':''}} value="0"       
                                >Đóng</option>
                        </select>
                        <input type="submit" name="submit" value="Thay đổi" 
                        onclick="return xacnhanxoa('Bạn có chắc muốn thay đổi trạng thái phiên hay không?')" >
                    </form>

                </td>
                <td><a href="{{url("admin/session/edit/{$l->id}")}}">Sửa</a></td>
                <td><a onclick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không?')" 
                    href="{{url("admin/session/delete_session/{$l->id}")}}">Xóa</a></td>
            </tr>
        @endforeach
        
    </table>
    
    <div aria-label="Page navigation">
        {{$list_session->links()}}
    </div>

</div>

    
@endsection