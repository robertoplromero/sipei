<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('/')}}">SIPEI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Inicio</a></li>
        @guest
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a></li>
              <li><a class="dropdown-item" href="{{ route('unidades.index') }}">Unidades</a></li>
              <li><a class="dropdown-item" href="{{ route('bitacora.index') }}">Bitácora</a></li>
              <li><a class="dropdown-item" href="{{ route('historicos.index') }}">Históricos</a></li>
              {{-- <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
            </ul>
          </li>
          {{-- <li class="nav-item"><a class="nav-link disabled">Disabled</a></li> --}}
        @endguest
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @guest
          <li class="nav-item"><a class="nav-link" aria-current="page"href="{{ route('login') }}">Iniciar sesión</a></li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->username }}</a>
            <ul class="dropdown-menu dropdown-menu-end">
              <!-- <li><a class="dropdown-item" href="#">Action</a></li> -->
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </ul>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>