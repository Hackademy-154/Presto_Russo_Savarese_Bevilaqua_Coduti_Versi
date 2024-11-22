{{-- Da questo momento, riprendiamo noi il controllo. QUESTA SARà LA VISTA DI LOG-IN, quindi di nuovo il procedimento per la creazione classica di una pagina

<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center fw-bold"> Registrati </h1>
            </div>
        </div>
        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-6 align-items-center">
                <form action="{{ route('register') }}" method="POST" class="shadow pt-5 px-5">
                    @csrf
                    <div class="mb-3 row">

                        <div class="col-sm-10">
                            <label for="name" class="col-sm-2 col-form-label fs-4 fw-bold">Username:</label>
                            <input type="text" name="name" id="name"
                                class="form-control  @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">

                        <div class="col-sm-10">
                            <label for="email" class="col-sm-2 col-form-label fs-4 fw-bold">Email:</label>
                            <input type="text" name="email" id="email"
                                class="form-control  @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-10">
                            <label for="password" class="col-sm-2 col-form-label fs-4 fw-bold">Password:</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <label for="password_confirmation" class="col-sm-2 col-form-label fs-4 fw-bold text-nowrap">Conferma password:</label>
                                <input type="password" name='password_confirmation' id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center py-2">
                            <div class="text-center py-2">
                                <button type="submit" class="btn btn-custom">Registrati</button>
                            </div>
                        </div>
                </form>




            </div>
        </div>
    </div>
</x-layout> --}}


<x-layout>
    <div class="registration-container mt-5 container">
        <div class="registration-box shadow row">

            <!-- Colonna Immagine -->
            <div class="col-12 col-md-6 image-column d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/registrazione.png') }}" alt="Registrazione" class="img-fluid">
            </div>

            <!-- Colonna Form -->
            <div class="col-12 col-md-6 form-column">
                <h1 class="registration-title">Unisciti a <span class="highlight">presto.it</span></h1>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il tuo username">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Indirizzo email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Inserisci la tua email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Inserisci la tua password">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Conferma password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Conferma la tua password">
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-custom">Crea account</button>
                    <p class="text-center mt-3">Hai già un account? <a href="{{ route('login') }}" class="link">Accedi</a></p>
                </form>
            </div>

        </div>
    </div>

</x-layout>
