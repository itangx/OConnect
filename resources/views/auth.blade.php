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
        <form class="login-form">
            <p class="topic">OConnect</p><br>
            <input type="text" placeholder="Username" />
            <input type="password" placeholder="Password" />
            <button>login</button>
            <p class="message"><a href="#">Reset Password</a></p>
            <p class="message">Sign in to meet your partners!</p>
            <p class="message"><a href="/activate">Go to Activate Page (For Testing)</a></p>
        </form>
      </div>
    </div>
</body>
</html>
