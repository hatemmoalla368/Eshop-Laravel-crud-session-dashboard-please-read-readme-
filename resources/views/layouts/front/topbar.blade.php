<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>

<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Top Left -->
                <div class="top-left">
                    <ul class="list-main">
                        <li><i class="ti-headphone-alt"></i> +216 24021594</li>
                        <li><i class="ti-email"></i> hatemmoalla368@gmail.com</li>
                    </ul>
                </div>
                <!--/ End Top Left -->
            </div>
            <div class="col-lg-8 col-md-12 col-12">
                <!-- Top Right -->
                <div class="right-content">
                    <ul class="list-main">
                        <li><a href="{{ route('exercice.contactus') }}"><i class="ti-location-pin"></i> Store location</a></li>

                       {{-- <li><i class="ti-user"></i> <a href="#">My account</a></li>
                          <li><i class="ti-power-off"></i><a href="{{ url('/login') }}">Login</a></li>
                        <li><i class="ti-power-off"></i><a href="{{ url('/register') }}">Register</a></li> --}}


                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else


                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"  >
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        @if (auth()->user()->role === 'super admin' OR auth()->user()->role === 'admin' )



                                        <a class="dropdown-item" href="{{ url('categories') }}"
                                               >
                                            dashboard
                                        </a>
                                        @endif
                                    </div>
                                </li>

                            @endguest
                        </ul>
                    </nav>
                    </div>
                </div>

                    </ul>
                </div>
                <!-- End Top Right -->
            </div>
        </div>
    </div>
</div>
