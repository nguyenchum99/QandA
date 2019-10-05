<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
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

  <div class="alert alert-success">
      {{session('thongbao')}}
  </div>
  
  @endif

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">LOGO</a>
    </div>

    <ul class="nav navbar-nav">
      <li><a href="{{url("user/login")}}">ĐĂNG NHẬP</a></li>
      <li><a href="{{url("user/register")}}">ĐĂNG KÍ</a></li>
      
    </ul>
  </div>
</nav>
<div class="container" style="background: #E9EBEE; height: 562px;">
    <center>

    <div class="Name">
        <h1>HỆ THỐNG HỎI - ĐÁP</h1>
        <span class="vien"></span>
    </div>

    <div class="login">
        <div class="main-head">
            <div class="head">
                <h3>ĐĂNG NHẬP</h3>
            </div>
                <form action="{{url("user/login")}}"  method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Tên đăng nhập" name="name">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                    </div>
                    <div class="form-group">
                        <input href="#" type="submit" class="btn btn-primary" value="Đăng nhập">
            
                    </div>
                    {{-- <div class="fomr-group">
                        <input type="submit" class="btn btn-default" value="Đăng kí">
                    </div> --}}
                </form>
        </div> 
    </div>
</div></center>
</body>
</html>
