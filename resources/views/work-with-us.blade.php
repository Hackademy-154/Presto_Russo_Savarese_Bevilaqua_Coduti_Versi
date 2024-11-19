<x-layout>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container my-5">
        <!-- Hero Section -->
        <div class="text-center bg-light p-5 rounded shadow">
            <h1 class="display-4 text-primary">Diventa un nostro Revisore!</h1>
            <p class="lead mt-3 text-muted">
                Aiutaci a garantire la qualità degli annunci pubblicati! Un revisore verifica che gli annunci rispettino
                le linee guida del nostro sito, accettandoli o rifiutandoli in base ai criteri stabiliti.
            </p>
            <a href="#diventa-revisore" class="btn btn-primary btn-lg mt-4"> unisciti a noi</a>
        </div>

        <!-- Informazioni Dettagliate -->
        <section id="diventa-revisore" class="mt-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/600x400" alt="Diventa Revisore" class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                    <h2 class="text-primary">Cosa significa essere un revisore?</h2>
                    <p class="mt-3">
                        Diventare revisore significa entrare a far parte di una comunità che si impegna a mantenere il
                        nostro sito un luogo sicuro e affidabile. Verificherai gli annunci, assicurerai che non
                        contengano contenuti inappropriati e contribuirai a creare una piattaforma di alta qualità.
                    </p>
                    <ul class="list-unstyled mt-4">
                        <li><i class="bi bi-check-circle text-success"></i> Controllo di annunci per contenuti non
                            conformi</li>
                        <li><i class="bi bi-check-circle text-success"></i> Accettazione o rifiuto basato sulle linee
                            guida</li>
                        <li><i class="bi bi-check-circle text-success"></i> Collaborazione con un team di esperti</li>
                    </ul>
                    <a href="{{ route('revisor.request') }}" class="btn btn-success btn-lg mt-4">Inizia ora come Revisore</a>
                </div>
            </div>
        </section>
    </div>

</x-layout>
