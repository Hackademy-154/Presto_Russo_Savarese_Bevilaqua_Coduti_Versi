<div class="card" style="width: 18rem;">
    <img src="{{$announcement->images->isNotEmpty() ? $announcement->images->first()->getUrl(500, 700) :
    'https://picsum.photos/200'}}" class="card-img-top" alt="Immagine dell'articolo {{ $announcement->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $announcement->title }}</h5>
        <p class="card-text">Prezzo: {{ $announcement->price }} €</p>
        <p class="card-text">Categoria: {{ $announcement->category->name }}</p>
        <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-primary">Dettaglio
            Annuncio</a>
    </div>
</div>
