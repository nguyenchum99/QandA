
@extends('home.layouts.index_page')
@section('content')


<div class="main-right">

        <div class="box">
            <div class="row">  
                <div class="col-md-2">
                    <img src="anh.jpg">
                </div>
                <div class="col-md-10 box-right"><a href="{{url("user/questionandanswer")}}" >
                    <p class="title">hỏi đáp ? ...</p>
                    <p>Phiên hỏi-đáp: phiên hỏi đáp</p>
                    <p class="time">22 ngày trước</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="box">
                <div class="row">  
                    <div class="col-md-2">
                        <img src="anh.jpg">
                    </div>
                    <div class="col-md-10 box-right">
                        <p class="title">hỏi đáp ? ...</p>
                        <p>Phiên hỏi-đáp: phiên hỏi đáp</p>
                        <p class="time">22 ngày trước</p>
                    </div>
                </div>
        </div>    

</div>

@endsection