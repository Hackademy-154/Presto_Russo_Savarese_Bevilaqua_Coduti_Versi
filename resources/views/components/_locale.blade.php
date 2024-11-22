<form class="d-inline" action="{{route('set.locale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn-custom">
        <img src="{{asset('vendor/blade-flags/language-'.$lang.'.svg')}}" width="30" height="30">
    </button>
</form>