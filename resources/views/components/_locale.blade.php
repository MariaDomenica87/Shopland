<form method="POST" class="d-line" action="{{route('setLocale', $lang)}}">
    @csrf

    <button type="submit" class="btn">
        <img src="{{ asset('/vendor/blade-flags/language-' . $lang . '.svg') }}" width="32" height="32" />   
    </button>

</form>