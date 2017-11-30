<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name')}} | Home</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .head-block{margin: 100px 0px;}
        .content {text-align: center;font-weight: bold;}
        .title {font-size: 80px;font-weight: bold;}
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="head-block">
            <div class="row">
                {{-- <div class="col-lg-12 page-header"> --}}
                {{-- <h2 class="content title">Jay Navnath </h2>
                <h1 class="content">Engineering Works</h1> --}}
                <img src="{{URL::asset('assets/images/hmscreen.jpg')}}" alt="Home Screen" style="width:500px;height:300px;margin:0px auto;" class="img img-responsive" >
                {{-- </div> --}}
            </div>

            <div class="row">
                <div class="col-lg-12 content">
                <h3><b>Customer Record & Enquiry Management Portal</b></h3><br>
                <a href="{{url('/login')}}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
