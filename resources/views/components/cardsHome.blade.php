        <div class="card" style="width: 18rem;">
            <img src="{{$annoucement->image->isNotEmpty() ? Storage::url($annoucement->images->first()->path) 'https://picsum.photos/200'}}" class="card-img-top" alt="Immagine dell'articolo {{ $announcement->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $announcement->title }}</h5>
                <p class="card-text">Prezzo: {{ $announcement->price }} €</p>
                <p class="card-text">Categoria: {{ $announcement->category->name }}</p>
                <a href="#" class="btn btn-primary">Dettaglio Annuncio</a>
            </div>
        </div>
