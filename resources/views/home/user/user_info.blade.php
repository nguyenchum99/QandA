
@extends('home.layouts.index_page')
@section('content')


<div class="card" style="width: 90%">
    <div class="row">
                            
        <div class="left col-sm-4" >
            <center>
                <img src="{{URL::asset('/img/avatars/'.Auth::user()->avatar)}}" alt="avatar"
                style="width:150px; height: 150px;border-radius: 50%;margin-top: 15px">
            </center>
        </div>
        
        <div class="col-sm-5 right" style="color:#0059b3; background: #ffffff">
            <span class="fa fa-user name" style="color:#0059b3"></span>
            <p class="name" style="color:red"> {{$user->name}}</p>
            
            <span class="fa fa-graduation-cap" style="color:#0059b3"></span>
            <p class="number" style="color:#000000">
                @if($user->level == 1)
                    {{"Chức vụ: Quản trị viên"}}
                @else 
                    {{"Chức vụ: Thành viên"}}
                @endif
                
            </p>
            <span class="fa fa-question-circle-o" style="color:#0059b3"></span>
            <p class="number" style="color:#000000"> Tổng số câu hỏi: {{$question}}</p>
            <span class="fa fa-hourglass-half" style="color:#0059b3" ></span>
            <p class="number" style="color:#000000"> Câu hỏi chưa được trả lời: 0</p>
            <span class="fa fa-history" style="color:#0059b3" ></span>
            <p class="reload" style="color:#000000"> Lần cuối đặt câu hỏi: N/A</p>
        </div>
        
    </div>
</div>
@endsection