<x-layout>


    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-12 col-md-6">
                <h1 class=" font-giant">Presto.it</h1>
            </div>
        </div>
    </div>

{{--//! Non cancellare, WIP  --}}

    {{-- <div class="container">
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
    <div class="text-center py-5">
        <a class="btn btn-custom" href="{{ route('register') }}">
            Registrati
        </a>
        @endguest

    </div> --}}




    <h2>Ultimi 6 Annunci in ordine di caricamento</h2>
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
