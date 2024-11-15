<x-layout>
    
        <h1>Pagina Annunci</h1>
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-12  mb-4 d-flex justify-content around" >
                    @forelse ($announcements as $announcement) 
                    
                    <x-cardsIndex :announcement="$announcement" />
                    
                    @empty
                    
                    <div class="col-12">
                        <h2>Al Momento Non Sono Presenti Annunci Disponibili! Saranno Caricati in Futuro!</h2>
                    </div>
                    
                    @endforelse
                </div>
            </div>   
        </div> 
        {{-- PAGINAZIONE SE NON CAPITE COSA SIA --}}
        <div class="d-flex justify-content-center">
            {{ $announcements->links() }}
        </div>
    </x-layout>
    