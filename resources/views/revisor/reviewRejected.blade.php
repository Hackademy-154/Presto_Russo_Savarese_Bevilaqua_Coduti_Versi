<x-layout>
    <h1>Annunci Rifiutati</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-custom " href="{{ route('revisor.index') }}">Torna Dashbord Generale</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($rejectedAnnouncements as $announcement)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $announcement->title }}</h5>
                            <p class="card-text">{{ $announcement->description }}</p>
                            <p class="card-text">Prezzo: {{ $announcement->price }} €</p>
                            <form action="{{ route('revisor.reset', $announcement) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning">Reset Articolo</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $rejectedAnnouncements->links() }}
        </div>
    </div>
</x-layout>