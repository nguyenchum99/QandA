<!DOCTYPE html>
<html>
<head>
    <title>profile</title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {{-- <link rel="stylesheet" href="{{URL::asset('css/home_page.css')}}"> --}}
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
    background-color: #dddddd;
    border-color: #dddddd;
}
#menu{
    display: none;
}
ul .slide:hover #menu{ 
    display: block;
}
.list-group {
    margin-bottom: 0;
}
.right{
background: #dddddd;
    padding: 13px;
}

.right span{float: left; padding:3.5px 10px 0 0}
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
    font-weight: 600;}
    .content{    padding: 15px;
    border: 1px solid #e0e0e0;box-shadow: 0px 0px 14px 0px
}.content ul li{padding: 5px;
    border: 1px solid #1b191933;}
    .content p{margin-left: 40px;}
.content .time{margin: 0;}
.botton{    border: 1px solid #e0e0e0;
    background: #dddddd;}
 


    </style>
</head>


<body>

    <div class="head">

        @include('admin.layouts.header')
           
    </div>

    <div class="main">
        <div class="container-fluid">
            <div class="row">
                
                <div class="left col-sm-3">
                    @include('admin.layouts.sidebar')
                </div>


                <div class="col-sm-9 right">

                    @yield('content')
                    
                </div>

            </div>
        </div>
    </div>
</div>


</body>
</html>