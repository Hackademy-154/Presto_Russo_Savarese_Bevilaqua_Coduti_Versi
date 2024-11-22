<x-layout>
    <div class="container">
        {{-- Mostra un messaggio di successo se presente nella session --}}
        @if (session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-12 alert alert-success text-center shadow rounded">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <div class="container-fluid pt-5">
            <div class="row mt-5 justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="rounded shadow bg-body-secondary">
                        <h1 class="display-5 text-center pt-2 pb-2">
                            Revisor Dashboard
                        </h1>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-6 d-flex justify-content-center">
                        <form action="{{ route('revisor.reviewAccepted') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-custom">Rivedi Annunci Accettati</button>
                        </form>
                    </div>
                    <div class="col-6 d-flex justify-content-center">
                        <form action="{{ route('revisor.reviewRejected') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-custom">Rivedi Annunci Rifiutati</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Controllo sugli annunci da revisionare --}}
            @if ($announcement_to_check)
                <div class="row mt-5">
                    @if ($announcement_to_check->images->count())
                        {{-- Mostra le immagini dell'annuncio --}}
                        @foreach ($announcement_to_check->images as $key => $image)
                            <div class="col-6 col-md-4 mb-4">
                                <img src="{{ Storage::url($image->path) }}" 
                                     class="img-fluid rounded shadow" 
                                     alt="Immagine {{ $key + 1 }} dell'articolo '{{ $announcement_to_check->title }}'">
                            </div>
                        @endforeach
                    @else
                        {{-- Mostra immagini segnaposto --}}
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-6 col-md-4 text-center">
                                <img src="https://picsum.photos/300" 
                                     class="img-fluid rounded shadow" 
                                     alt="Immagine segnaposto">
                            </div>
                        @endfor
                    @endif
                </div>

                {{-- Informazioni sull'annuncio --}}
                <div class="row justify-content-center pt-5 align-items-center">
                    <div class="col-12">
                        <h1 class="fst-italic display-4">
                            {{ $announcement_to_check->title }}
                        </h1>
                        <h3>Autore: {{ $announcement_to_check->user->name }}</h3>
                        <h4>Prezzo: {{ $announcement_to_check->price }}</h4>
                        <p class="h6">{{ $announcement_to_check->description }}</p>
                    </div>
                </div>

                {{-- Azioni per accettare o rifiutare l'annuncio --}}
                <div class="row mt-4">
                    <div class="col-md-6 d-flex justify-content-center">
                        <form action="{{ route('revisor.accept', ['announcement' => $announcement_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-custom">Accetta Annuncio</button>
                        </form>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <form action="{{ route('revisor.reject', ['announcement' => $announcement_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-custom">Rifiuta Annuncio</button>
                        </form>
                    </div>
                </div>
            @else
                {{-- Nessun annuncio da revisionare --}}
                <div class="row justify-content-center pt-5">
                    <div class="col-12 text-center">
                        <h1 class="fst-italic display-4">Nessun articolo da revisionare</h1>
                        <a href="{{ route('home.page') }}" class="btn btn-custom">Torna alla Home</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>
