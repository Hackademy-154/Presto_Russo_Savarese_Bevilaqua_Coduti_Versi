<x-layout>
    {{-- Messaggi di errore e successo --}}
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success text-center shadow rounded w-50">
            {{ session('message') }}
        </div>
    @endif

    {{-- //! Non cancellare, WIP --}}
    <div class="hero-section d-flex align-items-center">
        <div class="container-fluid">
            <div class="row w-100">
                <!-- Colonna Sinistra: Testo -->
                <div class="col-12 col-md-6 text-start text-light position-relative">
                    <div class="hero-text-box p-4">
                        <h1 class="fw-bold">Trova ciò che <span class="highlight">desideri</span>, vendi ciò<br> che non
                            usi.</h1>
                        <p>Con <span class="highlight">Presto.it</span> è semplice e veloce!</p>
                        <a href="#" class="btn btn-hero mt-3">Inizia a vendere</a>
                    </div>
                </div>
                <!-- Colonna Destra: Immagine -->
                <div class="col-12 col-md-6">
                    <img src="{{ asset('images/sfondo.jpeg') }}" alt="Hero Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <!-- Prima Sezione -->
    <div class="container my-5">
        <div class="row align-items-center mb-5">
            <!-- Prima Categoria -->
            <div class="col-12 col-md-6 text-center">
                <div class="category-box">
                    <img src="{{ asset('images/sedia.jpg') }}" alt="Immagine Categoria 1" class="category-img">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h3 class="category-title">Non riesci a trovare le giuste <span class="highlight">combinazioni</span>
                    per la tua casa?</h3>
                <p class="category-description">Aggiungi carattere e armonia ai tuoi spazi con pochi semplici dettagli!
                </p>
                <a href="#" class="btn btn-custom">Acquista ora</a>
            </div>
        </div>

        <div class="row align-items-center">
            <!-- Seconda Categoria -->
            <div class="col-12 col-md-6 order-md-2 text-center">
                <div class="category-box">
                    <img src="{{ asset('images/shopping.jpg') }}" alt="Immagine Categoria 2" class="category-img">
                </div>
            </div>
            <div class="col-12 col-md-6 order-md-1">
                <h3 class="category-title">Valorizza ogni momento con <span class="highlight">stile!</span></h3>
                <p class="category-description">Tocco di eleganza e personalità al tuo look, con dettagli unici che
                    valorizzano ogni momento.</p>
                <a href="#" class="btn btn-custom">Acquista ora</a>
            </div>
        </div>
    </div>


    {{-- Sezione ultimi annunci --}}
    <section class="latest-announcements">
        <div class="container text-center">
            <h2 class="section-title">Ecco i nostri ultimi sei annunci</h2>
            <div class="row justify-content-center">
                @forelse($announcements as $announcement)
                    <div class="col-12 col-md-4 col-lg-2 announcement-card">
                        <div class="card">
                            <!-- Immagine dell'annuncio -->
                            <img src="{{ $announcement->image }}" class="card-img-top" alt="{{ $announcement->title }}">
                            <div class="card-body">
                                <!-- Titolo dell'annuncio -->
                                <h5 class="card-title">{{ $announcement->title }}</h5>
                                <!-- Descrizione dell'annuncio -->
                                <p class="card-text">{{ $announcement->description }}</p>
                                <!-- Prezzo dell'annuncio -->
                                <p class="card-price">{{ $announcement->price }} €</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="no-announcements">Non ci sono annunci disponibili al momento.</p>
                    </div>
                @endforelse
            </div>
            <a href="{{ route('announcements.index') }}" class="btn btn-primary mt-4">Vedi Annunci</a>
        </div>
    </section>
</x-layout>
