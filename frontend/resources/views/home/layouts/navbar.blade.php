<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container align-items-center">
      <a class="navbar-brand fs-2 fw-bold" href="{{url('/')}}">Cosplayrent</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" disabled>Promo</a>
          </li>
        </ul>
        <form class="d-flex" role="search" action="{{ url('search') }}" method="GET">
          <input class="form-control me-2" type="search" placeholder="Nama Kostum" aria-label="Search"  name="query" style="width: 400px;">
          <button class="btn btn-outline-success" type="submit">Cari</button>
      </form>
        <div class="d-flex align-items-center gap-4">
            @if(Route::has('login'))
            @auth
            <a href="{{url('myorder')}}">
                <i class="fa-solid fa-rectangle-list"></i>
            </a>
            <a href="{{url('mycart')}}">
                <i class="fa-solid fa-cart-shopping position-relative"></i>
                <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                    {{$count}}
                  </span>
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button class="btn btn-danger">Logout</button>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <a href="{{ route('login') }}">
                <button class="btn btn-success">Login</button>
            </a>
            @endauth
            @endif
        </div>
      </div>    
    </div>
</nav>