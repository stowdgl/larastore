<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <script>

    </script>
    <link href="{{ URL::asset('css/bootstrap.css')}}" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet"/>
    <!-- font awesome styles -->
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <!--[if IE 7]>
    <link href="{{ URL::asset('css/font-awesome-ie7.min.css')}}" rel="stylesheet">
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ URL::asset('ico/favicon.ico')}}">
</head>
<body>

<!--
	Upper Header Section
-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="topNav">
        <div class="container">
            <div class="alignR">
                <div class="pull-left socialNw">
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-youtube"></span></a>
                    <a href="#"><span class="icon-tumblr"></span></a>
                </div>
                <a href="/"> <span class="icon-home"></span> Home</a>
                @if(auth()->check())
                    <a class="" href="#"> <span class="icon-user" style="margin-right: 5px;"></span>{{auth()->user()->fname}}</a>

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="icon-user">{{ Auth::user()->name }} </span> <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>


                @else
                    <a class="" href="#"> <span class="icon-user"></span> My Account</a>
                    @if (Route::has('reg'))
                        <a href="{{ route('login') }}"><span class="icon-user">Sign In</span> </a>
                    @endif


                    @if (Route::has('reg'))
                        <a href="{{route('reg')}}"><span class="icon-user">Sign Up</span>  </a>
                    @endif



                @endif



                <a href="contact.html"><span class="icon-envelope"></span> Contact us</a>
                <a href="cart.html"><span class="icon-shopping-cart"></span> 2 Item(s) - <span class="badge badge-warning"> $448.42</span></a>
            </div>
        </div>
    </div>
</div>

