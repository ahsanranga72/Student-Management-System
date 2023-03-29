<!--menu start-->
<div class="menu">
    <div class="navbar-wrapper">
        <div class="container">
            <!-- Navbar start -->
            <div class="navwrapper">
                <div class="navbar navbar-inverse navbar-static-top">
                    <div class="container">
                        <div class="logo" style="margin-top: 0px;">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('public/assets/frontend') }}/logo/new.png"
                                    alt="logo" style="width: 80px;">
                            </a>
                        </div>
                        <nav class="navArea">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse"> <span class="icon-bar"></span> <span
                                        class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav" id="navigation">
                                    <li class="menuItem" id="home"><a href="#wrapper">Home</a></li>
                                    <li class="menuItem"><a href="#courses">courses</a></li>
                                    <li class="menuItem"><a href="#faculties">faculties</a></li>
                                    <li><a href="{{ route('frontend.about-us') }}">About us</a></li>
                                    @if(auth()->check())
                                        <li>
                                            <a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                                href="javascript:void(0)">Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}"
                                                method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    @else
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Navbar end -->
        </div>
    </div>
</div>
<!--menu end-->
