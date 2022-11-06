<nav class="navbar navbar-expand-lg mt-3">
    <div class="container col-md-8">
      <a class="navbar-brand" href="/"><img src="/img/obook.svg" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-4">
          <li class="nav-item mx-2">
            <a class="nav-link {{ ($active === "beranda") ? 'active' : '' }}" href="/">Beranda</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link {{ ($active === "buku") ? 'active' : '' }}" href="/buku">Buku</a>
          </li>
          
        </ul>
        
        <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/keluar" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Keluar</button>
              </form>
          </ul>
        </li>
        @else
              <li class="nav-item">
                <a href="/masuk" class="nav-link {{ ($active === "masuk") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right px-2"></i>Masuk</a>
              </li>
        @endauth
        </ul>
      </div>
    </div>
  </nav>