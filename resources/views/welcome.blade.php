<x-layout>
    
    <div class="container">
        <div class="row  d-flex justify-content-center">
            <div class="col-12 col-md-6 text-center mt-5">
                <h1>PRESTO HOMEPAGE</h1>
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
        
    </div>
    <div>
        <h2>Ultimi 6 Annunci in ordine di caricamento</h2>
        @forelse ($latestAnnouncements as $announcement) 
        
        
        <x-cardsHome :announcement="$announcement" />
        @empty
        <h2>Al Momento Non Sono Presenti Annunci Disponibili ! Saranno Caricati in Futuro!</h2>
        @endforelse
    </div>
    
    
</x-layout>
