<!doctype html>
<head>
    <title>Zone-Gamer :: @yield('title')</title>
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/zgm.css')}}
    <link media="all" type="text/css" rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
</head>
<html>
    <body onload="preload();"> 

    <div class="body">
        <div class="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ URL::to('') }}">Zone-Gamer 2.0 b1</a>
                <ul class="nav navbar-nav">
                    <li{{ Request::is('/') ? ' class="active"' : '' }}><a href="{{ URL::to('/') }}">Home</a></li>

                    @if(Auth::guest())
                    <!-- Guest Menu -->
                    <li{{ Request::is('register') ? ' class="active"' : '' }}><a href="{{ URL::to('register') }}">Register</a></li>
                    <li{{ Request::is('login') ? ' class="active"' : '' }}><a href="{{ URL::to('login') }}">Login</a></li>
                    @endif

                    @if(Auth::check())
                    <!-- Account Menu -->
                    <li class="{{ Request::is('account/*') ? 'active' : '' }} dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                          Account <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li{{ Request::is('account/view') ? ' class="active"' : '' }}><a href="{{ URL::to('account/view') }}">จัดการ Account</a></li>
                            <li{{ Request::is('account/profile') ? ' class="active"' : '' }}><a href="{{ URL::to('account/profile') }}">Profile</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                    @endif

                    <li{{ Request::is('help') ? ' class="active"' : '' }}><a href="{{ URL::to('help') }}">Help</a></li>
                </ul>
            </div>
        </div> 

        <div class="container">

            <div class="waitload">
                <div class="wait-text">
                    Loading ... 
                </div>
            </div>

            <div class="browser-error" style="display:none">
                <div class="browser-text">
                    <h2>Sorry !</h2>
                    Your browser is not support this website<br>
                    <h4>:: Download new browsers ::</h4>
                    <a href="http://www.google.com/chrome/" target="_blank">Google Chorme</a> >> Recommend << <br>
                    <a href="http://www.mozilla.org/" target="_blank">Firefox</a><br>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/ie-10-worldwide-languages" target="_blank">Internet Explorer 10</a>
                    <p>
                    Contant webmaster : admin@zone-gamer.th.ht 
                    </p>
                </div>
            </div>

        </div>

        <div class="container" style="display:none">
            <div class="content"><!-- Content -->
                @yield('content')
            </div>
            <div class="footer">
            <hr>
            {{PHP_Timer::resourceUsage()}} :: Script by Theballkyo
            </div>
        </div>
    </div>

    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    {{ HTML::script('js/zgm.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    <script>
    @yield('script')
    </script>
    </body>
</html>