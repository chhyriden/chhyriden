<nav class="navbar has-shadow">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item" href="{{route('dashboard')}}">
                <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma logo">
            </a>
            <a class="nav-item is-hidden-desktop" id="admin-slideout-btn">
                    @if(\Request::is('manage', 'manage/*'))
                    <span class="icon"><i class="fa fa-arrow-circle-right"></i> </span>
                @endif
            </a>
            <a class="nav-item is-tab is-hidden-mobile">Learn</a>
            <a class="nav-item is-tab is-hidden-mobile">Love</a>
            <a class="nav-item is-tab is-hidden-mobile">Share</a>
        </div>
    @guest
        <div class="nav-right is-hidden-mobile">
            <a class="nav-item is-tab" href="{{route('login')}}">
                <i class="fa fa-sign-in fa-fw" aria-hidden="true"></i>&nbsp; Login
            </a>
            <a class="nav-item is-tab" href="{{route('register')}}">
                <i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>&nbsp; Register
            </a>
        </div>
    @else
        <div class="dropdown is-hoverable is-hidden-mobile">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="#">
                    <figure class="image is-24x24" style="margin-right: 8px;">
                        <img src="https://bulma.io/images/jgthms.png">
                    </figure> {{Auth()->user()->name}}
                </a>
            </div>
            <div class="dropdown-menu">
                <div class="dropdown-content">
                    <a class="dropdown-item" href="/">
                        <i class="fa fa-globe fa-fw" aria-hidden="true"></i>&nbsp; View Sites
                    </a>
                    <a class="dropdown-item is-active" href="#">
                        <i class="fa fa-bell fa-fw" aria-hidden="true"></i>&nbsp; Notifications
                    </a>
                    <a class="dropdown-item" href=" {{route('manage.dashboard')}} ">
                        <i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i>&nbsp; Manage
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-sliders fa-fw" aria-hidden="true"></i>&nbsp; Settings
                    </a>
                    <hr class="m-t-5 m-b-5">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&nbsp; Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    @endguest
    </div>
</nav>