<footer class="py-3 container-fluid background-footer mt-5">
    <div class="px-3 row justify-content-between">
        <!-- Aiuto & Contatti -->
        <div class="col-12 col-md-3 mb-2">
            <h5 class="text-nowrap fw-bold text-start"><i class="bi bi-question-circle"></i> Aiuto & Contatti</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-body-secondary">Pagamenti</a></li>
                <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-body-secondary">Contanti</a></li>
                <!-- Policy -->
                <br>

            </ul>
            <h5 class="fw-bold"><i class="bi bi-info-circle"></i> Policy</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-body-secondary">Termini di
                        servizio</a></li>
                <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-body-secondary">Cookies</a></li>
            </ul>

        </div>

        <!-- Partners -->
        <div class="col-12 col-md-3 mb-2">
            <h5 class="fw-bold"><i class="bi bi-truck"></i> Partners</h5>
            <ul class="nav flex-wrap align-items-start">
                <li class="nav-item mx-1 my-1"><a href="#" class="nav-link p-0"><img
                            class="img-fluid footer-icon-size" src="{{ asset('icons/DHL_Group_06.2023.svg.jpg') }}"
                            alt="dhl"></a></li>
                <li class="nav-item mx-1 my-1"><a href="#" class="nav-link p-0"><img
                            class="img-fluid footer-icon-size" src="{{ asset('icons/Web-Ready-Small-DPD-icon.jpg') }}"
                            alt="dpd"></a></li>
                <li class="nav-item mx-1 my-1"><a href="#" class="nav-link p-0"><img
                            class="img-fluid footer-icon-size"
                            src="{{ asset('icons/fedex-logo-free-download-free-vector-1.jpg') }}" alt="fedex"></a>
                </li>
                <li class="nav-item mx-1 my-1"><a href="#" class="nav-link p-0"><img
                            class="img-fluid footer-icon-size" src="{{ asset('icons/Logo-GLS-1080x1080px.svg.png') }}"
                            alt="gls"></a></li>
            </ul>
        </div>


        <!-- Social -->
        <div class="col-12 col-md-3 mb-2">
            <h5 class="text-start fw-bold">SEGUICI SUI SOCIAL</h5>
            <ul class="list-unstyled d-flex align-items-star">
                <li class="mx-2"><a href="#"><i class="text-black bi bi-facebook"
                            style="font-size: 3.1rem;"></i></a></li>
                <li class="mx-2"><a href="#"><i class="text-black bi bi-twitter-x"
                            style="font-size: 3.1rem;"></i></a></li>
                <li class="mx-2"><a href="#"><i class="text-black bi bi-instagram"
                            style="font-size: 3.1rem;"></i></a></li>
            </ul>
        </div>

        <div class="col-12 col-md-3 mb-2">
            <h5 class="text-start fw-bold bi bi-person-workspace "> Lavora Con Noi</h5>
            <p class="text-start text-nowrap " style="font-size: 15px">Cliccando Il Bottone SottoStante <br> Farai Una
                Richiesta Al Nostro Amministratore</p>
            <a href="{{ route('revisor.request') }}" class="btn btn-info">Diventa Un Revisor</a>
        </div>
    </div>

    {{-- ! Top footer end, bottom footer start --}}

    <!-- Flags e Copyright -->
    <div class="d-flex flex-wrap justify-content-between align-items-center py-2 border-top">
        <div class="d-flex flex-wrap justify-content-center">
            <a class="mx-2" href="#"><img class="img-fluid flag-size"
                    src="{{ asset('icons/icons8-islanda-circolare-96.png') }}" alt="Islanda"></a>
            <a class="mx-2" href="#"><img class="img-fluid flag-size"
                    src="{{ asset('icons/icons8-usa-circolare-96.png') }}" alt="America"></a>
            <a class="mx-2" href="#"><img class="img-fluid flag-size"
                    src="{{ asset('icons/icons8-circolare-tedesca-96.png') }}" alt="Germania"></a>
            <a class="mx-2" href="#"><img class="img-fluid flag-size"
                    src="{{ asset('icons/icons8-spagna2-circolare-96.png') }}" alt="Spagna"></a>
            <a class="mx-2" href="#"><img class="img-fluid flag-size"
                    src="{{ asset('icons/icons8-circolare-olandese-96.png') }}" alt="Olanda"></a>
            <a class="mx-2" href="#"><img class="img-fluid flag-size"
                    src="{{ asset('icons/icons8-belgio-circolare-96.png') }}" alt="Belgio"></a>
            <a class="mx-2" href="#"><img class="img-fluid flag-size"
                    src="{{ asset('icons/icons8-france-96.png') }}" alt="Francia"></a>
            <a class="mx-2" href="#"><img class="img-fluid flag-size"
                    src="{{ asset('icons/icons8-circolare-italia-48.png') }}" alt="Italia"></a>
        </div>
        <p class="mx-3 text-center fw-bold justify-item-center">© 2024 Presto.it</p>
    </div>
</footer>
