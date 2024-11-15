<x-layout>

<div class="container">
    <div class="row wh-100 d-flex justify-content-center">
        <div class="col-12 col-md-6 text-center mt-5">
            <h1>PRESTO HOMEPAGE</h1>
        </div>
    </div>
</div>

@auth
<div class="text-center py-5">
    <a class="btn btn-custom" href="{{ route('announcements.create') }}">
        Inserisci un annuncio
    </a>
</div>
@endauth
@guest
<div class="text-center py-5">
    <a class="btn btn-custom" href="{{ route('register') }}">
        Registrati
    </a>
@endguest

</div>


</x-layout>