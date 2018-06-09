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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</head>
<body>
<div id="app">

    @if(Session::has('success'))
        <script>
            var $toastContent='<span><i class="fa fa-info left"></i>{{Session::get('success')}}</span>';
            M.toast({html:$toastContent,classes:'green darken-3'});
        </script>
    @endif

    @if(Session::has('message'))
        <script>
            var $toastContent='<span><i class="fa fa-info left"></i>{{Session::get('message')}}</span>';
            M.toast({html:$toastContent});
        </script>
    @endif

    @if(Session::has('danger'))
        <script>
            var $toastContent='<span><i class="fa fa-info left"></i>{{Session::get('danger')}}</span>';
            M.toast({html:$toastContent, classes:'red darken-3'});
        </script>
    @endif

    @if($errors->any())
        <script>
            var $toastContent='<span><i class="fa fa-info left"></i>';
            @foreach($errors->all() as $error)
                $toastContent=$toastContent+'- {{$error}} ';
            @endforeach
                $toastContent=$toastContent+'</span>';

            M.toast({html:$toastContent, classes:'red darken-3'});
        </script>
    @endif

    <div class="navbar">
        <nav>
            <ul id="slide-out" class="sidenav sidenav-fixed">
                <li>
                    <div class="user-view">
                        <a href="#user"><img class="" src="{{asset('img/ucc.png')}}"></a>
                    </div>
                </li>
                <li><div class="divider"></div></li>
                <li class="@yield('areas')"><a href="{{route('area.index')}}"><i class="fa fa-folder fa-2x left"></i>Áreas</a></li>
                <li class="@yield('course')"><a href="{{route('course.index')}}"><i class="fa fa-folder-o fa-2x left"></i>Materias</a></li>
                <li class="@yield('document')"><a href="{{route('document.index')}}"><i class="fa fa-file fa-2x left"></i>Documentos</a></li>
            </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fa fa-bars"></i></a>

            <div class="nav-wrapper blue darken-4">
                <span class="brand-logo">@yield('bar_title','Workshopp')</span>

            @if(isset($user))
                <!--RIGHT MENU-->
                    <ul class="right">
                        <li>
                            <a class="dropdown-trigger" href="#!" data-target='menu_profile'>
                                <i class="fa fa-user-circle"></i> <span class="hide-on-small-only">{{$user->name}}</span>
                                <i class="fa fa-caret-down right"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- menu_perfil -->
                    <ul id="menu_profile" class="dropdown-content" style="width:300px;!important">
                        <li><a href="#!"><i class="fa fa-user-circle"></i>{{$user->name}}</a></li>
                        <li class="divider"></li>
                        <li>
                            <a onclick="document.getElementById('logout-form').submit();"><i class="fa fa-remove"></i>Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                @endif
            </div>
        </nav>
    </div>
    @yield('content')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, null);

        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems, {constrainWidth:false});

        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, null);
        console.log('init');
    });
</script>
</body>
</html>
