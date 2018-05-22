<?php $user=Auth::user();?>

        <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/app.css')}}"/>
</head>
<body>
<div id="app">
    <div class="navbar">
        <nav>
            <ul id="slide-out" class="sidenav sidenav-fixed">
                <li><div class="user-view">
                        <div class="background">
                            <img src="images/office.jpg">
                        </div>
                        <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
                        <a href="#name"><span class="white-text name">John Doe</span></a>
                        <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                    </div></li>
                <li><a href="#!"><i class="fa fa-folder fa-2x left"></i>Áreas</a></li>
                <li><div class="divider"></div></li>
                <li><a href="#!"><i class="fa fa-folder-o fa-2x left"></i>Materias</a></li>
                <li><a href="#!"><i class="fa fa-folder-open fa-2x left"></i>Exámenes</a></li>
                <li><a href="#!"><i class="fa fa-folder fa-2x left"></i>Talleres</a></li>
            </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fa fa-bars"></i></a>

            <div class="nav-wrapper blue darken-4">
                <span class="brand-logo">@yield('bar_title','Workshopp')</span>

                <!--RIGHT MENU-->
                <ul class="right">
                    <li>
                        <a class="dropdown-trigger" href="#!" data-activates='menu_profile'>
                            <i class="fa fa-user-circle"></i> <span class="hide-on-small-only">{{$user->name}}</span>
                            <i class="fa fa-caret-down right"></i>
                        </a>
                    </li>
                </ul>

                <!-- menu_perfil -->
                <ul id="menu_profile" class="dropdown-content" style="width:200px;">
                    <li><a href="#!"><i class="material-icons">account_circle</i>{{$user->name}}</a></li>
                    <li class="divider"></li>
                    <li>
                        <a onclick="document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @yield('content')
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, null);
    });
</script>
</body>
</html>
