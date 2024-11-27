<x-layout>
    <!-- Titolo della Pagina -->
    <div class="container text-center mt-5">
        <h1 class="text-center">{{__('ui.titleAccepted')}}</h1>
    </div>

    <!-- Pulsante per tornare alla dashboard -->
    <div class="container mt-4 mb-4">
        <div class="row justify-content-center">
            <div class="col-6 col-md-4 text-center">
                <a class="btn btn-primary btn-lg shadow-sm px-4" href="{{ route('revisor.index') }}">
                    <i class="bi bi-arrow-left-circle me-2"></i> {{ __('ui.backToDashboard') }}
                </a>
            </div>
        </div>
    </div>
    <!-- Lista degli Annunci Accettati -->
    <div class="container">
        <div class="row g-4">
            @foreach ($acceptedAnnouncements as $announcement)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 rounded">
                        <!-- Contenuto della Card -->
                        <div class="card-body">
                            <h5 class="card-title text-truncate fw-bold">{{ $announcement->title }}</h5>
                            <p class="card-text text-muted small">{{ $announcement->description }}</p>
                            <p class="card-text fw-bold text-success">Prezzo: {{ $announcement->price }} €</p>
                        </div>

                        <!-- Pulsante Reset -->
                        <div class="card-footer text-center bg-white border-0">
                            <form action="{{ route('revisor.reset', $announcement) }}" method="POST" class="mt-3">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning btn-sm w-100 rounded-pill">
                                    <i class="bi bi-arrow-clockwise"></i> {{ __('ui.resetAnnouncements') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginazione -->
        <div class="d-flex justify-content-center mt-4">
            {{ $acceptedAnnouncements->links() }}
        </div>
    </div>
</x-layout>
