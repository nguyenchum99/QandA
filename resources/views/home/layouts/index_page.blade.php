<!DOCTYPE html>
<html>
<head>
    <title>user</title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        

.box{background: #ffff;padding: 13px;margin-bottom: 13px;}
.box img{width: 89px;}
.box p{margin:  0 0 8px;}
.box-right{margin-left: -70px;}

.time{color: blue;
    font-size: 12px;
}

   li{
            list-style: none;
        }
        .navbar-inverse {
    background-color: #ebf0fa;
    border-color: #ebf0fa;
}
#menu{
    display: none;
}
ul .slide:hover #menu{ 
    display: block;
}
.list-group {
    margin-bottom: 0;
    background-color: #ebf0fa;
}

.right{
    background-color: #f2f2f2;
    padding: 13px;
}

.right span{
    float: left;
     padding:3.5px 10px 0 0;
            
    }
.right img{width: 200px;}
.name{font-size:20px; color: blue;}
 .nut{    width: 200px;
            margin: 15px 0;}

.top{padding-bottom: 60px}
.top span{float: left;padding: 3px 15px 0 0;}
.top p{margin: 0;}
.top img{width: 125px;}
.chevron,.header{background: #5790c1cc}
.main-right{margin: 15px;}
.chevron{display: inline-block;
    padding-top: 10px;    margin-bottom: 13px;}
.header p{    padding: 5px 0 5px 10px;margin: 0}

.title{    font-size: 15px;
    font-weight: 600;
    }


    .content{    padding: 15px;
    border: 1px solid #e0e0e0;
    box-shadow: 0px 0px 14px 0px
}.content ul li{padding: 5px;
    border: 1px solid #1b191933;}
    .content p{margin-left: 40px;}
.content .time{margin: 0;}
.botton{    border: 1px solid #e0e0e0;
    background: #dddddd;}
 
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 70%;
        border-radius: 5px;
        background-color: #ffffff;
        }

        .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

    </style>
</head>


<body  style=" background:#f2f2f2 ;">

    <div class="head">

        @include('home.layouts.header_page')
           
    </div>

    <div class="main">
        <div class="container-fluid">
            <div class="row">
                
                <div class="left col-sm-2">
                    @include('home.layouts.sidebar_page')
                </div>
                <div class="col-sm-7 right" style="margin-left:140px;">

                    @yield('content')
                    
                </div>

            </div>
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