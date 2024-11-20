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

    {{-- <div class=" d-flex align-items-center border border-primary"> --}}
    <div class="container-fluid hero-section">
        <div class="row justify-content-center p-0 m-0">
            <div class="col-12 col-md-3 text-start text-light h-100 landingbox1 m-0 p-0">
                <div class="col-12 hero-text-box p-4">
                    <h1>Trova ciò che <span class="fw-bolder">desideri</span>, vendi ciò<br> che non
                        usi.</h1>
                    <h1>Con <span class="fw-bolder">presto.it</span> è semplice e veloce!</p>
                        <a href="#" class="btn btn-hero mt-3">Inizia a vendere</a>
                </div>
            </div>
            <div class="d-flex col-12 col-md-6 w-50 m-0 p-0 center-sd">
                <img src="{{ asset('images/landing.jpeg') }}" alt="Landing" class="h-100">
            </div>
        </div>
    </div>
    {{-- </div> --}}


    <!-- Prima Sezione -->
    <div class="container my-5">
        <div class="row align-items-center mb-5">
            <div class="col-12 col-md-6 text-center">
                <div class="category-box">
                    <img src="{{ asset('images/char.jpg') }}" alt="Immagine Categoria 1" class="category-img ">
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
            <div class="row justify-content-center px-5">
                @forelse($announcements as $announcement)
                    <div class="col-12 col-md-4 col-lg-2 announcement-card">
                        <div class="card">
                            <img src="https://picsum.photos/200" class="card-img-top" alt="{{ $announcement->title }}">
                            
                            <div class="card-body">
                                <h5 class="card-title">{{ $announcement->title }}</h5>
                                <p class="card-text">{{ $announcement->description }}</p>
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
