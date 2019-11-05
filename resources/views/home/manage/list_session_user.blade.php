
@extends('home.layouts.index_page')
@section('content')


<div class="main-right">
    <h2>Phiên hỏi đáp của tôi</h2>
    @if(session('thongbao'))

    <div class="alert alert-success">
        {{session('thongbao')}}
    </div>

@endif
       
    @foreach($list as $l)

        <div class="box" >

             {{-- hiện thị thành công --}}
                <div class="row">  
                    <div class="col-md-2">
                        <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                         style="height: 75px;width:75px;margin-top:10px" >
                    </div>
                    <div class="col-md-10 box-right">
                        <p class="title" style="color: red">Phiên hỏi đáp: {{$l ->name_session}}</p>
                        <p>Trạng thái phiên hoạt động: 
                            <form action="{{url("user/manage/open_close/{$l->id}")}}" method="post">          
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <select id ="select" name="option" value="{{$l->active}}" >
                                    <option {{old('option',$l->active)=="1"? 'selected':''}} value="1">Mở</option>
                                    <option {{old('option',$l->active)=="0"? 'selected':''}} value="0" >Đóng</option>
                                </select>
                                <input type="submit" name="submit" value="Thay đổi" 
                                onclick="return xacnhanxoa('Bạn có chắc muốn thay đổi trạng thái phiên hay không?')">
                            </form>
                        </p>
                        <p><a href="{{url("user/manage/edit/{$l->id}")}}" >Sửa phiên</a></p>
                        <p><a href="{{url("user/manage/delete/{$l->id}")}}" >Xóa phiên</a></p>
                        <p><a href="{{url("user/manage/create_question/{$l->id}")}}" >Tạo câu hỏi</a></p>
                    </div>
                </div>
        </div>
    @endforeach

</div>

@endsection