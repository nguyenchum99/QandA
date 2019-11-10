
@extends('home.layouts.index_page')
@section('content')


    <div class="row">
                            
        <div class="left col-sm-4" >
            <center>
                <img src="{{URL::asset('/img/avatars/'.Auth::user()->avatar)}}" alt="avatar">
            </center>
        </div>
        
        <div class="col-sm-5 right" style="color:#e63900">
            <span class="fa fa-user name" style="color:#e63900"></span>
            <p class="name" style="color:#e63900"> {{$user->name}}</p>
            
            <span class="fa fa-graduation-cap" ></span>
            <p class="number">
                @if($user->level == 1)
                    {{"Chức vụ: Quản trị viên"}}
                @else 
                    {{"Chức vụ: Thành viên"}}
                @endif
                
            </p>
            <span class="fa fa-question-circle-o" ></span>
            <p class="number"> Tổng số câu hỏi: {{$question}}</p>
            <span class="fa fa-hourglass-half" ></span>
            <p class="number"> Câu hỏi chưa được trả lời: 0</p>
            <span class="fa fa-history" ></span>
            <p class="reload"> Lần cuối đặt câu hỏi: N/A</p>
        </div>
        
    </div>
     
@endsection