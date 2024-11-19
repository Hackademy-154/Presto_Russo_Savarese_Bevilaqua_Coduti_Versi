<div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form wire:submit="save" class="formCustom">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="title" class="form-control @error('title') is-invalid @enderror " id="title" wire:model.live.blur="title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione:</label>

            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" wire:model.live.blur="description">

            </textarea>

            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">

            <label for="categories" class="form-label">Seleziona le categorie per questo Film</label>
            <select class="form-control @error('selectedCategory') is-invalid @enderror" id="categories" wire:model.live.blur="selectedCategory" >
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            </div>
            @error('selectedCategory') <span class="text-danger">{{ $message }}</span> @enderror
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo (€):</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.live.blur="price" placeholder="0.00">
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Inserisci annuncio</button>


    </form>




</div>
