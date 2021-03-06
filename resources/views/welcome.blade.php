<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Citado</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
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

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        body {
            background-image: url('{{asset('res2.jpg')}}');
            background-size: 1700px 2024px
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Citado restaurant
        </div>

        <div class="links">
            <a href="{{route('show.get')}}">New order</a>
            <a href="{{route('buy.get')}}">Buy</a>
            <a href="{{route('users.all.get')}}">Users</a>
            <a href="{{route('foods.all.get')}}">Foods</a>
            <a href="{{route('bikes.all.get')}}">Bikes</a>
            <a href="{{route('shops.all.get')}}">Shops</a>
            <a href="{{route('show.get2')}}">Purchased</a>
            <a href="{{route('stats')}}">Statistics</a>
            <a href="{{route('logs')}}">Logs</a>
            <a href="{{route('tables')}}">Manage Tables</a>

        </div>
    </div>
</div>
</body>
</html>
