<!DOCTYPE html>
<html>
<head>
    <title>The Login Form</title>
    <link rel="stylesheet" href="{{asset('css/login_admin_style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <base href="{{asset('')}}" >
    <style>
    </style>
</head>
<body>
    
    {{-- thông báo lỗi --}}
   

    <div class="wrap" style="background-color: #E9EBEE">
        
        <form role="form" class="login-form" action="{{url("admin/login")}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-header">
                <h3>Chào mừng Quản trị viên</h3>
            </div>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                
                    @foreach ($errors -> all() as $err)
                        {{$err}}<br>
                    @endforeach
                
            </div>
            @endif
        
            {{-- hiện thị sửa thành công --}}
            @if(session('thongbao'))
        
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            
            @endif

            <div class="form-group">
                <input type="text" class="form-input" placeholder="Tên đăng nhập" name="name" value="">
            </div>
            <div class="form-group">
                <input type="password" class="form-input" placeholder="Mật khẩu" name="password">
            </div>
                
            <div class="form-group">
                <button class="form-button" type="submit" style="background-color: #737373">Đăng nhập</button>
            </div>
        
        </form>
    </div>
     <!-- Myscript -->
     <script>
        function xacnhanxoa (xoa){
    
            if (window.confirm(xoa)) {
                return true;
            }
            return false;
        }
        $("div.alert").delay(1000).slideUp();
    </script>
</body>
</html>