<!DOCTYPE html>
<html>
<head>
    <title>The Login Form</title>
    <link rel="stylesheet" href="{{asset('css/login_admin_style.css')}}">
    <base href="{{asset('')}}" >
    <style>
    </style>
</head>
<body>
    {{-- thông báo lỗi --}}
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        
            @foreach ($errors -> all() as $err)
                {{$err}}<br>
            @endforeach
        
    </div>
    @endif

    {{-- hiện thị sửa thành công --}}
    @if(session('thongbao'))
        {{session('thongbao')}}
    </div>

    @endif
    <div class="wrap">
        <form role="form" class="login-form" action="{{url("admin/login")}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-header">
                <h3>Admin</h3>
            </div>
            <!--Email Input-->
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Admin" name="name" value="">
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="password" class="form-input" placeholder="Mật khẩu" name="password">
            </div>
            <!--Login Button-->
            <div class="form-group">
                <button class="form-button" type="submit">Đăng nhập</button>
            </div>
            {{-- <div class="form-footer">
            Don't have an account? <a href="#">Sign Up</a>
            </div> --}}
        </form>
    </div>
</body>
</html>