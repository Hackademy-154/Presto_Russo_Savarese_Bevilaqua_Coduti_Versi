<div>
    <form wire:submit="save">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="title" class="form-control" id="title" wire:model.live="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text" class="form-control" id="description" wire:model="description">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price" wire:model="price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

</div>
