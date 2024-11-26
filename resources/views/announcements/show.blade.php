<x-layout>
    <div class="container mt-3">
        <h1 class="text-center mt-3 mb-3">{{__('ui.announcementDet')}}</h1>
        <div class="row">
            <!-- Carosello immagini -->
            <div class="col-12 col-md-6 mb-3">
                @if ($announcement->images->count() > 0)
                <div id="fixedCarousel" class="carousel slide shadow" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($announcement->images as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ $announcement->images->isNotEmpty() ? $announcement->images->first()->getUrl(500, 1000) : 'https://picsum.photos/200'}}" class="card-img-top" alt="{{ $announcement->title }}">
                            </div>
                        @endforeach
                    </div>
                    @if ($announcement->images->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#fixedCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Precedente</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#fixedCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle p-2"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Successivo</span>
                        </button>
                    @endif
                </div>

                @else
                    <img src="https://picsum.photos/500/500" class="d-block mx-auto carousel-image rounded"
                        alt="Nessuna foto inserita">
                @endif
            </div>

            <!-- Dettagli annuncio -->
            <div class="col-12 col-md-6 mb-3">

                <h2>{{__('ui.titleAnn')}} : <br> {{ $announcement->title }}</h2>
                <p>{{__('ui.descr')}} : <br>{{ $announcement->description }}</p>
                <p>{{__('ui.annuncedBy')}} :<br> {{ $announcement->user->name }}</p>
                <p>{{__('ui.createdOn')}} :<br> {{ $announcement->created_at }}</p>
                <p>{{__('ui.annCat')}} :<br> {{ $announcement->category->name }}</p>
                <p> {{__('ui.price')}} :<br> {{ $announcement->price }} €</p>
                <!-- Aggiungi qui gli altri dettagli come descrizione, prezzo, ecc. -->
                {{-- <div class="mt-4">
                    @auth
                        <button class="btn btn-warning">Modifica</button>
                        <button class="btn btn-danger">Cancella</button>
                        <button class="btn btn-success">Acquista</button>
                    @else
                        <button class="btn btn-success">Acquista</button>
                    @endauth
                </div> --}}
            </div>
        </div>
    </div>
</x-layout>
