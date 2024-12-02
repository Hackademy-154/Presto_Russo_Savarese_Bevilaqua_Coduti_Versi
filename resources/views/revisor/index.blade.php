<x-layout>
    <div class="container py-5">
        {{-- Messaggio di successo --}}
        @if (session()->has('message'))
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="alert alert-success text-center shadow rounded-pill p-3">
                    {{ session('message') }}
                </div>
            </div>
        </div>
        @endif
        
        {{-- Titolo della dashboard --}}
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-8">
                <div class="rounded shadow bg-light text-center p-4">
                    <h1 class="display-4 fw-bold text-dark">Revisor Dashboard</h1>
                </div>
            </div>
        </div>
        
    
        
        {{-- Se ci sono annunci da revisionare --}}
        @if ($announcement_to_check)
        <div class="row mt-5 align-items-start">
            {{-- Carosello immagini --}}
            <div class="col-12 col-md-6">
                <div id="fixedCarousel" class="carousel slide shadow" data-bs-ride="carousel">
                    <div class="carousel-inner" style="position: relative">

                        @foreach ($announcement_to_check->images as $key => $image)
                        
                        {{-- <div class="fixed-top-center " style="position: absolute; top:0; left:0%; transform:translateX(-50); width:100%; text-align: center;" >
                            <div class="col-md-5 ps-1">
                                <div class="card-body bg-white d-flex justify-content-center mx-auto">
                                    <h5>Labels</h5>
                                    @if($image->labels){
                                        @foreach($image->labels as $label)
                                        <p class="btn btn-info p-0 m-0">#{{$label}},</p>
                                        @endforeach
                                    }@else
                                    <p class="fst-italic">No labels</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="fixed-bottom-center" style="position: absolute; bottom:0; left:0%; transform:translateX(-50); width:100%; text-align: center;">
                            <div class="col-md-3bg-white ">
                                <div class="card-body d-flex ">
                                    <h5 class="card-title">Rating</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-2 ">
                                            <div class="text-center mx-auto {{$image->adult}}">
                                            </div>
                                        </div>
                                        <div class="col-10">adult</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{$image->violence}}">
                                            </div>
                                        </div>
                                        <div class="col-10">violence</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{$image->racy}}">
                                            </div>
                                        </div>
                                        <div class="col-10">racy</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{$image->medical}}">
                                            </div>
                                        </div>
                                        <div class="col-10">medical</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{$image->spoof}}">
                                            </div>
                                        </div>
                                        <div class="col-10">spoof</div>
                                    </div>
                                </div> 
                            </div>
                        </div> --}}
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ $image->getUrl(700,1000) }}" class="d-block w-100 img-custom"
                            alt="Immagine {{ $key + 1 }} dell'annuncio '{{ $announcement_to_check->title }}'">
                            <div class="ratingsCarousel mt-3" style="position: absolute; top: 0; left: 50%; transform: translateX(-50%); z-index: 10;">
                                <div class="card-body d-flex justify-content-center text-white bg-dark pe-4 ps-4 rounded mb-2">
                                    <h5 class="noto-bold">Ratings</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{ $image->adult }}"></div>
                                        </div>
                                        <div class="col-10">Adult</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{ $image->violence }}"></div>
                                        </div>
                                        <div class="col-10">Violence</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{ $image->spoof }}"></div>
                                        </div>
                                        <div class="col-10">Spoof</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{ $image->racy }}"></div>
                                        </div>
                                        <div class="col-10">Racy</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{ $image->medical }}"></div>
                                        </div>
                                        <div class="col-10">Medical</div>
                                    </div>
                                </div>
                            </div>
                            <div class="labelCarousel mb-2" style="width: 100%; z-index: 10;">
                                <div class="card-body bg-white p-2 rounded mt-2 d-flex justify-content-center flex-column">
                                    <h5 class="noto-bold">Labels</h5>
                                    <div class="d-flex flex-wrap justify-content-center">
                                        @if ($image->labels)
                                        @foreach ($image->labels as $label)
                                        <span class="badge bg-primary m-1">#{{ $label }}</span>
                                        @endforeach
                                        @else
                                        <p class="fst-italic">No labels</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    
                    {{-- Controlli --}}
                    <button class="carousel-control-prev" type="button" data-bs-target="#fixedCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#fixedCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    
    {{-- Dettagli annuncio --}}
    <div class="col-12 col-md-6">
        <div class="p-4 bg-light shadow rounded">
            <h2 class="fw-bold">{{ $announcement_to_check->title }}</h2>
            <p class="text-muted">{{ $announcement_to_check->description }}</p>
            <p class="h5 text-success">{{ __('ui.price') }}: €{{ $announcement_to_check->price }}</p>
            <div class="d-flex justify-content-between mt-4">
                {{-- Pulsanti --}}
                <form action="{{ route('revisor.reject', ['announcement' => $announcement_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                    class="btn btn-outline-danger w-100 me-2 rounded-pill">{{ __('ui.reject') }}</button>
                </form>
                <form action="{{ route('revisor.accept', ['announcement' => $announcement_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                    class="btn btn-outline-success w-100 ms-2 rounded-pill">{{ __('ui.accept') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@else
{{-- Nessun annuncio --}}
<div class="row mt-5">
    <div class="col-12 text-center">
        <h2 class="text-muted fw-bold">{{ __('ui.emptyRevisionAnnouncements') }}.</h2>
        <a href="{{ route('home.page') }}"
        class="btn btn-primary rounded-pill mt-4 shadow">{{ __('ui.backHome') }}</a>
    </div>
</div>
@endif

{{-- Pulsanti per vedere annunci accettati e rifiutati --}}
<div class="row justify-content-center mt-5">
    <div class="col-6 col-md-3 text-center">
        <form action="{{ route('revisor.reviewAccepted') }}" method="GET">
            @csrf
            <button type="submit"
            class="btn btn-outline-success w-100 py-2 rounded-pill shadow">{{ __('ui.announcementsAccepted') }}</button>
        </form>
    </div>
    <div class="col-6 col-md-3 text-center">
        <form action="{{ route('revisor.reviewRejected') }}" method="GET">
            @csrf
            <button type="submit"
            class="btn btn-outline-danger w-100 py-2 rounded-pill shadow">{{ __('ui.announcementsRejected') }}</button>
        </form>
    </div>
</div>
</div>
</x-layout>