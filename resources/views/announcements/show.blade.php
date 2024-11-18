<x-layout>

    <h1>Dettaglio Annuncio</h1>
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mb-3 " >


                <div id="carouselExample" class="carousel slide" >
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="https://picsum.photos/200" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://picsum.photos/200" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://picsum.photos/200" alt="First slide">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <h2>Titolo Annuncio : <br> {{$announcement->title}}</h2>
                <p>Descrizione : <br>{{$announcement->description}}</p>
                <p>Annuncio Creato Da:<br> {{$announcement->user->name}}</p>
                <p>Annuncio Creato il:<br> {{$announcement->created_at}}</p>
                <p>Categoria Annuncio:<br> {{$announcement->category->name}}</p>
                <p> Prezzo :<br> {{$announcement->price}} €</p>
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
