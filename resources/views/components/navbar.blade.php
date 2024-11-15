<nav class="navbar navbar-expand-lg background-color border-navbar-bottom1">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">


                    <div class="search-box">
                        <input value="Search" type="text" class="form-control" />
                        <i class="bi bi-search"></i>                    </div>


                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home.page') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('announcements.index')}}">Annunci</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chi Siamo</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @auth
                            Ciao {{ Auth::user()->name }}
                        @else
                            Ciao Visitatore
                        @endauth
                    </a>
                    <ul class="dropdown-menu">
                        @auth
                            <li>
                                <form action="{{ route('logout') }}" method="POST" id="form-logout">
                                    @csrf
                                    <button class="dropdown-item" type="submit"> Logout</button>

                                </form>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('announcements.create') }}">Crea un Annuncio</a>
                            </li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</nav>
