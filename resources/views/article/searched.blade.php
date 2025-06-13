<x-layout>
<section class="container-fluid  customSectionHero2 "></section>


    <section class="container mt-2">
        <div class="row">
            <div class="col-12">
                <h1>{{ __('ui.risultatiDellaRicerca') }}<span class="fst-italic"> {{ $query }}</span></h1>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row justify-content-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 card-index">
                    <x-card :article="$article" />
                </div>
            @empty
                <h3 class="display-4">{{ __('ui.nessunArticoloCorrispondeAllaTuaRicerca') }}</h3>
            @endforelse
        </div>

        <div class=" pagination-custom">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    </section>
</x-layout>
