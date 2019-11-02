
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

        <div class="box">

             {{-- hiện thị thành công --}}
                <div class="row">  
                    <div class="col-md-2">
                        <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                         style="height: 75px;width:75px;margin-top:10px" >
                    </div>
                    <div class="col-md-10 box-right">
                        <p class="title" style="color: red">Phiên hỏi đáp: {{$l ->name_session}}</p>
                        <p>
                            @if($l->active == 1)
                            {{"Phiên hỏi đáp mở"}}    
                            @else 
                            {{"Phiên hỏi đáp đóng"}}
                            @endif
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