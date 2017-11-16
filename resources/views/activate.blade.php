<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <title>OConnect</title>
    <link href="{!! URL::asset('/css/style.css') !!}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="login-page">
        <div class="form">
          <form class="login-form" action="/activated" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p class="topic">Activated User</p><br>
            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" />
            <input type="password" name="oldpassword" placeholder="Old Password" />
            <input type="password" name="newpassword1" placeholder="New Password" />
            <input type="password" name="newpassword2" placeholder="Re-New Password" />
            @if(isset($msg))
            <p style="color:red">{{$msg}}</p>
            @endif
            <button>Submit</button>
            <p class="message"><a href="/">Back to Login Page (For Testing)</a></p>
        </form>
        </div>
    </div>
</body>
</html>
