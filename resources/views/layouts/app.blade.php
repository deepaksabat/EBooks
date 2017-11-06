<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IT EBOOKS') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script >
    $(document).ready(function() {
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
    });
});
</script>
<style>
        body {
            font-family: 'Lato';
            background-color: #252525; color:#1b1b1b;
        }

        .fa-btn {
            margin-right: 6px;
        }
         .navbar-static-top
        {
          background-color: #1b1b1b;
        }

        .footerWrap {
        width: 100%;
        position: relative;
        bottom: 0;
        left: 0;
        height: 100%;
    }

    .footer {
        position: fixed;
        width: 50%px;
        margin: auto;
    }

    .footerContent {
        float: left;
        width: 100%;
        background-color: #1b1b1b;
        padding: 20px 0;
    }

    .footer p {
        float: left;
        width: 100%;
        text-align: center;
    }
         ul li a.active {
            border-bottom: 3px solid #eef0f1;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="color:#eef0f1">
                        {{ config('app.name', 'IT EBOOKS') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::check())
                    <ul class="nav navbar-nav">
                    <li><a class="{{ Request::segment(1) ==  'books' ? 'active' : ''  }}" style="color:#FFFFFF" href="{{ url('/books') }}">Book</a></li>
                    <li><a class="{{ Request::segment(1) ==  'category' ? 'active' : ''  }}" style="color:#FFFFFF" href="{{ url('/category') }}">Category</a></li>
                    </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}" style="color:#eef0f1">Login</a></li>
                            <li><a href="{{ route('register') }}" style="color:#eef0f1">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:#eef0f1">
                                    {{ Auth::user()->name }} <span class="caret" ></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <div class="footerWrap">
        <div class="footerContent">
            <footer class="container-fluid text-center ">
                <p style="color:#eef0f1">Copyright © It-ebooks All rights reserved</p>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
