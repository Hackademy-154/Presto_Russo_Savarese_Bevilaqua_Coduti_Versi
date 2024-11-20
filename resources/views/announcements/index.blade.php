<x-layout>

        <h1 class="px-5 mt-5 text-center">Pagina Annunci</h1>
        <div class="container dimensionepagina" >
            <div class="row justify-content-center">
                @forelse ($announcements as $announcement)
                <div class="col-12 col-lg-3 col-md-4 mt-5 mb-4 d-flex justify-content-center" >

                    <x-cardsIndex :announcement="$announcement" />

                </div>
                    @empty

                    <div class="col-12 ">
                        <h2>Al Momento Non Sono Presenti Annunci Disponibili! Saranno Caricati in Futuro!</h2>
                    </div>

                    @endforelse
            </div>
        </div>
        {{-- PAGINAZIONE SE N2ON CAPITE COSA SIA --}}
        <div class="d-flex justify-content-center">
            {{ $announcements->links() }}
        </div>

    </x-layout>
