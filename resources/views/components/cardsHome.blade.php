 
 
 
 <div class="row">
    <div class="col-12 col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $announcement->title }}</h5>
                <p class="card-text">Prezzo: {{ $announcement->price }} €</p>
                <p class="card-text">Categoria: {{ $announcement->category->name }}</p>
                <button>Dettaglio</button>
            </div>
        </div>
    </div>
</div>