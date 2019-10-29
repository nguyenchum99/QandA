
@extends('home.layouts.index_page')

@section('content')

        <div style ="width: 40%; padding-left: 30px">
            <h2>Thay đổi thông tin </h2>
        	 {{-- thông báo lỗi --}}
             @if(count($errors) > 0)
             <div class="alert alert-danger">
             
                 @foreach ($errors -> all() as $err)
                     {{$err}}<br>
                 @endforeach
             
             </div>
          @endif


            <form method="post" action="{{$user->id}}">

                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <div class="form-group">
                	<label>Tên đăng nhập</label>
                    <input type="text" name="name" class="form-control" placeholder="Tên đăng nhập" value="{{$user->name}}" />
                </div>

                <div class="form-group">
                	<label>Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="{{$user->password}}" />
                </div>

                <div class="form-group">
                	<label>Nhập lại mật khẩu</label>
                    <input type="password" name="passAgain" class="form-control" placeholder="Mật khẩu" value="{{$user->password}}" />
                </div>

                <div class="form-group">
                	<label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}"  readonly=""/>
                </div>

                <input type="submit" name="submit" value="Lưu" class="btn btn-primary" />
            </form>
        </div>
    <div>

@endsection

