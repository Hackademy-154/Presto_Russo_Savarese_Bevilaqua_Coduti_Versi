<nav class="navbar navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="{{ route('home.page') }}" style="color: #13c1ac; font-size: 1.5rem;">
            presto.it
        </a>

        <!-- Search Bar -->
        <div class="search-box mx-auto position-relative d-none d-lg-block">
            <i class="bi bi-search position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%);"></i>
            <input placeholder="Cerca . . ." type="text" class="form-control ps-5">
        </div>

        <!-- Mobile Controls -->
        <div class="d-flex align-items-center">
            <!-- Lente Mobile -->
            <div class="d-lg-none me-2">
                <i class="bi bi-search" style="font-size: 1.5rem; color: var(--main-bg-color);"></i>
            </div>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-flex flex-column align-items-center align-items-lg-end">
                @auth
                <!-- Dropdown Utente Autenticato -->
                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle me-2 w-100 mb-2" type="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Ciao, {{ Auth::user()->name }}
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
                    </ul>
                </div>
                <!-- Pulsante Vendi -->
                <a class="btn btn-primary w-100" href="{{ route('announcements.create') }}">
                    <i class="bi bi-box-arrow-up"></i> Vendi
                </a>
                @else
                <!-- Pulsante Registrati o Accedi -->
                <a class="btn btn-outline-primary w-100 mb-2" href="{{ route('register') }}">Registrati o accedi</a>
                <!-- Pulsante Vendi -->
                <a class="btn btn-primary w-100" href="{{ route('announcements.create') }}">
                    <i class="bi bi-box-arrow-up"></i> Vendi
                </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Sezione Categorie -->
<div class="categories-bar border-top border-bottom py-2">
    <div class="container-fluid">
        <ul class="categories-list d-flex m-0 p-0">
            <li class="category-item me-3">
                <a href="#" class="category-link">Abbigliamento</a>
            </li>
            <li class="category-item me-3">
                <a href="#" class="category-link">Arte</a>
            </li>
            <li class="category-item me-3">
                <a href="#" class="category-link">Elettronica</a>
            </li>
            <li class="category-item me-3">
                <a href="#" class="category-link">Elettrodomestici</a>
            </li>
            <li class="category-item me-3">
                <a href="#" class="category-link">Giocattoli</a>
            </li>
            <li class="category-item me-3">
                <a href="#" class="category-link">Libri</a>
            </li>
        </ul>
    </div>
</div>
