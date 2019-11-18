
@extends('home.layouts.index_page')
@section('content')


<div class="main-right" style="color: #000000">
    <h3><b>Danh sách phiên hỏi đáp đã đóng</b></h3>
    @if(session('thongbao'))

    <div class="alert alert-success">
        {{session('thongbao')}}
    </div>

@endif
     

    @foreach($name as $l)


        @if($l->active == 0)
            <div class="box" >

                {{-- hiện thị thành công --}}
                    <div class="row">  
                        <div class="left col-sm-2">
                            <img src="{{URL::asset('/img/q-and-a.jpg')}}" alt="image" 
                            style="height: 75px;width:75px;margin-top:10px" >
                        </div>
                        <div class="col-sm-7 right" style="background-color: #ffffff"><a href="{{url("user/session/list_question/{$l->id}")}}" style="text-decoration: none;">
                            <p class="title" style="color:  #e63900">Phiên hỏi đáp: {{$l->name_session}}</p>
                            <p><font size="2" color="#000000">Chủ tọa: {{$l->name}}</p>
                            <p >Đã đóng </p>
                            
                            </a>
                        </div>
                    </div>
            </div>
        @endif 

    @endforeach

</div>

@endsection