
@extends('home.layouts.index_page')
@section('content')


<div class="main-right" >
    <h3 style="color:#000000"><b>Phiên hỏi đáp của tôi</b></h3>
    @if(session('thongbao'))

    <div class="alert alert-success">
        {{session('thongbao')}}
    </div>

@endif
       
    @foreach($list as $l)

        <div class="content" style="background: #ffffff; border-radius: 10px;margin-top: 15px" >
             <a href="{{url("user/session/list_question_active/{$l->id}")}}" style="text-decoration: none;">

             {{-- hiện thị thành công --}}

                <div class="row">  
                    <div class="left col-sm-2">
                        <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                         style="height: 75px;width:75px;border-radius:50%;margin-top: 10px" >
                        
                    </div>
                    <div class="col-sm-7 right" 
                    style="background-color: #ffffff;margin-left: 10px;color:#000000;">
                        <p class="title">Phiên hỏi đáp: {{$l ->name_session}}</p>
                        <p> <a href="{{url("user/manage/edit/{$l->id}")}}">Sửa phiên</a>
                            <a href="{{url("user/manage/delete/{$l->id}")}}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa trạng thái phiên hay không?')"
                                style="margin-left: 10px;">Xóa phiên</a>
                            <a href="{{url("user/manage/create_question/{$l->id}")}}" style="margin-left: 10px;">Tạo câu hỏi</a>
                      
                    </p>
                    </div>
                </div>
                </a>
        </div>
    @endforeach

</div>

@endsection