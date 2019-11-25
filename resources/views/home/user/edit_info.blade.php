
@extends('home.layouts.index_page')

@section('content')
<div class="row">
    
            <h3 style="margin-left: 25px;color:#0059b3">Thay đổi thông tin </h3>
        	 {{-- thông báo lỗi --}}
             @if(count($errors) > 0)
             <div class="alert alert-danger" style="width: 50%;margin-left: 10px">
             
                 @foreach ($errors -> all() as $err)
                     {{$err}}<br>
                 @endforeach
             
             </div>
          @endif

            <div class="left col-sm-4" style="margin-top:40px; padding: 5px">
                <center>
                    <img src="{{URL::asset('/img/avatars/'.Auth::user()->avatar)}}" alt="avatar" 
                    style="border-radius: 50%;margin-bottom: 20px">
                    <a href="{{url("user/profile")}}">
                    <input type="submit" class="btn btn-primary" value="Thay ảnh đại diện" >
                    </a>
                </center>
            </div>
            <div class="col-sm-5 right">
                <form method="post" action="{{$user->id}}">

                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="form-group">
                        <h5 style="color:#000000">Tên đăng nhập</h5>
                        <input type="text" name="name" class="form-control" placeholder="Tên đăng nhập" value="{{$user->name}}" />
                    </div>

                    <div class="form-group">
                        <h5 style="color:#000000">Mật khẩu</h5>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="{{$user->password}}" />
                    </div>

                    <div class="form-group">
                        <h5 style="color:#000000">Nhập lại mật khẩu</h5>
                        <input type="password" name="passAgain" class="form-control" placeholder="Mật khẩu" value="{{$user->password}}" />
                    </div>

                    <div class="form-group">
                        <h5 style="color:#000000">Email</h5>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}"  readonly=""/>
                    </div>

                    <input type="submit" name="submit" value="Lưu" class="btn btn-primary" 
                  />
                </form>
            </div>
 
</div>      
@endsection

