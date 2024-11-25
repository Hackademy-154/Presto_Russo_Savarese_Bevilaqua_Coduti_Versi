<footer class="py-3 container-fluid background-footer mt-5">
    <div class="px-3 row justify-content-evenly">
        <!-- Aiuto & Contatti -->
        <div class="col-12 col-md-2 mb-2">
            <h5 class="text-nowrap fw-bold text-start"><i class="bi bi-question-circle"></i> {{__('ui.helpAndContact')}}</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-body-secondary">{{__('ui.payments')}}</a></li>
                <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-body-secondary">{{__('ui.cash')}}</a></li>
                <!-- Policy -->
                <br>

            </ul>

        </div>

        <div class="col-12 col-md-2 mb-2">
            <h5 class="fw-bold"><i class="bi bi-info-circle"></i> Policy</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-body-secondary">{{__('ui.termsofservice')}}</a></li>
                <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-body-secondary">Cookies</a></li>
            </ul>

        </div>

        <!-- Partners -->
        <div class="col-12 col-md-2 mb-2">
            <div class="container m-0 p-0">
                <!-- Titolo -->
                <div class="row m-0 p-0">
                    <div class="col-12 text-center">
                        <h5 class="fw-bold"><i class="bi bi-truck"></i> Partners</h5>
                    </div>
                </div>

                <!-- Sezione icone -->
                <div class="row justify-content-center g-2 m-0 p-0">
                    <div class="col-4 text-center">
                        <a target="_blank" href="https://www.dhl.com/us-en/home.html" class="nav-link p-0">
                            <img class="img-fluid footer-icon-size" src="{{ asset('icons/DHL_Group_06.2023.svg.jpg') }}" alt="dhl">
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <a target="_blank" href="https://www.brt.it" class="nav-link p-0">
                            <img class="img-fluid footer-icon-size" src="{{ asset('icons/Web-Ready-Small-DPD-icon.jpg') }}" alt="Bartolini">
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center g-2 m-0 p-0">


                    <div class="col-4 text-center">
                        <a target="_blank" href="https://www.fedex.com/it-it/home.html" class="nav-link p-0">
                            <img class="img-fluid footer-icon-size" src="{{ asset('icons/fedex-logo-free-download-free-vector-1.jpg') }}" alt="fedex">
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <a target="_blank" href="https://gls-group.com/IT/it/home/" class="nav-link p-0">
                            <img class="img-fluid footer-icon-size" src="{{ asset('icons/Logo-GLS-1080x1080px.svg.png') }}" alt="gls">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- <li class="nav-item mx-1 my-1"><a href="#" class="nav-link p-0"><img
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
                            alt="gls"></a></li> --}}

        <!-- Social -->
        <div class="col-12 col-md-2 mb-2">
            <h5 class="text-start fw-bold">{{__('ui.follow')}}</h5>
            <ul class="list-unstyled d-flex align-items-star">
                <li class="mx-2"><a target="_blank" href="https://www.facebook.com"><i class="text-black bi bi-facebook"
                            style="font-size: 3.1rem;"></i></a></li>
                <li class="mx-2"><a target="_blank" href="https://x.com"><i class="text-black bi bi-twitter-x"
                            style="font-size: 3.1rem;"></i></a></li>
                <li class="mx-2"><a target="_blank" href="https://www.instagram.com"><i class="text-black bi bi-instagram"
                            style="font-size: 3.1rem;"></i></a></li>
            </ul>
        </div>

    </div>






    {{-- ! Top footer end, bottom footer start --}}

    <!-- Flags e Copyright -->
    {{-- <div class="d-flex flex-wrap align-items-center py-2 border-top"> --}}
    {{-- <div class="d-flex flex-wrap justify-content-center">
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
        </div> --}}
    <p class="mx-3 text-center fw-bold justify-item-center">© 2024 Presto.it</p>
    {{-- </div> --}}
</footer>
