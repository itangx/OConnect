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
    th,td{
        text-align: center;
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
                                    <input type="hidden" id="stddt" name="stddt" value="">
                                    <input type="hidden" id="enddt" name="enddt" value="">
                                    <span style="font-size:20px">เริ่ม</span>
                                    <input type="text" value="" id="stdDatetime" name="stdDatetime" required="true" class="form_datetime1">
                                    <span style="font-size:20px">ถึง</span>
                                    <input type="text" value="" id="endDatetime" name="endDatetime" disabled required="true" class="form_datetime2">
                                    <button type="submit"><img src="{!! URL::asset('img/click.png') !!}" style="width:20px;height:20px;" alt="cover"></button>
                                </form>
                            </center>
                            <br>
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
<script type="text/javascript">
    var date = new Date();
    date.setDate(date.getDate());

    $(".form_datetime1").datetimepicker({format: 'dd/mm/yyyy hh:ii', autoclose:true}).on('changeDate', function(ev){
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
    $(".form_datetime2").datetimepicker({startDate: date,format: 'dd/mm/yyyy hh:ii', autoclose:true}).on('changeDate', function(ev){
        var maxDate = new Date(ev.date.valueOf());
        var endDatetime = moment(maxDate).format('YYYY-MM-DD HH:mm') ;
        $.ajax({
            type: 'POST',
            url:'/checkDate',
            data: {
                endDatetime: endDatetime,
                check: 'end',
                _token: "{{csrf_token()}}"
            },
            success:function(result){
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
</html>
