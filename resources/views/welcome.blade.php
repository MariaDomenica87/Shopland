<x-layout>

    <header>
        <div class="container-fluid  m-0 p-0">
            <div class="row row-customHeader img-header m-0">
                <div
                    class="col-12 col-md-2 bg-brown d-flex flex-column justify-content-center align-items-center text-center col-customHeader">
                    <h2 class="tx-white fw-bold mb-5">{{ __('ui.acquistaevendi') }}</h2>
                    <a href="{{ route('article.index') }}" class="text-decoration-none link-btn-custom"><button
                            class="btn-customHeader fw-bold">
                            {{ __('ui.articoli') }}
                        </button>
                    </a>
                </div>
                <div class="col-12 col-md-8 text-customHeader mt-5 pt-5 px-0">
                    <h2 class="text-center fw-bold">Welcome to</h2>
                    <h1 class=" text-center fw-bold mb-3 display-3 font-shopland">ShopLand</h1>
                    <h4 class="text-center fw-bold">{{ __('ui.marketPlaceFiducia') }}</h4>
                </div>
            </div>
        </div>
    </header>
    {{-- codice di errore per chi non è revisore, visualizzato nella homepage --}}
    @if (session()->has('errorMessage'))
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-12 col-md-6 alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ session('errorMessage') }}
                </div>
            </div>
        </div>
    @endif

    {{-- messaggio di successo per chi ha richiesto di diventare revisore --}}
    @if (session()->has('message'))
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-12 col-md-6 alert alert-success mt-3 " role="alert">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif



    {{-- sezione card da vedere  --}}
    <section class="container-fluid container-card-welcome">
        <div class="row text-center row-custom-card-welcome">
            <p class=" text-customHeader2">{{ __('ui.articoliRecenti') }}</p>
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 col-custom-card-welcome card-welcome"  data-aos="fade-up">
                    <x-card :article="$article" />
                </div>
            @empty
                <h3>Non sono stati inseriti degli articoli</h3>
            @endforelse
        </div>
    </section>
</x-layout>
