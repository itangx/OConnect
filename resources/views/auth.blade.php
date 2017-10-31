<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OConnect</title>
    <link href="{!! URL::asset('css/style.css') !!}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="login-page">
      <div class="form">
        <form class="login-form" action="/login" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p class="topic">OConnect</p><br>
            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}"/>
            <input type="password" name="password" placeholder="Password" />
            @if(isset($msg))
            <p style="color:red">{{$msg}}</p>
            @endif
            <button>login</button>
            <p class="message"><a href="#">Reset Password</a></p>
            <p class="message">Sign in to meet your partners!</p>
            <p class="message"><a href="/activate">Go to Activate Page (For Testing)</a></p>
        </form>
      </div>

    </div>
</body>
</html>