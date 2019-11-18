<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<style>
        .navbar-nav{
            float: right !important;   
            color: #ffffff;
        }
        .container-fluid{
            background-color:  #e63900  ;
            padding: 10px 58px;
            
            
        }
        .active{
        
            /* background-color: red !important; */
            
        }
        .navbar-default .navbar-nav>.active>a{
            background-color:    #e63900 !important;
            border-radius: 10px;
            
           
        }
        
        .navbar-brand{
            margin-left: 40px;
        }
        
        
        a{
            color:#ffffff !important;
        }
        .login{margin-top: 60px;
            
        }
        span{
            border-top:5px solid white;
        }
        form{
            height: 300px;
            padding-top: 20px;
            background-color:  #ffebe6;
             
        }
        .main-head{
            width: 500px;
            background-color:   #e63900 ;
            height: 380px;
            margin-bottom: 10px;
          
        }
        .form-group{
           padding: 5px 100px;
        }
        button{
            float: right;
        }
        .head{
            color: #ffffff;
            text-align: center;
            padding: 12px 0 12px 15px;
        }
        
        </style>
<body>

{{-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">HỆ THỐNG HỎI ĐÁP Q-A</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{url("user/login")}}">ĐĂNG NHẬP</a></li>
        <li><a href="{{url("user/register")}}">ĐĂNG KÍ</a></li>
      
    </ul>
  </div>
</nav> --}}
<div class="container">
    <center>

    <div class="login">
        <div class="main-head">
            <div class="head">
                    <h3>HỆ THỐNG HỎI ĐÁP Q-A</h3>
                    <h4>ĐĂNG KÝ TÀI KHOẢN </h4>
            </div>
                <form action="{{url("user/register")}}" method="post">
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

                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Tên đăng nhập" name="name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-mail" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="cpassword">
                    </div>
                    <div class="form-group">
                        <input href="" type="submit" class="btn btn-primary" value="Đăng kí"  
                        style="background-color: #e63900">
                    </div>
                    {{-- <div class="fomr-group">
                        <input type="submit" class="btn btn-default" value="Đăng kí">
                    </div> --}}
                </form>
        </div> 
    </div>
</div></center>

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
