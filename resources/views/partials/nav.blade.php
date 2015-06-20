<nav class="navbar navbar-default" style="background-color: #FFFFFF;">
    <div class="container">
        <div class="navbar-header" style="padding: 7px;">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Wanarupa</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding: 7px;">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @elseif (Auth::user())
                    <div class="nav-icon-container" style="float: left; border-right: 1px solid #DDD;">
                        <a href="#">
                            <div class="nav-icon"><i class="nav-icon-text fa fa-plus"></i></div>
                        </a>
                        <a href="#">
                            <div class="nav-icon"><i class="nav-icon-text fa fa-envelope-o"></i></div>
                            <span class="badge nav-icon-badge badge-message">8</span>
                        </a>
                        <a href="#">
                            <div class="nav-icon"><i class="nav-icon-text fa fa-bullhorn"></i></div>
                            <span class="badge nav-icon-badge badge-notif">4</span>
                        </a>
                        <a href="#">
                            <div class="nav-icon"><i class="nav-icon-text fa fa-shopping-cart"></i></div>
                            <span class="badge nav-icon-badge badge-sell">12</span>
                        </a>
                    </div>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <div class="nav-image-container">
                                <img class="nav-icon" style="padding: 0;" src="http://localhost:8000/image/1.jpg" alt="profile"/>
                            </div>
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-th-large"></i> &nbsp; Dashboard</a></li>
                            <li><a href="{{ url('/upload') }}"><i class="fa fa-upload"></i> &nbsp; Upload</a></li>
                            <li><a href="{{ url('/artist', Auth::user()->username )}}"><i class="fa fa-user"></i> &nbsp; Profile</a></li>
                            <li><a href="{{ url('/artist/dashboard') }}"><i class="fa fa-envelope-o"></i> &nbsp; Message</a></li>
                            <li><a href="{{ url('/artist/dashboard') }}"><i class="fa fa-bullhorn"></i> &nbsp; Notification</a></li>
                            <li><a href="{{ url('/artist/dashboard') }}"><i class="fa fa-shopping-cart"></i> &nbsp; Order</a></li>
                            <li><a href="{{ url('/artist/dashboard') }}"><i class="fa fa-cogs"></i> &nbsp; Setting</a></li>

                            <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-close"></i> &nbsp;Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>