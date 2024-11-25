<div class="container border border-dark rounded">

    <div class="row justify-content-center mt-3">
        <div class="col-4 justify-content-center">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12 p-3">
            <form wire:submit.prevent="save" class="formCustom">

                {{-- Sezioni immagini --}}
                <div class="row m-3 p-0 justify-content-between border border-dashed border-secondary rounded">
                    <div class="col-12 input-group p-0 m-0">
                        <input
                            type="file"
                            wire:model="temporary_images"
                            multiple
                            class="form-control image-input1 p-0 @error('temporary_images') is-invalid @enderror"
                            placeholder="img/"
                        >
                        <button type="button" class="btn btn-success">
                            <i class="bi bi-folder-plus"></i> Carica le foto
                        </button>

                        @error('temporary_images')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Anteprima delle immagini --}}
                @if (!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>Anteprima Foto</p>
                            <div class="row border border-secondary rounded shadow py-4">
                                @foreach ($images as $key => $image)
                                    <div class="col-md-3 d-flex flex-column align-items-center my-3">
                                        <div
                                            class="img-preview mx-auto shadow rounded"
                                            style="width: 150px; height: 150px; background-image: url('{{ $image->temporaryUrl() }}'); background-size: cover; background-position: center;"></div>
                                            <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{ $key }})">Rimuovi</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                {{-- TITOLO --}}
                <div class="row m-3 p-3 pb-3 justify-content-between border border-secondary rounded">
                    <div class="col-3">
                        <label for="title" class="form-label w-50">
                            <h5 class="fw-bold">TITOLO</h5>
                        </label>
                    </div>
                    <div class="col-6">
                        <input
                            placeholder="Inserisci il titolo del prodotto"
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            id="title"
                            wire:model.lazy="title"
                        >
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- DESCRIZIONE --}}
                <div class="row justify-content-between m-3 p-3 pb-3 border border-secondary rounded">
                    <div class="col-5">
                        <label for="description" class="form-label">
                            <h5 class="fw-bold">DESCRIVI IL TUO ARTICOLO</h5>
                        </label>
                    </div>
                    <div class="col-6">
                        <textarea
                            rows="5"
                            class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            wire:model.lazy="description"
                            placeholder="Inserisci la descrizione del prodotto"
                        ></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- CATEGORIA --}}
                <div class="row justify-content-between m-3 p-3 pb-3 border border-secondary rounded">
                    <div class="col-3">
                        <label for="categories" class="form-label">
                            <h5 class="fw-bold">CATEGORIA</h5>
                        </label>
                    </div>
                    <div class="col-6">
                        <select
                            class="form-control @error('selectedCategory') is-invalid @enderror"
                            id="categories"
                            wire:model.lazy="selectedCategory"
                        >
                            <option value="" disabled selected>Seleziona una categoria...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedCategory')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- PREZZO --}}
                <div class="row justify-content-between m-3 p-3 pb-3 border border-secondary rounded">
                    <div class="col-3">
                        <label for="price" class="form-label">
                            <h5 class="fw-bold">Prezzo</h5>
                        </label>
                    </div>
                    <div class="col-6">
                        <input
                            type="number"
                            class="form-control @error('price') is-invalid @enderror"
                            id="price"
                            wire:model.lazy="price"
                            placeholder="0.00€"
                        >
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="mt-5 mb-4 ms-auto btn btn-primary">Inserisci Articolo</button>
            </form>
        </div>
    </div>
</div>
