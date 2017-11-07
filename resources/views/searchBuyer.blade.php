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
            src: url({!! URL::asset('font/THSarabunNew.ttf') !!});
}
html, body {
    font-family: sarabun;
    background-color: #F4F8FB;
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
.bg{
    background-color: #f5f5f5;
    border:1px solid #dddddd;
    border-radius:4px;
    margin: 15px;
}
.card-img-container{
    width:100%;
    position: relative;
    overflow: hidden;
}
.desc{
    padding: 15px;
}
.title{
    font-size: 30px;
    font-weight: bold;
}
.description{
    font-size: 24px;
    line-height: 1em;
    padding-bottom: 5px;
}
.location{
    font-size: 24px;
}
.date{
    font-size: 24px;
}
.time{
    font-size: 24px;
}
.ccontract{
    font-size: 24px;
}
.ffacebook{
    font-size: 24px;
}
</style>
</head>
<body>
    <header>
        <div class="container">
        <h1><a class="navbar-brand"><span>O</span>Connect</a></h1>
        </div>
    </header>

    <div class="container">
        <div class="bg">
            <div class="card-img-container">
                <img src="{!! URL::asset('img/logo.jpg') !!}" alt="logo" class="logo">
            </div>
            <div class="desc">
                @foreach ($event as $e)
                <div class="title">
                    {{$e->event_topic}}
                </div>
                <div class="description">
                    {{$e->event_description}}
                </div>
                <div class="location">
                    <img src="{!! URL::asset('img/location.png') !!}" style="width:20px;height:20px;" alt="cover">
                    {{$e->event_location}} จังหวัด {{$e->event_province}}
                </div>
                <div class="date">
                    <img src="{!! URL::asset('img/datetime.png') !!}" style="width:20px;height:20px;" alt="cover">
                    {{\Carbon\Carbon::parse($e->event_std_date)->format('d/m/Y')}} -
                    {{\Carbon\Carbon::parse($e->event_end_date)->format('d/m/Y')}}
                </div>
                <div class="time">
                    <img src="{!! URL::asset('img/time.png') !!}" style="width:20px;height:20px;" alt="cover">
                    {{\Carbon\Carbon::parse($e->event_std_time)->format('H:i')}} -
                    {{\Carbon\Carbon::parse($e->event_end_time)->format('H:i')}}
                </div>
                <div class="ccontract">
                    <img src="{!! URL::asset('img/contract.png') !!}" style="width:20px;height:20px;" alt="cover">
                    <a href="https://{{$e->event_website}}" >{{$e->event_website}}</a>
                </div>
                <div class="ffacebook">
                    <img src="{!! URL::asset('img/ffacebook.png') !!}" style="width:20px;height:20px;" alt="cover">
                    <a href="https://{{$e->event_facebook}}" >{{$e->event_facebook}}</a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="bg">
            <div class="desc">
                <div class="title">
                    <center>    
                    @if(isset($buyer))
                        รายละเอียดผู้ที่สนใจเข้าร่วม
                    @else
                        ค้นหาผู้ที่สนใจเข้าร่วม (ค้นหาได้ทั้งชื่อคนและชื่อบริษัท)
                        @foreach ($event as $e)
                        <form action="/event/{{$e->event_id}}/search" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @endforeach
                            <input type="text" name="criteria" style="width:50%">
                            <button type="submit"><img src="{!! URL::asset('img/search.png') !!}" style="width:20px;height:20px;" alt="cover"></button>
                        </form>
                    @endif
                    </center>
                </div>
            </div>
        </div>
    </div>
    
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
