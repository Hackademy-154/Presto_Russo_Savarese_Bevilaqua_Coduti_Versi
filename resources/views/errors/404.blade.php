<x-layout>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-8">
                <h1 class="display-3 fw-bold" style="font-size: 5rem; color: #136d60;">404</h1>
                <p class="lead" style="font-size: 1.5rem; color: #555;">Ops! La pagina che stai cercando non esiste.</p>
                <div class="mt-5">
                    <img src="{{ asset('images/error404.png') }}" alt="Illustration" class="img-fluid"
                        style="max-width: 50%; height: auto; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1); border-radius: 15px;">
                </div>
            </div>
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg mt-3"
                style="background-color: #13c1ac; color: white; font-weight: bold; padding: 12px 30px; border-radius: 30px;">Torna
                alla home</a>
        </div>
    </div>
</x-layout>
