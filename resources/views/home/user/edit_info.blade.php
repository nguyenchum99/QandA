
@extends('home.layouts.index_page')

@section('content')
<div class="row">
    
            <h3 style="margin-left: 25px;color:#e63900"><b>Thay đổi thông tin </b></h3>
        	 {{-- thông báo lỗi --}}
             @if(count($errors) > 0)
             <div class="alert alert-danger">
             
                 @foreach ($errors -> all() as $err)
                     {{$err}}<br>
                 @endforeach
             
             </div>
          @endif

            <div class="left col-sm-4" style="margin-top:40px">
                <center>
                    <img src="{{URL::asset('/img/avatars/'.Auth::user()->avatar)}}" alt="avatar">
                    <a href="{{url("user/profile")}}">
                    <input type="submit" class="btn nut" value="Thay ảnh đại diện" style="background-color: #e63900;color:white">
                    </a>
                </center>
            </div>
            <div class="col-sm-5 right">
                <form method="post" action="{{$user->id}}">

                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="form-group">
                        <label style="color:#e63900">Tên đăng nhập</label>
                        <input type="text" name="name" class="form-control" placeholder="Tên đăng nhập" value="{{$user->name}}" />
                    </div>

                    <div class="form-group">
                        <label style="color:#e63900">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="{{$user->password}}" />
                    </div>

                    <div class="form-group">
                        <label style="color:#e63900">Nhập lại mật khẩu</label>
                        <input type="password" name="passAgain" class="form-control" placeholder="Mật khẩu" value="{{$user->password}}" />
                    </div>

                    <div class="form-group">
                        <label style="color:#e63900">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}"  readonly=""/>
                    </div>

                    <input type="submit" name="submit" value="Lưu" class="btn btn-primary" style="background-color:#e63900;color:white"/>
                </form>
            </div>
 
</div>      
@endsection

