<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #223326;">
    <div class="container">
        <!-- Logo en la barra de navegación -->
        <a class="navbar-brand" href="{{ route('publicHome') }}">
            <img src="{{ asset('img/Iso_Beige.png') }}" alt="Logo de la Empresa" width="30" height="30"
                class="d-inline-block align-top">
        </a>
        <!-- Botón para colapsar el menú en dispositivos pequeños -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú de navegación -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('publicHome') }}" style="color: #EBE5D3">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services.index') }}" style="color: #EBE5D3">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects.index') }}" style="color: #EBE5D3">Portfolio</a>
                </li>
                <li class="nav-item">
                    @if (Auth::user())
                        @cannot('users.index')
                            <a class="nav-link" href="{{ route('customers.show', Auth::user()) }}" style="color: #EBE5D3">My profile</a>
                        @endcannot
                        @can('users.index')
                            <a class="nav-link" href="{{ route('customers.index', Auth::user()) }}" style="color: #EBE5D3">Clientes</a>
                        @endcan
                    @else
                      <a class="nav-link" href="{{ route('login') }}" style="color: #EBE5D3">I'm Customer</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}" style="color: #EBE5D3">Contact</a>
                </li>
                @if (Auth::user())
                  <li class="nav-item dropdown">
                      <!-- Menú de navegación -->
                      <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav ml-auto">
                              <!-- Your other menu items -->
                              <!-- ... -->

                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      {{ Auth::user()->first_names }}
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown"
                                      style="right: 0; left: auto;">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          class="d-none">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
