<!DOCTYPE html>
<html>
<head>
    <title>admin</title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
    </style>
</head>


<body>

    <div class="head">

        @include('admin.layouts.header');
           
    </div>

    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="left col-sm-3">
                    
                    @include('admin.layouts.sidebar');

                </div>


                <div class="col-sm-9 right">

                    @yield('content');
                    
                </div>

            </div>
        </div>
    </div>
</div>


</body>
</html>