
@extends('home.layouts.index_page')
@section('content')


<div class="top" >
    <div class="form-group" >
    <h3 style="color:#0059b3">Danh sách phiên hỏi đáp đang mở</h3>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        
            @foreach ($errors -> all() as $err)
                {{$err}}<br>
            @endforeach
        
    </div>
    @endif
        @if(session('thongbao'))

        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>

    @endif
    </div>


    @foreach($name as $l)
        @if($l->active == 1)
            <div class="card" style="width: 100%;margin-top: 15px;">
                {{-- hiện thị thành công --}}
                    <div class="row">  
                        <div class="left col-sm-2"><center>
                            <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                         style="height: 75px;width:75px;margin-top:25px;border-radius: 50%" ></center>
                        </div>
                        <div class="col-sm-7 right" style="background-color: #ffffff;">
                            {{-- {{url("user/session/list_question_active/{$l->id}")}} --}}
                            <p class="title" style="color: #e63900">Phiên hỏi đáp: {{$l->name_session}}</p>
                            <p style="margin-top: 5px">Chủ tọa: {{$l->name}}</p>
                            <p style="margin-top: 5px">Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                ->diffForHumans() }}</p>
                            <form action="{{url("user/session/check_password/{$l->id}")}}" method="POST"
                                 data-remote="true" style="margin-top: 5px">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div style="width: 90%">
                                <input type="password"  placeholder="Nhập mật khẩu phiên..." class="form-control"
                                name="password" style="float:left; width:70%" >
                                <input type="submit" class="btn btn-primary" 
                                 value="Xác nhận" style="float: right">   
                                </div>    
                            </form>
                        </div>
                    </div>
            </div>
        @endif 
    
    @endforeach

</div>
@endsection