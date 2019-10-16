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
    <link rel="stylesheet" href="{{asset('css/home_page.css')}}">
    <style>

    </style>
</head>


<body>

    <div class="head">

        @include('home.layouts.header_page')
           
    </div>

    <div class="main">
        <div class="container-fluid">
            <div class="row">
                
                <div class="left col-sm-3">
                    @include('home.layouts.sidebar_page')
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