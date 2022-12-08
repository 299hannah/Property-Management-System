<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-xl-2">
                <h1 class="mb-0 site-logo m-0 p-0"><a href="{{ url('/') }}" class="mb-0">P m S</a></h1>
            </div> 
            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                        <li><a href="#properties-section" class="nav-link">Properties</a></li>
                        <li><a href="#agents-section" class="nav-link">Agents</a></li> 
                        <li><a href="#services-section" class="nav-link">About</a></li>
                        <li><a href="#contact-section" class="nav-link">Contact</a></li> 
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/login') }}" >{{ __('Login') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <div class=" dropdown-item">
                                    <a href="{{ url('/home') }}" class="btn btn-default btn-flat text-black">home</a>
                                </div>
                                <div class=" dropdown-item">
                                    <a href="{{ route('tenant.profile') }}" class="btn btn-default btn-flat text-black">Profile</a>
                                </div>
                                <div class=" dropdown-item">
                                <a  href="{{ route('logout') }}" class="text-black"  onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                               
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            </div>
                        </li>
                        @endguest
                    </ul>
                    </ul>
                </nav>
            </div>
            <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>
        </div>
    </div>
</header>















