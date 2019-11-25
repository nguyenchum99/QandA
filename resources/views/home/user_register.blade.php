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
    background-color:  #a6a6a6 ;
    padding: 10px 58px;
    
    
}
.active{

    /* background-color: red !important; */
    
}
.navbar-default .navbar-nav>.active>a{
    background-color:    #a6a6a6 !important;
    border-radius: 10px;
    
   
}

.navbar-brand{
    margin-left: 40px;
}


a{
    color:#000000!important;
}
.login{margin-top: 100px;

}

#login{
    color: #000000;
}
span{
    border-top:5px solid white;
}
form{
    height: 350px;
    margin-top: 10px;
    background-color:#ffffff;
     
}
.main-head{
    background-color:  #ffffff;
}
.form-group{
   padding: 5px 100px;
}
button{
    float: right;
}
.head{
    color: #000000;
    text-align: center;
    padding: 12px 0 12px 15px;
}

.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
    border-radius: 10px;
    background-color: #ffffff;    
    border-radius: 10px;
    margin: 0 auto; /* Added */
    float: none;

}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

        
        </style>
<body  style=" background-image: url({{ asset('img/bg2.jpg') }});
height: 100%;background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">

<div class="card" >

    <div class="login">
        <div class="main-head">
            <div class="head">
                    <h3><b>HỆ THỐNG HỎI ĐÁP Q-A</b></h3>
                    <h4><b>ĐĂNG KÝ TÀI KHOẢN </b></h4>
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
                <form action="{{url("user/register")}}" method="post">

                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input type="text" class="form-control"  name="name">
                        <label>Email</label>
                        <input type="email" class="form-control"  name="email">
                        <label>Ngày sinh</label><input type="date" name="bday" class="form-control">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="password">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control"  name="cpassword">         
                        <input  type="submit" class="btn btn-primary" value="Đăng kí" style="margin-top:5px" >
                        
                    </div>
                </form>
        </div> 
    </div>
</div>

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
