            <!-- preloader -->
            <div class="preloader">
              <div class="loader">
                <span class="dot"></span>
                <div class="dots">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </div>
            </div>
            <!-- /preloader -->

          <!-- dividers -->
          <div class="dividers">
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>
          </div>

          <header class="navigation">
            <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="index.html">YASSER</a>
              {{-- <img class="img-fluid" src="{{ asset('front/images/logo.png')}}" alt="parsa"> --}}
              <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navogation"
                aria-controls="navogation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse text-center" id="navogation">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item ">
                    <a class="nav-link text-uppercase text-dark" href="/">
                      Home
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="{{ route('about') }}">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="{{ route('category') }}">Categories</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="{{ route('contact') }}">Contact</a>
                  </li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
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
                        </li>
                    @endguest

                </ul>

                <form class="form-inline position-relative ml-lg-4" action="{{ route('search') }}"method="get">
                  <input class="form-control px-0 w-100" type="search" placeholder="Search" name="search">
                  <button class="search-icon" type="submit"><i class="ti-search text-dark"></i></button>
                  {{-- <a href="search.html" class="search-icon"><i class="ti-search text-dark"></i></a> --}}
                </form>

              </div>
            </nav>
          </header>

