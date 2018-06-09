<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Workshopp</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/app.css')}}"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            background-image: url("img/landing.png");
            background-repeat: no-repeat;
            background-position: left bottom;
            background-size: 30%;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div>

    <div class="content">

        <div class="title">
            Workshopp
        </div>
        <div><h3>Academia colaborativa</h3></div>

        <div class="links">
            <a href="https://www.ucc.edu.co">Universidad Cooperativa de Colombia</a>
        </div>

        <div class="row">
            <div class="col s12">
                <div class="col s4 offset-s4">

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="input-field col s12 has-error">
                            <i class="fa fa-user prefix"></i>
                            <input id="email" type="text" name="email" class="validate {{$errors->any()? 'invalid':''}}" value="{{ old('email') }}" required autofocus>
                            <label for="email">Usuario</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="fa fa-lock prefix"></i>
                            <input id="password" type="password" name="password" class="validate {{$errors->any()? 'invalid':''}}" required>
                            <label for="password">Contraseña</label>
                        </div>

                        <div class="input-field col s12">
                            <button type="submit" class="btn btn-primary">
                                Iniciar Sesión
                            </button>
                        </div>

                    <!--
                        <p class="right-align">
                            <a href="{{ route('password.request') }}">
                                Olvidé mi contraseña
                            </a>
                        </p>
                        -->


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
