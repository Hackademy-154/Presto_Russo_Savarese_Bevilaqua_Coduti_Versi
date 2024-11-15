<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $announcement->title }}</h5>
        <p class="card-text">Prezzo: {{ $announcement->price }} €</p>
        <p class="card-text">Categoria: {{ $announcement->category->name }}</p>
        <a href="#" class="btn btn-primary">Dettaglio Annuncio</a>
   
    </div>
    
</div>