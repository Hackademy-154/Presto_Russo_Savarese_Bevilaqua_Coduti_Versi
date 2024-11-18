<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow tounded w-50">
            {{ session('errorMessage') }}
        </div>
    @endif
    @if(session()->has('message'))
    <div class="alert alert-success text-center shadow tounded w-50">
        {{ session('message') }}
    </div>
    @endif

    <div class="container-fluid">
        <div class="row text-start">
            <div class="col-12 col-md-6 ">
                <h1 class=" px-5 font-giant">presto.it</h1>
            </div>
        </div>
    </div>

    {{-- //! Non cancellare, WIP  --}}

    <div class="container">
        <div class="row  d-flex justify-content-center">
            <div class="col-12 col-md-6 text-center mt-5 ">
            </div>
        </div>
    </div>

    @auth
        <div class="text-center py-5">
            <a class="btn btn-custom" href="{{ route('announcements.create') }}">
                Inserisci un annuncio
            </a>
        </div>
    @endauth
    @guest
        <div class="text-start py-5 px-5">
            <h1 class=" text-start">Trova ciò che cerchi in pochi <br> <a class="text-decoration-none fw-bold link-dark"
                    href="{{ route('announcements.index') }}">CLICK</a></h1>
            <a class=" btn btn-primary" href="{{ route('register') }}">
                <h5 class="buttonsize">Registrati</h5>
            </a>
        @endguest

    </div>




    <h2 class="px-5">Ultimi 6 Annunci in ordine di caricamento</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12  mb-4 d-flex justify-content around">

                @forelse ($announcements as $announcement)
                    <x-cardsHome :announcement="$announcement" />

                @empty
                    <div class="col-12">
                        <h2>Al Momento Non Sono Presenti Annunci Disponibili! Saranno Caricati in Futuro!</h2>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</x-layout>
