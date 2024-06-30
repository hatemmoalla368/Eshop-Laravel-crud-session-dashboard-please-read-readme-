<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="logo">
            <a href="{{ url('/produits') }}"><img src="{{asset('images/logo.png')}}" alt="logo"></a>
        </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            {{--<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('exercice.acceuil') }}">acceuil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('exercice.about') }}">a propos</a>
          </li>
          --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              categories
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href={{ route('categories.create')  }}>ajouter un category</a></li>
              <li><a class="dropdown-item" href={{ route('categories.index')  }}>list des categories</a></li>

            </ul>
          </li>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              produits
            </a>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href={{ route('products.create')  }}>ajouter un produit</a></li>
              <li><a class="dropdown-item" href={{ route('products.index')  }}>list des produits</a></li>

            </ul>
          </li>


          <li class="nav-item ">
            <a href="{{ route('orders.index') }}" class="nav-link " href="#" role="button" aria-expanded="false">
              liste des orders
            </a>

          </li>
          <li class="nav-item ">
            <a href="{{ route('users.index') }}" class="nav-link " href="#" role="button" aria-expanded="false">
              liste des utilisateurs
            </a>

          </li>


{{--
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('exercice.contact') }}">contactez-nous</a>
          </li>


          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>

        </ul>
        --}}
        <ul class="navbar-nav ms-auto">
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
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>
