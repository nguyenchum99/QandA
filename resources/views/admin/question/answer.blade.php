

@extends('admin.layouts.index')
@section('content')
    
<div style="width: 90%">
    <h2>Danh sách câu trả lời</h2>
    <h4>Câu hỏi: {{$question->question}} ?</h4>
    <table border="2" class="table table-striped" >
       
        <tr id="tbl-first-row" style="font-weight: bold;">
            <td width="10%">ID câu hỏi</td>
            <td width="10%">ID người dùng</td>
            <td width="45%">Câu trả lời</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>

        {{-- lấy dữ liệu từ database hiện thị lên view --}}
        @foreach ($list as $l)
            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->answer}}</td>
                <td><a href="">Sửa</a></td>
                <td><a onclick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không?')"
                     href="">Xóa</a></td>
            </tr>
        @endforeach
        
    </table>

</div>
@endsection