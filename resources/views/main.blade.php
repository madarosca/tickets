<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ticket Management</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">

        <!-- Styles -->
        <style>
            html, body {
                background-color:#050E7D;
                color: #ddd;
                font-family: "Roboto";
                font-weight: 500;
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
                font-size: 4vw;
                color:#ddd !important;
                text-shadow: 0px 0px 8px #000;
            }

            .links > a {
                color:#ddd !important;
                padding: 0 15px;
                font-size: 14px;
                font-weight: 400;
                text-decoration: none;
                text-shadow: 0px 0px 8px #000;
            }

            .logo {
            	width: 8%;
            	margin-right: 30px;
            }

            img {
            	width: 90%;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="logo">
            	<img src="img/logo.png">
            </div>
            
            <div class="content">
                <div class="title m-b-md">
                    Ticket Management
                </div>
            </div>
        </div>
    </body>
</html>