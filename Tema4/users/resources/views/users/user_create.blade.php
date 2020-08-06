<!DOCTYPE html>
<html lang="ro">
<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Welcome! What's your name?
        </div>
        <div style="font-size: 50px;">
            <form method="POST" action="{{action('UserController@store')}}">
                @csrf
                <label for="username"></label><input type="text" id="username" name="username" required>
                <input type="submit" value="Confirm">
            </form>
            <a href="{{action('BookController@index')}}">View database</a>
        </div>
    </div>
</div>
</body>
</html>
