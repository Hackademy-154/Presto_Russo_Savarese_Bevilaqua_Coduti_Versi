<x-layout>
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Hero Section -->
    <div class="container-fluid p-0">
        <div class="hero-section-with-overlay position-relative">
            <!-- Immagine di sfondo -->
            <img src="{{ asset('images/smiley happy peole.jpeg') }}" alt="Hero Image" class="img-fluid">
            <!-- Overlay scura -->
            <div class="hero-overlay-specific position-absolute top-0 start-0 w-100 h-100"></div>
            <!-- Testo centrato -->
            <div class="hero-text position-absolute top-50 start-50 translate-middle text-center text-white">
                <h1 class="display-4 fw-bold text-uppercase">Diventa un revisore di</h1>
                <h1 class="display-4 fw-bold text-uppercase">presto.it!</h1>
            </div>
        </div>
    </div>


    <!-- Descrizione Revisore -->
    <div class="container my-5">
        <p class="lead text-center">
            Aiutaci a garantire la <span class="fw-bold">qualità</span> degli annunci pubblicati! Un revisore verifica
            che gli annunci rispettino
            le <span class="fw-bold">linee guida</span> del nostro sito, accettandoli o rifiutandoli in base ai criteri
            stabiliti.
        </p>
    </div>

    <!-- Sezione "Cosa significa essere un revisore?" -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('images/work.png') }}" alt="Revisore" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold">Cosa significa essere un revisore?</h2>
                <p>
                    Diventare revisore significa entrare a far parte di una comunità che si impegna a mantenere il
                    nostro sito un luogo sicuro e affidabile.
                    Verificherai gli annunci, assicurerai che non contengano contenuti inappropriati e contribuirai a
                    creare una piattaforma di alta qualità.
                </p>
                <ul class="list-unstyled mt-3">
                    <li><i class="bi bi-check-circle text-success"></i> Controllo di annunci per contenuti non conformi
                    </li>
                    <li><i class="bi bi-check-circle text-success"></i> Accettazione o rifiuto basato sulle linee guida
                    </li>
                    <li><i class="bi bi-check-circle text-success"></i> Collaborazione con un team di esperti</li>
                </ul>
                <div class="mt-4">
                    <a  class="btn btn-custom mt-3" href="{{ route('become.revisor') }}">DIVENTA REVISOR</a> 
                </div>
            </div>
        </div>
    </div>

    <!-- Vantaggi del Team -->
    <div class="container my-5 bg-light p-5 rounded shadow">
        <h2 class="text-center fw-bold mb-4">I VANTAGGI DEL NOSTRO TEAM</h2>
        <div class="row text-center">
            <div class="col-md-3">
                <i class="bi bi-house-fill text-success" style="font-size: 2rem;"></i>
                <h5 class="mt-3 fw-bold">Smartworking</h5>
                <p>Lavori da casa con i nostri strumenti digital avanzati per supportarti al meglio.</p>
            </div>
            <div class="col-md-3">
                <i class="bi bi-clock-history text-success" style="font-size: 2rem;"></i>
                <h5 class="mt-3 fw-bold">Flessibilità oraria</h5>
                <p>Offriamo una totale flessibilità oraria che si adatta alle tue esigenze.</p>
            </div>
            <div class="col-md-3">
                <i class="bi bi-person-check-fill text-success" style="font-size: 2rem;"></i>
                <h5 class="mt-3 fw-bold">Welcome on board</h5>
                <p>Un team dedicato ti guiderà fin dal primo giorno per supportarti.</p>
            </div>
            <div class="col-md-3">
                <i class="bi bi-gift-fill text-success" style="font-size: 2rem;"></i>
                <h5 class="mt-3 fw-bold">Bonus "Presenta un amico"</h5>
                <p>Porta un amico nel nostro team e riceverai un bonus esclusivo!</p>
            </div>
        </div>
    </div>
</x-layout>
