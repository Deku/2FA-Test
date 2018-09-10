<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>2FA Technical Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background: #243e4f url("{{ asset('/images/seth-macey-399377-unsplash.jpg') }}") no-repeat center center;
                color: #fff;
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
                flex-flow: column wrap;
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
                font-size: 48px;
            }

            .title small {
                display:block;
                font-size: .7em;
                color: #444;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .btn {
                background-color: #fff;
                color: #004080;
                font-size: 1.3em;
                padding: .5em 1em;
                border-radius: 5px;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Two Factor Authenticator Technical Test
                    <small>by Deku</small>
                </div>
                <div class="m-b-md">
                    <a class="btn" href="{{ URL::to('/login') }}">Login</a>
                    <a class="btn" href="{{ URL::to('/register') }}">Register</a>
                </div>
            </div>
        </div>
    </body>
</html>
