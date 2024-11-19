<x-layout>
    <div class="container">
    @if (session()->has('message'))
    <div class="row justify-content-center">
        <div class="col-12 alert alert-success text-center shadow rounded">
            {{ session('message') }}
        </div>
    </div>
    <div class="sidebar-section">
        <h5>Ultimi annunci accettati</h5>
        <ul>
            @forelse ($lastAccepted as $announcement)
                <li>
                    {{ $announcement->title }} - 
                    <small>{{ $announcement->updated_at->format('d/m/Y H:i') }}</small>
                </li>
            @empty
                <li>Nessun annuncio accettato recentemente.</li>
            @endforelse
        </ul>
    
        <h5>Ultimi annunci rifiutati</h5>
        <ul>
            @forelse ($lastRejected as $announcement)
                <li>
                    {{ $announcement->title }} - 
                    <small>{{ $announcement->updated_at->format('d/m/Y H:i') }}</small>
                </li>
            @empty
                <li>Nessun annuncio rifiutato recentemente.</li>
            @endforelse
        </ul>
    </div>
    
    @endif
    {{-- <div class="container-fluid pt-5"> --}}
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-6">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="diplay-5 text-center pt-2 pb-2">
                        Revisor Dashboard
                    </h1>
                </div>
            </div>
        </div>
        @if ($announcement_to_check)
            <div class="row justify-content-center pt-5">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-6 col-md-4 text-center">
                                <img src="https://picsum.photos/300" class="img-fluid rounded shadow"
                                    alt="immaginesegnaposto">
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-md-4 ps-4 d-flex flex-column justify-content-beetween">
                    <div>
                        <h1>{{ $announcement_to_check->title }}</h1>
                        <h3> Autore: {{ $announcement_to_check->user->name }}</h3>
                        <h4>Prezzo: {{ $announcement_to_check->price }}</h4>
                        {{-- <h4 class="fst-italic text-muted"># {{ $announcement_to_check->created_at->category->name }}
                        </h4> --}}
                        <p class="h6">{{ $announcement_to_check->description }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{route('accept', ['announcement' => $announcement_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-custom">Accetta Annuncio</button>
                        </form>
                        <form action="{{route('reject', ['announcement' => $announcement_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-custom">Rifiuta Annuncio</button>
                        </form>
                    </div>
                </div>
            {{-- </div> --}}
        @else
            <div class="row justify-content-center pt-5 align-items-center">
                <div class="col-12">
                    <h1 class="fst-italic display-4">
                        Nessun articolo da revisionare
                    </h1>
                    <a href="{{ route('home.page') }}" class="btn btn-custom">Torna alla Home</a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
