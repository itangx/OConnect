<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    
    <!-- Fonts -->
    <link href="{!! URL::asset('css/bootstrap.css') !!}" rel="stylesheet" type="text/css" media="all" />
    <link href="{!! URL::asset('css/styleHome.css') !!}" rel="stylesheet" type="text/css" media="all" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{!! URL::asset('js/bootstrap.js') !!}"></script>
    <!-- Styles -->
    <style>
        @font-face {
            font-family: sarabun;
            src: url(font/THSarabunNew.ttf);
        }
        html, body {
            font-family: sarabun;
            background-color: #F4F8FB;
        }
        a:link {
            text-decoration: none;
            color: black;
        }

        a:visited {
            text-decoration: none;
            color: black;
        }

        a:hover {
            text-decoration: none;
            color: black;
        }

        a:active {
            text-decoration: none;
            color: black;
        }
        .welcome-section{
            width: 90%;
            text-align: center;
            margin: 0 auto;
        }
        .welcome-title{
            font-size: 40px;
            font-weight: 800;
            color: black;
            padding-top: 20px;

        }
        .welcome-subtitle{
            font-size: 30px;
            font-weight: 800;
            color: black;
        }
        .section-activity{
            margin: 15px auto;
        }
        .section-title{
            margin-bottom: 15px;
            font-size: 40px;
            font-weight: bold;
        }
        .cover{
            background: url('{!! URL::asset('img/world.jpeg') !!}') top center no-repeat;
            background-size: cover;
            min-height: 60vh;
        }
        .card-img-container{
            width:100%;
            padding-bottom: 75%;
            position: relative;
            overflow: hidden;
        }
        .logo{
            display: block;
            height: 98%;
            width: 98%;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
        }
        .desc{
            padding:10px 0;
        }
        .desc-title{
            text-align: center;
            font-weight:bold;
            font-size:24px;
            overflow:hidden;
            display:-webkit-box;
            color:black;
            text-overflow:ellipsis;
            -webkit-box-orient:vertical;
            max-height:40px;
            -webkit-line-clamp:1;
        }
        .category-section{
            margin: 4px 0;
            padding: 4px 0;
        }
        .category-location{
            margin: 0px 10px;
            font-size: 18px; 
            font-weight: normal;
            overflow: hidden;
            text-overflow:ellipsis;
            height:75pt;
        }
        .bg{
            background-color: #f5f5f5;
            border:1px solid #dddddd;
            border-radius:4px;
        }
        .card{
            margin-bottom: 15px;
        }
        header{
            width:100%; 
            background:#fafafa; 
            height:60px; 
            line-height:60px;
            border-bottom:1px solid #dddddd;
        }
        footer{
            width:100%; 
            background:#fafafa; 
            height:60px; 
            line-height:60px;
            border-top:1px solid #dddddd;
        }
        #cloud1{
            animation-duration: 30s;
            animation-name: slidein;
            animation-iteration-count: infinite;
            animation-direction: alternate;
        }
        #cloud2{
            animation-duration: 30s;
            animation-name: slideout;
            animation-iteration-count: infinite;
            animation-direction: alternate;
        }
        @keyframes slideout {
            from {
                margin-left: 25%;
                width: 75px;
            }

            to {
                margin-left: 65%;
                width: 75px; 
            }
        }
        @keyframes slidein {
            from {
                margin-left: 65%;
                width: 75px; 
            }

            to {
                margin-left: 25%;
                width: 75px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            OConnect
        </div>
    </header>
    <div class="container">
        <div class="section-activity">
            <div class="section-title">
                Event Active
            </div>
            <div class="row">
                @foreach ($event as $e)
                <div class="col-xs-12 col-sm-6 col-md-4 card">
                    <a href="/event/{{$e->event_id}}">
                        <div class="bg">
                            <div class="card-img-container">
                                <img src="{!! URL::asset('img/logo.jpg') !!}" alt="logo" class="logo">
                            </div>
                            <div class="desc">
                                <div class="desc-title">
                                    {{ $e->event_topic }}
                                </div>
                                <div class="category-section">
                                    <div class="category-location">
                                        {{ $e->event_description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <img src="{!! URL::asset('img/cloud.png') !!}" id="cloud1" style="width:80px;height:60px;margin-top:15px;" alt="cover">
    <img src="{!! URL::asset('img/cloud.png') !!}" id="cloud2" style="width:80px;height:60px;margin-top:-30px;" alt="cover">
    <img src="{!! URL::asset('img/cover3.png') !!}" alt="cover">

    <footer>
        <div class="container" style="text-align:center">
            <center>
                <img src="{!! URL::asset('img/ttt.png') !!}" style="width:60px;height:60px;margin-top:15px" alt="cover">
                <img src="{!! URL::asset('img/facebook.png') !!}" style="width:60px;height:60px;margin-top:15px" alt="cover">
                <img src="{!! URL::asset('img/twitter.png') !!}" style="width:60px;height:60px;margin-top:15px" alt="cover">
            </center>
            <center>©2017 All Rights Reserved | Design by itangx & falcon</center>
        </div>
    </footer>
</body>
</html>
