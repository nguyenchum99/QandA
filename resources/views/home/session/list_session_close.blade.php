
@extends('home.layouts.index_page')
@section('content')


<div class="main-right" >
    <h3 style="color: #0059b3">Danh sách phiên hỏi đáp đã đóng</h3>
    @if(session('thongbao'))

    <div class="alert alert-success">
        {{session('thongbao')}}
    </div>

@endif
     

    @foreach($name as $l)


        @if($l->active == 0)
            <div class="card"  style="width: 100%;margin-top: 15px">

                {{-- hiện thị thành công --}}
                    <div class="row">  
                        <div class="left col-sm-2">
                            <img src="{{URL::asset('/img/q-and-a.jpg')}}" alt="image" 
                            style="height: 75px;width:75px;margin-top:10px" >
                        </div>
                        <div class="col-sm-7 right" style="background-color: #ffffff"><a href="{{url("user/session/list_question/{$l->id}")}}" style="text-decoration: none;">
                            <p class="title" style="color:  #0059b3">Phiên hỏi đáp: {{$l->name_session}}</p>
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