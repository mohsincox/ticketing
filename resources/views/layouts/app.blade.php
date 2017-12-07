<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arla</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    @yield('style')
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-static-top">
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
                <a style="color: #ffffff" class="navbar-brand" href="{{ url('/') }}">
                    ARLA Foods Ltd.
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- <li {{ (Request::is('home') ? 'class=active' : '') }}><a href="{{ url('/home') }}">Home</a></li> -->
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @else
                        <li {{ (Request::is('home') ? 'class=active' : '') }}><a href="{{ url('/home') }}">Home</a></li>
                        <li {{ (Request::is('user') ? 'class=active' : '') }}><a href="{{ url('/user') }}">User</a></li>
                        <li {{ (Request::is('ticket-type') ? 'class=active' : '') }} {{ (Request::is('ticket-type/create') ? 'class=active' : '') }}><a href="{{ url('/ticket-type') }}">Ticket Type</a></li>
                        <li {{ (Request::is('ticket-status') ? 'class=active' : '') }} {{ (Request::is('ticket-status/create') ? 'class=active' : '') }}><a href="{{ url('/ticket-status') }}">Ticket Status</a></li>
                        <li {{ (Request::is('ticket') ? 'class=active' : '') }} {{ (Request::is('ticket/create') ? 'class=active' : '') }}><a href="{{ url('/ticket') }}">Ticket</a></li>
                        <li {{ (Request::is('category') ? 'class=active' : '') }} {{ (Request::is('category/create') ? 'class=active' : '') }}><a href="{{ url('/category') }}">Category</a></li>
                        <li {{ (Request::is('sku-product') ? 'class=active' : '') }} {{ (Request::is('sku-product/create') ? 'class=active' : '') }}><a href="{{ url('/sku-product') }}">SKU Product</a></li>
                        <li {{ (Request::is('crm') ? 'class=active' : '') }} ><a href="{{ url('/crm') }}">CRM</a></li>

                        <li {{ (Request::is('crm/download-report-form') ? 'class=active' : '') }} class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Report Download <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li {{ (Request::is('crm/download-report-form') ? 'class=active' : '') }}><a href="{{ url('/crm/download-report-form') }}">Inbound Report Download</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container"> 
        @include('flash::message')
    </div>

    @yield('content')

    <div class="container-fluid" style="padding-right: 0px; padding-left: 0px;">
        <div style="background: #43474d;">
            <center><p style="font-family: 'Open Sans', serif; font-size: 12px; margin-top: 0px; padding: 10px;"><span style="color: #FFFFFF">Developed by</span> <a href="http://myolbd.com/" target="_blank" style="color: red;">MY Outsoursing Limited.</a> <span style="color: #FFFFFF">All Rights Reserved.</span></p></center>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    @yield('script')
</body>
</html>
