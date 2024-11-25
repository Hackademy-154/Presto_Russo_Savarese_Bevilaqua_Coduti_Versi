<x-layout>
    <div class="container py-5">
        {{-- Messaggio di successo --}}
        @if (session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="alert alert-success text-center shadow rounded-pill p-3">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif

        {{-- Titolo della dashboard --}}
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-8">
                <div class="rounded shadow bg-light text-center p-4">
                    <h1 class="display-4 fw-bold text-dark">Revisor Dashboard</h1>
                </div>
            </div>
        </div>

        {{-- Se ci sono annunci da revisionare --}}
        @if ($announcement_to_check)
            <div class="row mt-5 align-items-start">
                {{-- Carosello immagini --}}
                <div class="col-12 col-md-6">
                    <div id="fixedCarousel" class="carousel slide shadow" data-bs-ride="carousel" style="max-height: 500px; overflow: hidden;">
                        <!-- Immagini del carosello -->
                        <div class="carousel-inner">
                            @foreach ($announcement_to_check->images as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ Storage::url($image->path) }}" class="d-block mx-auto carousel-image rounded" alt="Immagine {{ $key + 1 }}">
                                </div>
                            @endforeach
                        </div>

                        <!-- Controlli -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#fixedCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#fixedCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                {{-- Dettagli annuncio --}}
                <div class="col-12 col-md-6">
                    <div class="p-4 bg-light shadow rounded">
                        <h2 class="fw-bold">{{ $announcement_to_check->title }}</h2>
                        <p class="text-muted">{{ $announcement_to_check->description }}</p>
                        <p class="h5 text-success">Prezzo: €{{ $announcement_to_check->price }}</p>
                        <div class="d-flex justify-content-between mt-4">
                            {{-- Pulsanti --}}
                            <form action="{{ route('revisor.reject', ['announcement' => $announcement_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-outline-danger w-100 me-2 rounded-pill">Rifiuta Annuncio</button>
                            </form>
                            <form action="{{ route('revisor.accept', ['announcement' => $announcement_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-outline-success w-100 ms-2 rounded-pill">Accetta Annuncio</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- Nessun annuncio --}}
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <h2 class="text-muted fw-bold">Non ci sono annunci da revisionare al momento.</h2>
                    <a href="{{ route('home.page') }}" class="btn btn-primary rounded-pill mt-4 shadow">Torna alla Home</a>
                </div>
            </div>
        @endif

        {{-- Pulsanti per vedere annunci accettati e rifiutati --}}
        <div class="row justify-content-center mt-5">
            <div class="col-6 col-md-3 text-center">
                <form action="{{ route('revisor.reviewAccepted') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-outline-success w-100 py-2 rounded-pill shadow">Annunci Accettati</button>
                </form>
            </div>
            <div class="col-6 col-md-3 text-center">
                <form action="{{ route('revisor.reviewRejected') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100 py-2 rounded-pill shadow">Annunci Rifiutati</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
