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
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body {
	  
        background-image:url({{ asset('img/bg-01.jpg') }});	

       
    }
    .form-signin {
        /* top:50px;
        left:50px; */
        max-width: 300px;
        padding: 15px 35px 45px;
        margin: 0 auto;
        margin-top: auto;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,0.1); 
        /* position: absolute; */
    }
    .head{
        margin-bottom: 25px;
        border-bottom:1px solid #888;
    }
    h1{
        text-transform: uppercase;
        text-align: center;
        color:#4c7daf;
    }
    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border-radius: 1px;
}
    button {
        background-color: #4c7daf;
        color: white;
        padding: 14px 20px;
        margin: 14px 30px;
        border: none;
        cursor: pointer;
        width: 80%;
        border-radius: 2px;
    }
    a{
        cursor: pointer;
        text-decoration: none;
        color: black;

    }
    .top {
        margin-top: 40px;
    }
    .right {
       text-align: right;
    }
    a:hover{
        color:#4c7daf;
        margin-right: 0px;
    }
    

    </style>
</head> --}}
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
                   
                </form>
        </div> 
    </div>
</div></center> 

{{-- <div class="top"><h1> </h1></div>
<form class="form-signin" action="{{url("user/login")}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <div class="head"><h1>Đăng nhập</h1></div>
    <label for="uname">Tên đăng nhập</label><br>
    <input type="text" placeholder="Tên đăng nhập" name="name" >

    <label for="psw">Mật khẩu</label>
    <input type="password" placeholder="Mật khẩu" name="password" >
    <div class="right"><a href="{{url("user/register")}}">Đăng kí</a></div>
    <div class="fomr-group">
        <input type="submit" class="btn btn-default" value="Đăng kí">
    </div>
</form> --}}
</body>
</html>
