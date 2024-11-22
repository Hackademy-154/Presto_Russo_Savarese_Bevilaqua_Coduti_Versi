{{-- <x-layout>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 text-center mt-5">
                <h1>Accedi</h1>
            </div>
        </div>
    </div>

    <div class="container  pt-5">

<div class="row justify-content-center">
    <div class="col-12 col-md-6 align-items-center">
        <form action="{{ route('login') }}" method="POST" class="shadow pt-5 px-5">
            @csrf
            <div class="mb-3 row">

                <div class="col-sm-10">
                    <label for="email" class="col-sm-2 col-form-label fs-4 fw-bold">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control  @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10">
                    <label for="password" class="col-sm-2 col-form-label fs-4 fw-bold">Password</label>
                    <input type="password" name='password' id="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center py-5">
                    <button type="submit" class="btn btn-custom">Accedi</button>
                </div>
            </div>
        </form>
    </div>
</div>

    </div>
</x-layout> --}}


<x-layout>
    {{-- <body class="body-login"> --}}
        <div class="container login-container mt-3">
            <div class=" row login-box shadow justify-content-center">
                <!-- Colonna Immagine -->
                <div class="col-12 col-md-6 login-image-column d-flex justify-content-center align-items-center">
                    <img src="{{ asset('images/accedi.jpeg') }}" alt="Login Illustration" class="img-fluid">
                </div>
                <!-- Colonna Form -->
                <div class="col-12 col-md-6 login-form-column align-items-center">
                    <h1 class="login-title">Bentornato!</h1>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group pt-2 pb-2">
                            <label for="email">Indirizzo email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Inserisci la tua email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group pt-2 pb-2">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Inserisci la tua password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-custom pt-2 pb-2">Accedi a presto.it</button>
                        <p class="text-center mt-3 pb-3 pt-3">Non hai già un account? <a href="{{ route('register') }}" class="link">Registrati</a></p>
                    </form>
                </div>
            </div>
        </div>
    {{-- </body> --}}
</x-layout>
