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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            font-size:22px;
        }
        .boxes-title{
            border: 1px solid black;
            border-radius: 5px;
            margin-bottom: 2px;
            font-weight: bold;
            text-align: center;
            height: 63px;
        }
        .text{
            -webkit-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
            position: absolute;
            top: 50%;
            left: 50%;
        }
        .boxes-sub{
            border: 1px solid black;
            border-radius: 5px;
            margin-bottom: 2px;
            text-align: center;
            background-color: #00838F;
            color: white;
            height: 63px;
        }
        .boxes-company{
            border: 1px solid black;
            margin-top: 2px;
            margin-bottom: 2px;
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 25px;
            font-weight: bold;
            border-radius: 5px;
        }
        .boxes-date{
            border: 1px solid #00838F;
            border-radius: 5px;
            text-align: center;
            padding: 5px;
        }
        .boxes-date-active{
            border: 1px solid #00838F;
            border-radius: 5px;
            background-color: #00838F;
            color: white;
            text-align: center;
            padding: 5px;
        }
        .boxes-time{
            border: 1px solid black;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .boxes-subtime{
            border: 1px solid #E0E0E0;
            border-radius: 5px;
            padding-left: 15px;
            padding-right: 15px;
            float:left;
            margin-top:3px;
            text-align: center;
        }
        .boxes-subtime-active{
            border: 1px solid #E0E0E0;
            border-radius: 5px;
            padding-left: 15px;
            padding-right: 15px;
            float:left;
            margin-top:3px;
            text-align: center;
            background-color: #D50000;
            color:white;
        }
        .boxes-more{
            border: 1px solid white;
            background-color: #00838F;
            color: white;
        }
        .booked{
            float:left;
            margin-top:3px;
            padding-left:15px;
            font-weight:bold;
            color:gray;
        }
        .icon-booked{
            float:right;
            display:flex;
            margin-top:3px;
            color:gray;
        }
        .active{
            float:left;
            margin-top:3px;
            padding-left:15px;
            font-weight:bold;
            color:black;
        }
        .icon-active{
            float:right;
            display:flex;
            margin-top:3px;
            color:#00838F;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 boxes-title">
                <div class="text">
                    Plan Appointments
                </div>
            </div>
            <div class="col-xs-4 boxes-sub">
                <div class="text">
                    View Schedule
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 boxes-date-active">
                14 DEC 2017
            </div>
            <div class="col-xs-4 boxes-date">
                14 DEC 2017
            </div>
            <div class="col-xs-4 boxes-date">
                14 DEC 2017
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 boxes-company">
                Company 1
            </div>
        </div>

        <div class="row" onclick="confirm_appointment()">
            <div class="col-xs-12 boxes-time" style="border-bottom:0px;">
                <div class="boxes-subtime">
                    08:00 - 08:30
                </div>              
                <div class="active">
                    Available
                </div>              
                <div class="icon-active">
                    <i class="material-icons" style="font-size:35px">play_arrow</i>
                </div>
            </div>
        </div>
        <div class="row" onclick="confirm_appointment()">
            <div class="col-xs-12 boxes-time" style="border-bottom:0px;">
                <div class="boxes-subtime">
                    08:00 - 08:30
                </div>              
                <div class="active">
                    Available
                </div>              
                <div class="icon-active">
                    <i class="material-icons" style="font-size:35px">play_arrow</i>
                </div>    
            </div>
        </div>
        <div class="row" onclick="confirm_appointment()">
            <div class="col-xs-12 boxes-time" style="border-bottom:0px;">
                <div class="boxes-subtime">
                    08:00 - 08:30
                </div>              
                <div class="active">
                    Available
                </div>              
                <div class="icon-active">
                    <i class="material-icons" style="font-size:35px">play_arrow</i>
                </div>
            </div>
        </div>
        <div class="row" onclick="confirm_appointment()">
            <div class="col-xs-12 boxes-time" style="border-bottom:0px;">
                <div class="boxes-subtime">
                    08:00 - 08:30
                </div> 
                <div class="active">
                    Available
                </div>              
                <div class="icon-active">
                    <i class="material-icons" style="font-size:35px">play_arrow</i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 boxes-time" style="border-bottom:0px;">
                <div class="boxes-subtime-active">
                    08:00 - 08:30
                </div>
                <div class="booked">
                    booked
                </div>              
                <div class="icon-booked">
                    <i class="material-icons" style="font-size:35px">play_arrow</i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 boxes-time" style="border-bottom:0px;">
                <div class="boxes-subtime-active">
                    08:00 - 08:30
                </div>
                <div class="booked">
                    booked
                </div>              
                <div class="icon-booked">
                    <i class="material-icons" style="font-size:35px">play_arrow</i>
                </div>
            </div>
        </div>
        <div class="row" onclick="confirm_appointment()">
            <div class="col-xs-12 boxes-time">
                <div class="boxes-subtime">
                    08:00 - 08:30
                </div>
                <div class="active">
                    Available
                </div>              
                <div class="icon-active">
                    <i class="material-icons" style="font-size:35px">play_arrow</i>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 boxes-more">
                see more
            </div>
        </div>

    </div>
</div>
</body>
<script>
    function confirm_appointment() {
        confirm("Are you sure you want to schedule an appointment with Company 1")
    }
</script>
</html>
