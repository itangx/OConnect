<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{!! URL::asset('css/bootstrap.css') !!}" rel="stylesheet" type="text/css" media="all" />
    <link href="{!! URL::asset('css/styleHome.css') !!}" rel="stylesheet" type="text/css" media="all" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{!! URL::asset('js/bootstrap.js') !!}"></script>
    <!-- Styles -->
    <style>
        html, body {
            font-family: 'Raleway', sans-serif;
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
            font-size: 28px;
            font-weight: 800;
        }
        .cover{
            background: url('{!! URL::asset('img/world.jpeg') !!}') top center no-repeat;
            background-size: cover;
            min-height: 60vh;
        }
        .card{
            width:100%;
            margin:10px 0;
        }
        .card-img-container{
            width:100%;
            padding-bottom: 75%;
            position: relative;
            background-color: #4a4a4a;
            overflow: hidden;
        }
        .logo{
            display: block;
            height: 100%;
            width: 100%;
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
            font-weight:600;
            font-size:16px;
            overflow:hidden;
            display:-webkit-box;
            color:#4a4a4a;
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
            font-size: 14px;
            font-weight: 600;
            padding-left: 4px;
        }
    </style>
</head>
<body>
    @include('header')

    <!--<div class="cover"> 
        <div class="welcome-section">
            <div class="welcome-title">
                Event is here
            </div>
            <div class="welcome-subtitle">
                Find your passionate event
            </div>
        </div>
    </div>-->
    <div class="container">
        <div class="section-activity">
            <div class="section-title">
                Event Active
            </div>
            <div class="row">
                @foreach ($event as $e)
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="card">
                            <div class="card-img-container">
                                <img src="{!! URL::asset('img/logo.jpg') !!}" alt="logo" class="logo">
                            </div>
                        </div>
                        <div class="desc">
                            <div class="desc-title">
                                {{ $e->event_topic }}
                            </div>
                            <div class="category-section">
                                <div class="category-location">
                                    {{ $e->event_location }} {{ $e->event_addr }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('footer')
</body>
</html>
