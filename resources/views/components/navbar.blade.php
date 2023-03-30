<nav class="navbar navbar-expand-lg header larafont">
    <div class="container-fluid">
        <a class="navbar-brand text-dark" href="/">Aulab Post!
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.create') }}">Inserisci un articolo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('careers') }}">Lavora con noi </a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Benvenuto {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/">Profilo</a></li>
                            @if (Auth::user()->is_admin)
                                <li><a class="dropdown-item"href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                            @endif
                            @if (Auth::user()->is_revisor)
                                <li><a class="dropdown-item"href="{{ route('revisor.dashboard') }}">Dashboard Del
                                        revisore</a></li>
                            @endif
                            @if (Auth::user()->is_writer)
                                <li><a class="dropdown-item"href="{{ route('writer.dashboard') }}">Dashboard Del
                                        redattore</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                            </li>
                            <form method="post" action="{{ route('logout') }}" id="form-logout" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle text-dark" height=90></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                        </ul>
                    </li>
                @endguest
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <form class="d-flex" method="GET" action="{{ route('article.search') }}">
                    <input class="form-control" type="search" name="query" placeholder="Cosa stai cercando?"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </ul>
        </div>
    </div>
</nav>
