
@extends('home.layouts.index_page')
@section('content')


<div class="main-right" >
    <h3 style="color:#e63900"><b>Phiên hỏi đáp của tôi</b></h3>
    @if(session('thongbao'))

    <div class="alert alert-success">
        {{session('thongbao')}}
    </div>

@endif
       
    @foreach($list as $l)

        <div class="box" >

             {{-- hiện thị thành công --}}
                <div class="row">  
                    <div class="left col-sm-2" ><center>
                        <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                         style="height: 75px;width:75px;border-radius:50%;margin-top: 10px" >
                         </center>
                    </div>
                    <div class="col-sm-7 right" style="background-color: #ffffff"><a href="{{url("user/session/list_question_active/{$l->id}")}}" style="text-decoration: none;">
                        <p class="title" style="color: red">Phiên hỏi đáp: {{$l ->name_session}}</p>
                            {{-- <form action="{{url("user/manage/open_close/{$l->id}")}}" method="post">          
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <select id ="select" name="option" value="{{$l->active}}"  class="btn btn-primary" style="background-color: #ffffff;color:#000000">
                                    <option {{old('option',$l->active)=="1"? 'selected':''}} value="1">Mở</option>
                                    <option {{old('option',$l->active)=="0"? 'selected':''}} value="0" >Đóng</option>
                                </select>
                                <input type="submit" name="submit" value="Thay đổi" style="background-color: #e63900"  class="btn btn-primary"
                                onclick="return xacnhanxoa('Bạn có chắc muốn thay đổi trạng thái phiên hay không?')">
                            </form> --}}
                        <div style="margin-top:10px;color:#e63900">
                            <a href="{{url("user/manage/edit/{$l->id}")}}">Sửa phiên</a>
                            <a href="{{url("user/manage/delete/{$l->id}")}}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa trạng thái phiên hay không?')"
                                style="margin-left: 10px;">Xóa phiên</a>
                            <a href="{{url("user/manage/create_question/{$l->id}")}}" style="margin-left: 10px;">Tạo câu hỏi</a>
                        </div>
                    </a>
                    </div>
                </div>
        </div>
    @endforeach

</div>

@endsection