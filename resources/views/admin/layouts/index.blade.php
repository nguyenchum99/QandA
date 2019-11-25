<!DOCTYPE html>
<html>
<head>
    <title>admin</title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{asset('js/app.js') }}" defer></script>

    <style>
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
        .left{margin-top: 25px;}
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


<body>

    <div class="head">

        @include('admin.layouts.header')
           
    </div>

    <div class="main">
        <div class="container" >
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