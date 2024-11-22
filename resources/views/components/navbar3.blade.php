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
                <a class="btn btn-primary pt-2 pb-2" href="{{ route('announcements.create') }}">
                    <i class="bi bi-box-arrow-up"></i> Vendi
                </a>

                {{-- ! Language --}}
                <!-- Language Dropdown -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="img-fluid navbar-flag rounded"
                            src="https://upload.wikimedia.org/wikipedia/commons/b/b7/Flag_of_Europe.svg"
                            alt="bandiera europea">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end flag-dropdown" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item d-flex justify-content-center" href="#"><img class="img-fluid navbar-flag rounded"
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAkFBMVEX///8AiknZIir98fJvt5HmfYHYHyfw+fTZJCsGjEzZJi4AikgAh0PYGCEAikb++/v3+/n1yMrT6t/hW2EAkVPa7eSd0rj42NncNz7vqKrp9e82om7hTlXwsrT86+x2vJlJpnfkaG2n072LxqncMDhWrIDA4dEZlVv419n53+Atn2ngSE/smZzphYnjaG1nuZFo3K5RAAAC5UlEQVR4nO3Y6XLaQBCF0ckQJmwDQixCSJgdzBbe/+0y2ElsYTupSqZ/dPLdB+iuOnVbUyVjqknS8bXYNz/FyOcvRiq1urONv45tTcp6/lj71aZkNN4Ou512FJG2sImzEeKc95tlfuh9JJKujwEkjsgtwj2JlcByOmfvqkxXRayK6DIJ8b6cPbzdks6HcUU0mQSVzSW7X7LbNiOL6DKxzi771fvZLWKDaDMJKIMKigiJMpOQQf9lQ7qVIFFnEs7n5zdlOhchUWcSUC7fX59kNYz+edVpYl1r9vxJGRUdERKFJtaXT9eTrLsyNdFoYv35VpTRUagmOk1OhzB+LFUTlSbW5+F0FlI1UWqyrJlU6NHRauI2meDp6DS5Hc9V7HS0mtRNIVYTpSauNHtM7kwmJs7v6H/IxLYweZOGkSPBBBNMMMEEE0wwwQQTTDDBBBNMMMEEE0wwwQQTTDDBBBNMMMEEE0wwwQQTTDDBBBNMMMEEE0wwwQQTTDDBBBNMMMEEE0wwwQQTTDDBBBNMMMEEE0wwwQQTTDDBBBNMMMEEE0wwwQQTTDDBBBNMMMEEE0wwwQQTTDDBBBNMMMEEE0wwwQQTTDDBBBNMMMEEE0wwwQQTTDDBBBNMMMEEE0wwwQQTTDDBBBNMMMEEE0wwwQQTTDDBBJM/M2ligslv0zJ7TKpxE1O0MamalObawaQSXzfjrlhRlJrkJh1i8jpu82iShdjxqDTxy5oRPB6dJnkYPzpKFUWjiT8dwvhkLVUUlSbn3m1+WggVRaGJL7On+clK6OnRZ+Jas97zgulchESfibOXhx8b0i0mTyRfs5cVu4XE9agzGfRfrUh2i//exNlBv/d6R7LbNqNXRZWJs8sqSUg6H3Yiq2gy8ZtL9nbNdFV046roMfG+nD28tycZrY/tTjseixIT5/3pnN3fzYvKeDGMVpa2rEkUFBdANsv88JHIM0s6vhb7ZpSImjRaMTIp63lWuxv+DRuj8vSp1ersAAAAAElFTkSuQmCC"
                                    alt=""></a></li>
                        <li><a class="dropdown-item d-flex justify-content-center" href="#"><img class="img-fluid navbar-flag rounded"
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Flag_of_the_United_Kingdom_%281-2%29.svg/1200px-Flag_of_the_United_Kingdom_%281-2%29.svg.png"
                                    alt="bandiera inglese"></a></li>
                        <li><a class="dropdown-item d-flex justify-content-center" href="#"><img class="img-fluid navbar-flag rounded"
                                    src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/Flag_of_Spain.svg/1200px-Flag_of_Spain.svg.png"
                                    alt=""></a></li>
                    </ul>
                </div>


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
                        <div class="col-6 mb-2">

                            <li>
                                <a class="dropdown-item text-center" href="{{ route('announcements.index') }}"
                                    class="category-link text-decoration-none">
                                    Tutti gli articoli
                                </a>
                            </li>
                        </div>
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
