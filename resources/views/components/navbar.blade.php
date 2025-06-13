<nav class="navbar navbar-expand-lg bg-lbrown customNav">
    <div class="container-fluid p-0">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="/media/logo/logoCopia.png" alt=""
                class="logo-nav img-fluid "></a>
        <a class="nav-link tx-black fw-bold home-link colorHoverColor" aria-current="page"
            href="{{ route('home') }}">Home</a>

        <button class="navbar-toggler burger-collapse" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse custom-collapse" id="navbarSupportedContent">

            {{-- Link a sinistra --}}
            <ul class="navbar-nav mb-2 mb-lg-0 me-auto order-2 order-md-2 order-lg-1">
                <li class="nav-item link-articoli-nav">
                    <a class="nav-link tx-black fw-bold  colorHoverColor"
                        href="{{ route('article.index') }}">{{ __('ui.articoli') }}</a>
                </li>
            </ul>

            {{-- Searchbar centrata --}}
            <form class="d-flex searchbar order-3 order-md-4 order-lg-2" role="search" method="GET"
                action="{{ route('article.search') }}">
                <input class="form-control search-shadow rounded-4 me-2" type="search"
                    placeholder="{{ __('ui.trovaIlTuoArticolo') }}" aria-label="Search" name="query" />
                <button class="btn-custom" type="submit" id="basic-addon2"><i
                        class="fa-solid fa-magnifying-glass fa-bounce search-custom fa-lg tx-black"></i></button>
            </form>
            {{-- Componente per scegliere la lingua --}}
            <ul class="navbar-nav flagCustom  mb-lg-0 order-2 order-md-3 order-lg-4 fw-bold">
                <li class="nav-item dropdown link-articoli-nav  ">
                    <a class="nav-link dropdown-toggle me-3" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('vendor/blade-flags/language-' . app()->getLocale() . '.svg') }}"
                            class="img-language">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <ul class="dropdown-menu list-unstyled">
                        <li><a class="dropdown-item fw-bold" href="#"><x-_locale lang="it" />Italiano</a>
                        </li>
                        <li><a class="dropdown-item fw-bold" href="#"><x-_locale lang="en" />English</a></li>
                        <li><a class="dropdown-item fw-bold" href="#"><x-_locale lang="es" />Espanol</a></li>
                    </ul>
                </li>
            </ul>



            {{-- Menu utente a destra --}}
            <ul class="navbar-nav order-1 order-md-1 order-lg-3 utente-nav">
                <li class="nav-item dropdown">
                    {{-- <a class="nav-link dropdown-toggle tx-black fw-bold" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.ciao') }} {{ Auth::user()->name ?? __('ui.ospite') }}
                    </a> --}}
                    <a class="nav-link dropdown-toggle d-flex align-items-center tx-black fw-bold" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @auth
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="Foto profilo" class="rounded-circle me-2 img-profile-nav">
                            {{ __('ui.ciao') }} {{ Auth::user()->name }}
                        @else
                            {{ __('ui.ciao') }} {{ __('ui.ospite') }}
                        @endauth
                    </a>

                    <ul class="dropdown-menu">
                        @guest
                            <li><a class="dropdown-item tx-black fw-bold"
                                    href="{{ route('login') }}">{{ __('ui.login') }}</a></li>
                            <li><a class="dropdown-item tx-black fw-bold"
                                    href="{{ route('register') }}">{{ __('ui.register') }}</a></li>
                        @endguest
                        @auth
                            @if (Auth::user()->is_revisor)
                                {{-- nello spam dobbiamo gestire le misure del tondino di notifica in css top e start --}}
                                <a class="dropdown-item tx-black fw-bold"
                                    href="{{ route('revisor.index') }}">{{ __('ui.zonaRevisore') }} <span
                                        class="position-absolute ms-1  badge rounded-pill bg-dark">{{ \App\Models\Article::toBeRevisedCount() }}</span></a>
                                <a href="{{ route('auth.dashboard') }}"
                                    class="dropdown-item tx-black fw-bold">Dashboard</a>
                            @else
                                {{-- prova bottone diventa revisore --}}
                                <a href="{{ route('revisor.career') }}"
                                    class="dropdown-item tx-black fw-bold">{{ __('ui.diventaRevisore') }}</a>
                                <a href="{{ route('auth.dashboard') }}"
                                    class="dropdown-item tx-black fw-bold">Dashboard</a>
                            @endif
                            <a class="dropdown-item tx-black fw-bold" href="#"
                                onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
                                {{ __('ui.logout') }}
                            </a>
                    </li>
                    <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
                        @csrf
                    </form>
                @endauth
            </ul>
            </li>
            </ul>
            <a href="{{ route('article.create') }}" class="text-decoration-none order-4 order-md-5 order-lg-5">
                <button class="btn btn-custom2 fw-bold text-white">
                    {{ __('ui.inserisciAnnuncio') }}
                </button>
            </a>
        </div>
    </div>
    {{-- mini nav --}}
</nav>
