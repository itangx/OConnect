<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Oconnect</title>
    
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
    font-size:22px;
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
    padding: 24px;
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
th,td{
    text-align: center;
}@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 1%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "บริษัท"; }
	td:nth-of-type(2):before { content: "จองเวลา"; }
}
}
</style>
</head>
<body>
    <header>
        <div class="container">
            <h1><a class="navbar-brand" href="/"><span>O</span>Connect</a></h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
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
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-8">
                <div class="bg">
                    <div class="desc">
                        <div class="title">
                            <center>    
                                ผู้ที่สนใจเข้าร่วม
                                @foreach ($event as $e)
                                <form action="/event/{{$e->event_id}}/search" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @endforeach
                                    <input type="text" name="criteria" value="{{$criteria}}" style="width:50%">
                                    <button type="submit"><img src="{!! URL::asset('img/search.png') !!}" style="width:20px;height:20px;" alt="cover"></button>
                                </form>
                            </center>
                        </div>
                        @if(isset($buyer[0]))
                            <table class="table">
                                <thead class="thead-inverse">
                                    <tr>
                                    
                                        <th>บริษัท</th>
                                        <th>จองเวลา</th>
                                                                  
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $parameter= Crypt::encrypt($criteria)
                                ?>
                                @foreach ($buyer as $b)
                                    <tr>
                                       
                                        
                                        <td>{{$b->corp_name}}</td>
                                        <td><a href="/event/appointment/{{$parameter}}/{{$b->corp_per_rel_id}}"><img src="{!! URL::asset('img/datetime.png') !!}" style="width:20px;height:20px;" alt="cover"></a></td>
                                        <!-- <td scope="row">{{ $loop->iteration }}</td> -->
                                        <!-- <td>{{$b->person_name}}</td>
                                        <td>{{$b->person_mob}}</td>
                                        <td>{{$b->person_email}}</td> -->
                                        <!-- @if($b->DATE_DIFF_X != '')
                                            <td>{!! str_replace(',', '<br>', $b->DATE_DIFF_X) !!}</td>
                                        @else
                                            <td> ยังไม่ถูกจอง </td>
                                        @endif -->
                                        
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <center style="padding-top:15px;">
                                <span style="font-size:20px;">ไม่พบผู้ที่สนใจเข้าร่วม</span>
                            <center>
                        @endif
                    </div>
                </div>
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
