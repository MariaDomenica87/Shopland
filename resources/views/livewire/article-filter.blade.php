<div>
    <div class="container-fluid my-2">
        <div class="row">
            {{-- colonna sinistra --}}
            <div class="col-12 col-md-3">
                <div class="container  ">
                    <div class="row ">
                        <div class="box-filter">
                            <h4 class="filter-title mb-4 text-center fw-bold tx-brown">{{ __('ui.filtraPerPrezzo') }}</h4>
                            <div class="mb-3">
                                <label for="minPrice" class="form-label tx-brown">Min €</label>
                                <input type="number" wire:model.lazy="minPrice"
                                    placeholder="{{ __('ui.prezzoMinimo') }}" id="minPrice"
                                    class="form-control filter-input mb-2" min="0" />
                            </div>
                            <div class="mb-3">
                                <label for="maxPrice" class="form-label tx-brown ">Max €</label>
                                <input type="number" wire:model.lazy="maxPrice"
                                    placeholder="{{ __('ui.prezzoMassimo') }}" id="maxPrice"
                                    class="form-control filter-input mb-2" min="0" />
                            </div>
                            <button type="button" class="btn btn-custom2 fw-bold">
                                {{ __('ui.filtra') }}
                            </button>

                        </div>
                    </div>



                </div>
            </div>
            {{-- colonna destra --}}
            <div class="col-12 col-md-8">
                <section class="container my-4 ">
                    <div class="row  justify-content-center align-items-center ">
                        @forelse ($articles as $article)
                            <div class="col-12 col-md-4 card-index  d-flex justify-content-center align-items-center"
                                data-aos="fade-up">
                                <x-card :article="$article" />
                            </div>
                        @empty
                            <h3 class="tx-black fw-bold mt-5 pt-5">{{ __('ui.Non sono stati inseriti degli articoli') }}</h3>
                        @endforelse
                        <div class=" pagination-custom">
                            {{ $articles->links('pagination::bootstrap-5') }}
                        </div>
                    </div>

                    {{-- </section> --}}
            </div>
        </div>
    </div>



    <!-- Lista articoli -->


</div>
