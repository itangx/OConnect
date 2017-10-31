<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OConnect</title>
    <link href="{!! URL::asset('/css/style.css') !!}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="login-page">
        <div class="form">
          <form class="login-form">
            <p class="topic">Activated User</p><br>
            <input type="text" placeholder="Username" />
            <input type="password" placeholder="Old Password" />
            <input type="password" placeholder="Re-Old Password" />
            <input type="password" placeholder="New Password" />
            <input type="password" placeholder="Re-New Password" />
            <button>Submit</button>
            <p class="message"><a href="/">Back to Login Page (For Testing)</a></p>
        </form>
        </div>
    </div>
</body>
</html>
