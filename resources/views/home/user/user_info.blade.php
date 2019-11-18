
@extends('home.layouts.index_page')
@section('content')


    <div class="row">
                            
        <div class="left col-sm-4" >
            <center>
                <img src="{{URL::asset('/img/avatars/'.Auth::user()->avatar)}}" alt="avatar"
                style="width:160px; height: 160px;border-radius: 50%;margin-top: 15px">
            </center>
        </div>
        
        <div class="col-sm-5 right" style="color:#000000">
            <span class="fa fa-user name" style="color:#a6a6a6"></span>
            <p class="name" style="color:#000000"> {{$user->name}}</p>
            
            <span class="fa fa-graduation-cap" style="color:#a6a6a6"></span>
            <p class="number">
                @if($user->level == 1)
                    {{"Chức vụ: Quản trị viên"}}
                @else 
                    {{"Chức vụ: Thành viên"}}
                @endif
                
            </p>
            <span class="fa fa-question-circle-o" style="color:#a6a6a6"></span>
            <p class="number"> Tổng số câu hỏi: {{$question}}</p>
            <span class="fa fa-hourglass-half" style="color:#a6a6a6" ></span>
            <p class="number"> Câu hỏi chưa được trả lời: 0</p>
            <span class="fa fa-history" style="color:#a6a6a6" ></span>
            <p class="reload"> Lần cuối đặt câu hỏi: N/A</p>
        </div>
        
    </div>
     
@endsection