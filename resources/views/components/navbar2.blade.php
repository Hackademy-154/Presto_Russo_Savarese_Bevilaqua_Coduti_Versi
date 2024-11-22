<nav class="navbar navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="{{ route('home.page') }}" style="color: #13c1ac; font-size: 1.5rem;">
            presto.it
        </a>
        
        <!-- Search Bar -->
        <div class=" search-box ">
            <form role="search" action="{{ route('search.announcements') }}" method="GET"
            class="d-flex align-items-center navbar-width1">
            @csrf
            <!-- Campo di ricerca -->
            <input placeholder="Cerca..." name="query" type="search" class="form-control me-2"
            style="max-width: 300px;" />
            
            <!-- Bottone con icona -->
            <button type="submit" class="btn btn-link p-0">
                <i class="bi bi-search fs-5"></i>
            </button>
        </form>
        
        
    </div>
    
    <!-- Buttons -->
    <div class="d-flex align-items-center">
        @auth
        <!-- Dropdown Utente Autenticato -->
        <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle me-2" type="button" id="userDropdown"
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
                @if (Auth::user()->is_revisor)
                <li class="nav-item revisorButton">
                    <a class="pl-4 dropdown-item" href="{{ route('revisor.index') }}">
                        Zona Revisor
                    </a>
                </li>
                @endif
            </li>
        </ul>
    </div>
    @else
    <!-- Pulsante Registrati o Accedi -->
    <a class="btn btn-outline-primary me-2" href="{{ route('register') }}">Registrati o accedi</a>
    @endauth
    
    <!-- Pulsante Vendi -->
    <a class="btn btn-primary" href="{{ route('announcements.create') }}">
        <i class="bi bi-box-arrow-up"></i> Vendi
    </a>
    
    {{-- ! Language --}}
    <!-- Language Dropdown -->
    <div class="dropdown">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="languageDropdown"
        data-bs-toggle="dropdown" aria-expanded="false">
        Lingua
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
        {{-- USER STORY 4 --}}
       
                    
                    
                    {{-- FATTO DA MICHELE --}}
                   <li><a class="dropdown-item" href="#">Italiano</a></li>
                    <li><a class="dropdown-item" href="#">English</a></li>
                    <li><a class="dropdown-item" href="#">Español</a></li> 
                    
                </ul>
            </div>
            
        </div>
    </div>
</nav>

<!-- Sezione Categorie -->


<div class="categories-bar border-top border-bottom py-2">
    <div class="container-fluid">
        <!-- Lista orizzontale visibile su dispositivi medi e grandi -->
        <ul class="categories-list d-flex justify-content-center m-0 p-0 d-none d-md-flex">
            <li class="category-item me-3 list-unstyled">
                <a href="{{ route('announcements.index') }}" class="category-link text-decoration-none">
                    Tutti gli articoli
                </a>
            </li>
            @foreach ($categories as $category)
            <li class="category-item me-3 list-unstyled">
                <a href="{{ route('byCategory', ['category' => $category]) }}"
                    class="category-link text-decoration-none">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach
        </ul>
        
        <!-- Dropdown per dispositivi piccoli -->
        <div class="d-block d-md-none">
            
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle w-100" type="button" id="categoriesDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                Seleziona una categoria
            </button>
            <ul class="dropdown-menu p-2" aria-labelledby="categoriesDropdown" style="min-width: 100%;">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-6 mb-2">
                        <li>
                            <a class="dropdown-item text-center"
                            href="{{ route('byCategory', ['category' => $category]) }}">
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
