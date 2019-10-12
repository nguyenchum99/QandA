

@extends('admin.layouts.index')
@section('content')
    

    @if(session('thongbao'))

        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>

    @endif
    
    <table class="table table-striped">
        <h2>Danh sách câu trả lời</h2>
        <tr id="tbl-first-row">
            <td width="5%">id</td>
            <td width="10%">user_id</td>
            <td width="5%">question_id</td>
            <td width="60%">Bình luận</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>

        {{-- lấy dữ liệu từ database truyền vào view --}}
<<<<<<< HEAD
         {{-- @foreach ($list as $l)
=======
         @foreach ($list_answer as $l)
>>>>>>> b132c4b2432ecf2d75ceef5e460f2880f049c105
            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->question_id}}</td>
                <td>{{$l->answer}}</td>
                <td><a href="{{url("admin/answer/edit/{$l->id}")}}">Sửa</a></td>
                <td><a href="{{url("admin/answer/delete/{$l->id}")}}">Xóa</a></td>
            </tr>
        @endforeach --}}
        @foreach ($list_answer as $l)
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
    
    <div aria-label="Page navigation">
<<<<<<< HEAD
        {{$list_answer->links()}}
     </div>
    
=======
       {{$list_answer->links()}}
    </div>

>>>>>>> b132c4b2432ecf2d75ceef5e460f2880f049c105
@endsection