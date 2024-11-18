<x-layout>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 text-center mt-5">
                <h1>Accedi</h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center pt-5">
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
</x-layout>
