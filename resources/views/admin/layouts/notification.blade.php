
@extends('admin.layouts.index')
@section('content')

<div class="main-right" style="margin-top: 25px">
    @foreach($session as $l)
       @if($l->level == 0)
            <div class="card" style="margin-top: 15px">
                    <div class="row">  
                        <div class="col-sm-2"><center>
                            <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                            style="height: 50px;width:50px;border-radius: 50%" >
                        </div></center>
                        <div class="col-sm-7" >
                            <p style="color: red">{{$l->name}} đã tạo phiên hỏi đáp mới</p>
                            <p >Thời gian tạo: {{$l->created_at}}
                            </p>
                        </div>
                    </div>
            </div>
        @endif
    @endforeach 
    
    @foreach($answer as $l)
        @if($l->level == 0)
            <div class="card" style="margin-top: 15px">
                    <div class="row">  
                        <div class="col-sm-2"><center>
                            <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                            style="height: 50px;width:50px;border-radius: 50%" >
                        </div></center>
                        <div class="col-sm-7" >
                            <p style="color: blue">{{$l->name}} đã trả lời câu hỏi của bạn</p>
                            <p >Thời gian tạo: {{$l->created_at}}
                            </p>
                        </div>
                    </div>
            </div>
     @endif
    @endforeach 
        

@endsection