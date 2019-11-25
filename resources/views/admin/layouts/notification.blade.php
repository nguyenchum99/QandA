
@extends('admin.layouts.index')
@section('content')

<div class="main-right" style="margin-top: 25px">

    <div class="form-group" style="width: 70%">
    <form action="{{url("admin/user/notification")}}" method="POST">
       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <label>Tạo thông báo</label>
       <br><textarea type="text" name="notification" 
        rows="2" class="form-control" placeholder="..." 
        ></textarea>
       <br><input type="submit" class="btn btn-primary" value="Gửi">   
       
   </form>

    </div>

    @if(session('thongbao'))

    <div class="alert alert-success" style="width: 50%">
        {{session('thongbao')}}
    </div>

@endif

@if(count($errors) > 0)
    <div class="alert alert-danger" style="width: 50%">
            
        @foreach ($errors -> all() as $err)
            {{$err}}<br>
        @endforeach
            
    </div>
@endif

    @foreach($session as $l)
       @if($l->level == 0)
            <div class="card" style="margin-top: 15px">
                    <div class="row">  
                        <div class="col-sm-2"><center>
                            <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                            style="height: 40px;width:40px;border-radius: 50%; margin-top: 15px" >
                        </div></center>
                        <div class="col-sm-7" >
                            <p style="color: red;margin-top: 10px">{{$l->name}} đã tạo phiên hỏi đáp mới</p>
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
                            style="height: 40px;width:40px;border-radius: 50%; margin-top: 15px" >
                        </div></center>
                        <div class="col-sm-7" >
                            <p style="color: blue;margin-top: 10px">{{$l->name}} đã trả lời câu hỏi của bạn</p>
                            <p >Thời gian tạo: {{$l->created_at}}
                            </p>
                        </div>
                    </div>
            </div>
     @endif
    @endforeach 
        

@endsection