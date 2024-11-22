<x-layout>
    <div class="container">

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
                        <h1 class="diplay-5 text-center pt-2 pb-2">
                            Revisor Dashboard
                        </h1>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <div class="row ">
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
            @if ($announcement_to_check->images->count())
                @foreach ($announcement_to_check->images as $key => $image)
                    <div class="col-6 col-md-4 mb-4">
                        <img src="{{ Storage::url($image->path) }}" class="img-fluid rounded shadow"
                            alt="immagine {{ $key +1 }} dell'articolo '{{ $announcement_to_check->title }}">
                    </div>
                @endforeach
            @else
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-6 col-md-4 text-center">
                        <img src="https://picsum.photos/300" class="img-fluid rounded shadow" alt="immaginesegnaposto">
                    </div>
                @endfor
                <div class="row justify-content-center pt-5 align-items-center">
                    <div class="col-12">
                        <h1 class="fst-italic display-4">
                            Nessun articolo da revisionare
                        </h1>
                        <a href="{{ route('home.page') }}" class="btn btn-custom">Torna alla Home</a>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-4 ps-4 d-flex flex-column justify-content-beetween">
            <div>
                <h1>{{ $announcement_to_check->title }}</h1>
                <h3> Autore: {{ $announcement_to_check->user->name }}</h3>
                <h4>Prezzo: {{ $announcement_to_check->price }}</h4>
                {{-- <h4 class="fst-italic text-muted"># {{ $announcement_to_check->created_at->category->name }}
                        </h4> --}}
                <p class="h6">{{ $announcement_to_check->description }}</p>
            </div>
            <div class="d-flex pb-4 justify-content-around">
                <form action="{{ route('revisor.accept', ['announcement' => $announcement_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-custom">Accetta Annuncio</button>
                </form>
                <form action="{{ route('revisor.reject', ['announcement' => $announcement_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-custom">Rifiuta Annuncio</button>
                </form>
            </div>
        </div>
        {{-- </div> --}}
    


        
    </div>
</x-layout>
