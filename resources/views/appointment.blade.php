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
    <link href="{!! URL::asset('css/bootstrap-datetimepicker.min.css') !!}" rel="stylesheet" type="text/css" media="all" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{!! URL::asset('js/jquery-3.2.1.min.js') !!}"></script>
    <script src="{!! URL::asset('js/moment.min.js') !!}"></script>
    <script src="{!! URL::asset('js/bootstrap-datetimepicker.min.js') !!}"></script>

 
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

    .day{
        background-color: #B2FF59;
        border-radius: 0;
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
	
	tr { border: 2px solid #ccc; }
	
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
		top: -3px;
		left: 1px;
		width: 1%; 
		padding-right: 10px; 
		white-space: nowrap;
	}

	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "#"; }
	td:nth-of-type(2):before { content: "ชื่อ"; }
	td:nth-of-type(3):before { content: "เบอร์โทร"; }
	td:nth-of-type(4):before { content: "อีเมล์"; }
	td:nth-of-type(5):before { content: "บริษัท"; }
	td:nth-of-type(6):before { content: "เวลาที่ถูกจองไว้แล้ว"; }
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
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="bg">
                    <div class="desc">
                        @foreach ($buyer as $b)
                        <div class="title">
                            <center>    
                                จองเวลานัด
                                <form action="/event/appointment" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="rel" value="{{$b->corp_per_rel_id}}">
                                    <input type="hidden" id="criteria" name="criteria" value="{{$criteria}}">
                                    @foreach ($event as $e)
                                    <input type="hidden" name="eid" value="{{$e->event_id}}">
                                    @endforeach
                                    <input type="hidden" id="stddt" name="stddt" value="">
                                    <input type="hidden" id="enddt" name="enddt" value="">
                                    <span style="font-size:20px">เริ่ม</span>
                                    <input type="text" value="" id="stdDatetime" name="stdDatetime" required="true" class="form_datetime1" readonly="true">
                                    <span style="font-size:20px">ถึง</span>
                                    <input type="text" value="" id="endDatetime" name="endDatetime" disabled required="true" class="form_datetime2" readonly="true">
                                    <button type="submit"><img src="{!! URL::asset('img/click.png') !!}" style="width:20px;height:20px;" alt="cover"></button>
                                </form>
                            </center>
                            <br>
                        </div>
                        <div id="dp">
                            
                        
                        </div>
                        <table class="table">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อ</th>
                                    <th>เบอร์โทร</th>
                                    <th>อีเมล์</th>
                                    <th>บริษัท</th>
                                    <th>เวลาที่ถูกจองไว้แล้ว</th>
                                </tr>
                            </thead>
                            <tbody>                            
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{$b->person_name}}</td>
                                    <td>{{$b->person_mob}}</td>
                                    <td>{{$b->person_email}}</td>
                                    <td>{{$b->corp_name}}</td>
                                    @if($b->DATE_DIFF_X != '')
                                    <td>{!! str_replace(',', '<br>', $b->DATE_DIFF_X) !!}</td>
                                    @else
                                    <td> ยังไม่ถูกจอง </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
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
</div>
</body>
@foreach ($event as $e)
<script type="text/javascript">
    var stddate = new Date("{{$e->event_std_date}}");
    var enddate = new Date("{{$e->event_end_date}}");

    $(".form_datetime1").datetimepicker({
        startDate: stddate, 
        endDate: enddate,
        format: 'dd/mm/yyyy hh:ii', 
        minuteStep: 30,
        disabledHours: [0, 1, 2, 3, 4, 5, 6, 7, 8, 21, 22, 23, 24], 
        autoclose:true}
    ).on('changeDate', function(ev){
        var minDate = new Date(ev.date.valueOf());
        var stdDatetime = moment(minDate).format('YYYY-MM-DD HH:mm') ;
        $.ajax({
            type: 'POST',
            url:'/checkDate',
            data: {
                stdDatetime: stdDatetime,
                check: 'start',
                _token: "{{csrf_token()}}"
            },
            success:function(result){
                if(result == ''){
                    $('#stddt').val(stdDatetime);
                    $('.form_datetime2').prop('disabled', false);
                    $('.form_datetime2').datetimepicker('setStartDate', minDate); 
                } else {
                    alert('ไม่สามารถจองเวลาซ้ำกันได้ครับ') ;
                    $('.form_datetime1').val('');
                    $('.form_datetime2').val('');
                    $('.form_datetime2').prop('disabled', true);
                }
            }
        });      
    });
    $(".form_datetime2").datetimepicker({
        startDate: stddate, 
        endDate: enddate, 
        format: 'dd/mm/yyyy hh:ii', 
        minuteStep: 30, 
        autoclose:true}
    ).on('changeDate', function(ev){
        var maxDate = new Date(ev.date.valueOf());
        var endDatetime = moment(maxDate).format('YYYY-MM-DD HH:mm') ;
        var stdDatetime = moment($('#stddt').val()).format('YYYY-MM-DD HH:mm') ;

        $.ajax({
            type: 'POST',
            url:'/checkDate',
            data: {
                stdDatetime: stdDatetime,
                endDatetime: endDatetime,
                check: 'end',
                _token: "{{csrf_token()}}"
            },
            success:function(result){
                console.log(result);
                if(result == ''){
                    $('#enddt').val(endDatetime);
                    $('.form_datetime1').datetimepicker('setEndDate', maxDate);
                } else {
                    alert('ไม่สามารถจองเวลาซ้ำกันได้ครับ') ;
                    $('.form_datetime2').val('');
                }
            }
        });       
    });

</script>
@endforeach
</html>
