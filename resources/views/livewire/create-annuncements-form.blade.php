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

                {{-- Sezione immagini --}}
                <div class="row m-4 p-4 justify-content-center align-items-center border border-dashed border-secondary rounded"
                    style="min-height: 200px;">
                    <div class="col-12 text-center">
                        <label for="imageUpload" class="btn btn-success rounded-pill px-4 py-2">
                            <i class="bi bi-plus-circle"></i> Carica le foto
                        </label>
                        <input id="imageUpload" type="file" wire:model="temporary_images" multiple class="d-none"
                            {{-- Nasconde il campo di input file --}}>
                    </div>
                    @error('temporary_images')
                        <div class="text-danger text-center mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Anteprima delle immagini --}}
                @if (!empty($images))
                    <div class="row mt-3">
                        <div class="col-12">
                            <h5 class="mb-3">Anteprima Foto</h5>
                            <div class="row border border-secondary rounded shadow py-4">
                                @foreach ($images as $key => $image)
                                    <div class="col-6 col-md-3 d-flex flex-column align-items-center my-3">
                                        {{-- Anteprima Immagine --}}
                                        <div class="img-preview mx-auto shadow rounded mb-2"
                                            style="width: 150px; height: 150px; background-image: url('{{ $image->temporaryUrl() }}');background-size: cover; background-position: center; border: 1px solid #ccc;">
                                        </div>
                                        {{-- Pulsante Rimuovi --}}
                                        <button type="button" class="btn btn-danger btn-sm px-3"
                                            wire:click="removeImage({{ $key }})">
                                            <i class="bi bi-trash"></i> Rimuovi
                                        </button>
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
                        <input placeholder="Inserisci il titolo del prodotto" type="text"
                            class="form-control @error('title') is-invalid @enderror" id="title"
                            wire:model.lazy="title">
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
                        <textarea rows="5" class="form-control @error('description') is-invalid @enderror" id="description"
                            wire:model.lazy="description" placeholder="Inserisci la descrizione del prodotto"></textarea>
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
                        <select class="form-control @error('selectedCategory') is-invalid @enderror" id="categories"
                            wire:model.lazy="selectedCategory">
                            <option value="" disabled selected>Scegli una categoria...</option>
                            {{-- Opzione di default --}}
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
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            wire:model.lazy="price" placeholder="0.00€">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="mt-5 mb-4 ms-auto btn btn-primary" onclick="window.scrollTo(0, 0)">
                    Inserisci Articolo
                </button>

            </form>
        </div>
    </div>
</div>
