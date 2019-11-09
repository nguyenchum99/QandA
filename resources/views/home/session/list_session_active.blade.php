
@extends('home.layouts.index_page')
@section('content')


<div class="main-right">
    <h2>Danh sách phiên hỏi đáp đang mở</h2>
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
        

    @foreach($name as $l)
        @if($l->active == 1)
            <div class="box">

                {{-- hiện thị thành công --}}
                    <div class="row">  
                        <div class="col-md-2">
                            <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                         style="height: 75px;width:75px;margin-top:10px" >
                        </div>
                        <div class="col-md-10 box-right">
                            {{-- {{url("user/session/list_question_active/{$l->id}")}} --}}
                            <p class="title" style="color: red">Phiên hỏi đáp: {{$l->name_session}}</p>
                            <p>Chủ tọa: {{$l->name}}</p>
                            <p>Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                ->diffForHumans() }}</p>
                            <form action="{{url("user/session/check_password/{$l->id}")}}" method="POST" data-remote="true">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="password"  placeholder="Nhập mật khẩu phiên..." name="password">
                                <input type="submit" class="btn btn-default" data-dismiss="modal" value="Xác nhận">       
                            </form>
                        </div>
                    </div>
            </div>
        @endif 
        

    @endforeach

</div>

@endsection