

@extends('admin.layouts.index')
@section('content')
    

    @if(session('thongbao'))

        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>

    @endif
    
    <table class="table table-striped">
        <h2>Danh sách câu hỏi</h2>
        <tr id="tbl-first-row">
            <td width="5%">id</td>
            <td width="10%">user_id</td>
            <td width="70%">Câu hỏi</td>
            <td width="5%">Level</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>

        {{-- lấy dữ liệu từ database hiện thị lên view --}}
<<<<<<< HEAD
        {{-- @foreach ($list as $l)
=======
        @foreach ($list_question as $l)
>>>>>>> b132c4b2432ecf2d75ceef5e460f2880f049c105
            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->question}}</td>
                <td>{{$l->level}}</td>
                <td><a href="{{url("admin/question/edit/{$l->id}")}}">Sửa</a></td>
                <td><a href="{{url("admin/question/delete/{$l->id}")}}">Xóa</a></td>
            </tr>
        @endforeach --}}
        @foreach ($list_question as $l)
        <tr>
            <td>{{$l->id}}</td>
            <td>{{$l->user_id}}</td>
            <td>{{$l->question}}</td>
            <td>{{$l->level}}</td>
            <td><a href="{{url("admin/question/edit/{$l->id}")}}">Sửa</a></td>
            <td><a href="{{url("admin/question/delete/{$l->id}")}}">Xóa</a></td>
        </tr>
    @endforeach
        
    </table>
    
    <div aria-label="Page navigation">
        {{$list_question->links()}}
    </div>


@endsection