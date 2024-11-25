<x-layout>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 text-center mt-5">
                <h1 class="display-2">{{__('ui.announcementsbyCat')}}<span class="fst-italic fw-bold"><br>{{__("ui.$category->name")}}</span></h1>
            </div>
        </div>
    </div>

    <div class="container" >
        <div class="row justify-content-center">
            @forelse ($announcements as $announcement)
            <div class="col-12 col-md-4 mb-4 d-flex justify-content around" >

                <x-cardsIndex :announcement="$announcement" />

            </div>
                @empty

                <div class="col-12 text-center">
                    <h2>{{__('ui.announcementsWarning')}}!</h2>
                </div>

                @endforelse
        </div>
    </div>
</x-layout>
