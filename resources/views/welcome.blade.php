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
    <p id="questionTitle">Sei già registrato?</p>
    <div class="button-group">
        <button class="btn btn-custom" id="yesButton">Sì</button>
        <button class="btn btn-custom" id="noButton">No</button>
    </div>
    
    <div id="loginButton" class="mt-3" style="display: none;">
        <a class="btn btn-custom" href="{{ route('login') }}">
            Accedi
        </a>
    </div>
    
    <div id="registerButton" class="mt-3" style="display: none;">
        <a class="btn btn-custom" href="{{ route('register') }}">
            Registrati
        </a>
    </div>
    
    <div id="backButton" class="mt-3" style="display: none;">
        <p id="backTitle" style="display: none;">Se hai sbagliato scelta premi il tasto indietro</p>
        <button class="btn btn-custom" id="backToChoices">Indietro</button>
    </div>
</div>
@endguest

</div>


</x-layout>