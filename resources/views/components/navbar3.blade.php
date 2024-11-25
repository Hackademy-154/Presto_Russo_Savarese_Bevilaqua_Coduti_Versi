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
                <form role="search" action="{{ route('search.announcements') }}" method="GET"
                    class="d-flex align-items-center w-100">
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

            <!-- Mobile Toggle (hamburger menu) -->
            <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
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
                            {{__('ui.hello')}}, {{ Auth::user()->name }}
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
                                        <i class="bi bi-box-arrow-right"></i> {{__('ui.logout')}}
                                    </button>
                                </form>
                            </li>
                            @if (Auth::user()->is_revisor)
                                <li class="nav-item revisorButton">
                                    <a class="pl-4 dropdown-item" href="{{ route('revisor.index') }}">
                                        {{__('ui.revisor')}}
                                    </a>
                                </li>
                            @else
                                <li class="nav-item revisorButton">
                                    <a class="pl-4 dropdown-item" href="{{ route('work.with.us') }}">
                                        {{__('ui.beginRevisor')}}
                                    </a>
                                </li>
                            @endif


                        </ul>
                    </div>
                @else
                    <!-- Pulsanti Registrati e Accedi (Affiancati) -->
                    <div class="d-flex me-2">
                        <a class="btn btn-outline-primary me-2" href="{{ route('register') }}">{{__('ui.register')}}</a>
                        <a class="btn btn-outline-primary" href="{{ route('login') }}">{{__('ui.login')}}</a>
                    </div>
                @endauth

                <!-- Pulsante Vendi -->
                <a class="btn btn-primary pt-2 pb-2" href="{{ route('announcements.create') }}">
                    <i class="bi bi-box-arrow-up"></i> {{__('ui.sell')}}
                </a>


                <!-- Language Dropdown -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="img-fluid navbar-flag rounded"
                            src="https://upload.wikimedia.org/wikipedia/commons/b/b7/Flag_of_Europe.svg"
                            alt="bandiera europea">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end flag-dropdown" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item d-flex justify-content-center" href="#"><x-_locale lang="en" /></a></li>
                        <li><a class="dropdown-item d-flex justify-content-center" href="#"><x-_locale lang="it" /></a></li>
                        <li><a class="dropdown-item d-flex justify-content-center" href="#"><x-_locale lang="es" /></a></li>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</nav>

<!-- Sezione Categorie -->
<div class="categories-bar border-top border-bottom py-2">
    <div class="container-fluid">
        <!-- Lista orizzontale visibile solo su dispositivi grandi -->
        <ul class="categories-list d-none d-lg-flex justify-content-center m-0 p-0">
            <li class="category-item me-3 list-unstyled">
                <a href="{{ route('announcements.index') }}" class="category-link text-decoration-none">
                    {{__('ui.allAnnouncements')}}
                </a>
            </li>
            @foreach ($categories as $category)
                <li class="category-item me-3 list-unstyled">
                    <a href="{{ route('byCategory', ['category' => $category]) }}"
                        class="category-link text-decoration-none">
                        {{__("ui.$category->name")}}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Dropdown visibile solo su dispositivi medi e piccoli -->
        <div class="d-lg-none">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle w-100" type="button" id="categoriesDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('ui.SelectCategory')}}
                </button>
                <ul class="dropdown-menu p-2" aria-labelledby="categoriesDropdown" style="min-width: 100%;">
                    <div class="row">
                        <div class="col-6 mb-2">
                            <li>
                                <a class="dropdown-item text-center" href="{{ route('announcements.index') }}">
                                    {{__('ui.allAnnouncements')}}
                                </a>
                            </li>
                        </div>
                        @foreach ($categories as $category)
                            <div class="col-6 mb-2">
                                <li>
                                    <a class="dropdown-item text-center"
                                        href="{{ route('byCategory', ['category' => $category]) }}">
                                        {{__('ui.' . $category->name)}}
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
