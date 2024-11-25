<x-layout>

    <h1 class="text-center mt-3 mb-3">Dettaglio Annuncio</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mb-3 ">

                @if ($announcement->images->count()>0)
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($announcement->images as $key => $image)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img class="d-block w-100" src="{{ $image->getUrl(500,700) }}" alt="Immagine {{ $key + 1}} dell'articolo'{{ $announcement->title }}">
                        </div>
                        @endforeach
                    </div>
                    @if ($announcement->images->count()>1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    @endif
                </div>
                @else
                <img class="d-block w-100" src="https://picsum.photos/200" alt="Nessuna foto inserita">
                @endif
            </div>

                <div class="col-12 col-md-6 mb-3">
                <h2>Titolo Annuncio : <br> {{ $announcement->title }}</h2>
                <p>Descrizione : <br>{{ $announcement->description }}</p>
                <p>Annuncio Creato Da:<br> {{ $announcement->user->name }}</p>
                <p>Annuncio Creato il:<br> {{ $announcement->created_at }}</p>
                <p>Categoria Annuncio:<br> {{ $announcement->category->name }}</p>
                <p> Prezzo :<br> {{ $announcement->price }} €</p>
                @auth
                    <button class="btn btn-warning">Modifica</button>
                    <button class="btn btn-danger">Cancella</button>
                    <button class="btn btn-success">Acquista</button>
                @else
                    <button class="btn btn-success">Acquista</button>
                @endauth
            </div>
        </div>


</x-layout>
