<x-layout>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 text-center mt-5 mb-4" style="background: linear-gradient(to right, #13c1ac, #72d1c2); border-radius: 10px; padding: 40px 30px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
                <div class="section-header">
                    <h1 class="display-3 fw-bold" style="font-size: 3rem; color: white; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); margin-bottom: 10px;">
                        {{ __('ui.announcementsbyCat') }}
                    </h1>
                    <h2 class="fst-italic text-muted" style="font-size: 1.8rem; color: white; font-style: italic; margin-top: 10px;">
                        {{ __("ui.$category->name") }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($announcements as $announcement)
            <div class="col-12 col-md-4 mb-4 d-flex justify-content-center">
                <x-cardsIndex :announcement="$announcement" />
            </div>
            @empty
            <!-- Inserisci l'immagine con il bordo -->
            <div class="container text-center mb-5">
                <img src="{{ asset('images/annuncinoncaricati.png') }}" alt="Illustration" class="img-fluid" style="max-width: 40%; height: auto; border: 5px solid var(--main-bg-color); border-radius: 15px;">
            </div>
            <div class="col-12 text-center">
                <h2 class="text-black">{{ __('ui.announcementsWarning') }}!</h2>
            </div>
            @endforelse
        </div>
    </div>

</x-layout>
