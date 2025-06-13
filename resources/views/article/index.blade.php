<x-layout>
    <section class="container-fluid header-article all-article">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center text-center mt-5 ">
                <h1 class="text-custom-all-article ">{{ __('ui.Tutti gli articoli che puoi trovare') }}</h1>
            </div>
        </div>

        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-4">
                @if (session('messageDelete'))
                    <div class="alert alert-success ">
                        {{ session('messageDelete') }}
                    </div>
                @elseif (session('messageEdit'))
                    <div class="alert alert-success">
                        {{ session('messageEdit') }}
                    </div>
            </div>
            @endif
        </div>

    </section>

    <livewire:article-filter />

</x-layout>
