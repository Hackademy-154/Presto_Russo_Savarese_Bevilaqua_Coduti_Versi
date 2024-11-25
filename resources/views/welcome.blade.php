<x-layout>
    {{-- Messaggi di errore e successo --}}
    <div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-12">
            @if (session()->has('errorMessage'))
                <div class="alert alert-danger text-center shadow rounded">
                    {{ session('errorMessage') }}
                </div>
            @endif
            @if (session()->has('message'))
                <div class="alert alert-success text-center shadow rounded">
                    {{ session('message') }}
                </div>
            @endif

        </div>
    </div>
</div>

    {{-- <div class=" d-flex align-items-center border border-primary"> --}}
    <div class="container-fluid hero-section">
        <div class="row justify-content-center p-0 m-0 g-0 align-items-center">
            <div class="col text-start text-light landingbox1 m-0 p-0 justify-content-center align-items-center ms-auto">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 hero-text-box p-4 ms-auto h-100 justify-content-center">
                    <h1>{{__('ui.frase0pz1')}} <span class="fw-bolder">{{__('ui.frase0pz2')}}</span>,{{__('ui.frase0pz3')}}<br> {{__('ui.frase0pz4')}}.</h1>
                    <h1>{{__('ui.frase0pz5')}} <span class="fw-bolder">presto.it</span> {{__('ui.frase0pz6')}} !</h1>
                        <a href="#" class="btn btn-hero mt-3">{{__('ui.startselling')}}</a>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 m-0 p-0 h-100 me-auto">
                <img src="{{ asset('images/landing.jpeg') }}" alt="Landing" class="h-100">
            </div>
        </div>
    </div>
    {{-- </div> --}}


    <!-- Prima Sezione -->
    <div class="container my-5">
        <div class="row align-items-center mb-5">
            <div class="col-12 col-md-6 text-center">
                <div class="category-box">
                    <img src="{{ asset('images/char.jpg') }}" alt="Immagine Categoria 1" class="category-img ">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h3 class="category-title">{{__('ui.frase1pz1')}} <span class="highlight">{{__('ui.frase1pz2')}}</span>
                    {{__('ui.frase1pz3')}}?</h3>
                <p class="category-description">{{__('ui.frase1pz4')}}!
                </p>
                <a href="#" class="btn btn-custom">{{__('ui.buyNow')}}</a>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-12 col-md-6 order-md-2 text-center">
                <div class="category-box">
                    <img src="{{ asset('images/shopping.jpg') }}" alt="Immagine Categoria 2" class="category-img">
                </div>
            </div>
            <div class="col-12 col-md-6 order-md-1">
                <h3 class="category-title">{{__('ui.frase2pz1')}}<span class="highlight"> {{__('ui.frase2pz2')}}!</span></h3>
                <p class="category-description"> {{__('ui.frase3')}}.</p>
                <a href="#" class="btn btn-custom">{{__('ui.buyNow')}}</a>
            </div>
        </div>
    </div>


    {{-- Sezione ultimi annunci --}}
    <section class="latest-announcements">
        <div class="container text-center">
            <h2 class="section-title">{{__('ui.sixAnnouncements')}}</h2>
            <div class="row justify-content-center px-5">
                @forelse($announcements as $announcement)
                <div class="col-12 col-md-6 col-lg-4 announcement-card">
                    <a href="{{ route('announcements.show', $announcement->id) }}" class="card-link" style="text-decoration: none; color: inherit;">
                        <div class="card">
                            <img src="{{ $announcement->images->isNotEmpty() ? $announcement->images->first()->getUrl(500, 700) : 'https://picsum.photos/200'}}" class="card-img-top" alt="{{ $announcement->title }}">

                            <div class="card-body">
                                <h5 class="card-title">{{ $announcement->title }}</h5>
                                <p class="card-text">{{ $announcement->description }}</p>
                                <p class="card-price">{{ $announcement->price }} €</p>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                    <div class="col-12">
                        <p class="no-announcements">{{__('ui.noAnnouncements')}}</p>
                    </div>
                @endforelse
            </div>
            <a href="{{ route('announcements.index') }}" class="btn btn-primary mt-4">{{__('ui.viewAnnouncements')}}</a>
        </div>
    </section>
</x-layout>
