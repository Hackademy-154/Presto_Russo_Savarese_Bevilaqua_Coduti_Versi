<nav class="navbar navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="{{ route('home.page') }}" style="color: #13c1ac; font-size: 1.5rem;">
            presto.it
        </a>

        <!-- Barra di ricerca e Mobile Controls (tutto sulla stessa linea) -->
        <div class="d-flex align-items-center w-100">
            <!-- Barra di ricerca -->
            <div class="search-box me-3 w-100">
                <form role="search" action="{{ route('search.announcements') }}" method="GET" class="d-flex align-items-center w-100">
                    @csrf
                    <!-- Campo di ricerca -->
                    <input placeholder="Cerca..." name="query" type="search" class="form-control me-2" style="max-width: 300px;" />

                    <!-- Bottone con icona -->
                    <button type="submit" class="btn btn-link p-0">
                        <i class="bi bi-search fs-5"></i>
                    </button>
                </form>
            </div>

            <!-- Mobile Toggle (hamburger menu) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-flex align-items-center">
                @auth
                <!-- Dropdown Utente Autenticato -->
                <div class="dropdown me-2">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Ciao, {{ Auth::user()->name }}
                        @if (Auth::user()->is_revisor)
                        <span class="badge top-50 translate-middle-y rounded-pill bg-danger">
                            {{ \App\Models\Announcement::countAttendToRevise() }}
                        </span>
                        @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                        @if (Auth::user()->is_revisor)
                        <li class="nav-item revisorButton">
                            <a class="pl-4 dropdown-item" href="{{ route('revisor.index') }}">
                                Zona Revisor
                            </a>
                        </li>
                        @else
                        <li class="nav-item revisorButton">
                            <a class="pl-4 dropdown-item" href="{{ route('work.with.us') }}">
Diventa Revisore
                            </a>
                        </li>
                        @endif


                    </ul>
                </div>
                @else
                <!-- Pulsanti Registrati e Accedi (Affiancati) -->
                <div class="d-flex me-2">
                    <a class="btn btn-outline-primary me-2" href="{{ route('register') }}">Registrati</a>
                    <a class="btn btn-outline-primary" href="{{ route('login') }}">Accedi</a>
                </div>
                @endauth

                <!-- Pulsante Vendi -->
                <a class="btn btn-primary" href="{{ route('announcements.create') }}">
                    <i class="bi bi-box-arrow-up"></i> Vendi
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Sezione Categorie -->
<div class="categories-bar border-top border-bottom py-2">
    <div class="container-fluid">
        <!-- Lista orizzontale visibile su dispositivi medi e grandi -->
        <ul class="categories-list d-flex justify-content-center m-0 p-0 d-none d-md-flex">
            @foreach ($categories as $category)
            <li class="category-item me-3 list-unstyled">
                <a href="{{ route('byCategory', ['category' => $category]) }}" class="category-link text-decoration-none">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach
        </ul>

        <!-- Dropdown per dispositivi piccoli -->
        <div class="d-block d-md-none">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle w-100" type="button" id="categoriesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Seleziona una categoria
                </button>
                <ul class="dropdown-menu p-2" aria-labelledby="categoriesDropdown" style="min-width: 100%;">
                    <div class="row">
                        @foreach ($categories as $category)
                        <div class="col-6 mb-2">
                            <li>
                                <a class="dropdown-item text-center" href="{{ route('byCategory', ['category' => $category]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        </div>
                        @endforeach
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
