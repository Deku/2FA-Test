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

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .form > * {
                margin-bottom: 10px;
            }

            input {
                font-size: 24px;
                border: none;
            }

            input[type="text"] {
                width: 4em;
                letter-spacing: 3px;
                padding: 10px;
            }

            input[type="submit"] {
                padding: .5em 1em;
                background-color: #407795;
                color: #fff;
                border-radius: 5px;
            }

            .alert {
                border-radius: 5px;
                box-shadow: #444 2px 2px 2px;
                padding: .5em 1em;
                margin-bottom: 10px;
            }

            .success {
                background-color: #b9ffb9;
                color: #008000;
            }

            .error {
                background-color: #ff9393;
                color: #800000;
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

                <img src="<?php echo $qrCode ?>" alt="Verify code"/>
                <p>{{ $secret }}</p>
                <?php if (isset($result)) { ?>
                    <div class="alert <?php echo $result[0] ? 'success' : 'error'; ?>">
                        <?php echo $result[1]; ?>
                    </div>
                <?php } ?>
                <form action="{{ URL::to('/check') }}" method="POST" class="form flex-center">
                    {{ csrf_field() }}
                    <input type="text" name="code" maxlength="6"/>
                    <input type="Submit" class="btn" value="Verificar"/>
                </form>
            </div>
        </div>
    </body>
</html>
