<x-layout>

    <div class="bg-image">
        <div class="container container-detail ">
            <div class="row">
                <!-- Colonna sinistra -->
                <div class="col-12 col-md-6 mt-5">
                    <div class="row ">
                        <div class="col-12 text-white mb-3">
                            {{-- colonna di sinitsra --}}
                            {{-- Carosello principale --}}
                            @if ($article->images->count() > 0)
                                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($article->images as $key => $image)
                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                <img src="{{ $image->getUrl(1300, 900) }}"
                                                    class="d-block w-100 rounded-3 custom-carousel-image"
                                                    alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    @if ($article->images->count() > 1)
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExample" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon arrow-carousel"
                                                aria-hidden="true"></span>
                                            <span class="visually-hidden">Precedente</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExample" data-bs-slide="next">
                                            <span class="carousel-control-next-icon arrow-carousel"
                                                aria-hidden="true"></span>
                                            <span class="visually-hidden">Successiva</span>
                                        </button>
                                    @endif
                                </div>
                            @else
                                <img src="https://picsum.photos/300" alt="Nessuna foto inserita dall'utente">
                            @endif
                            {{-- Anteprime immagini --}}
                            <div class="mt-3 d-flex justify-content-center  gap-3">
                                @foreach ($article->images as $key => $image)
                                    <img src="{{ $image->getUrl(1300, 900) }}"
                                        class="img-thumbnail carousel-4-image thumb dimesion @if ($loop->first) active @endif "
                                        data-bs-target="#carouselExample" data-bs-slide-to="{{ $key }}"
                                        aria-label="" style="cursor: pointer;"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonna destra -->
                <div class="col-12 col-md-6 product-details-right mt-5 ">
                    <h1 class="mb-3 title-show">{{ $article->title }}</h1>
                    {{-- Qui puoi aggiungere altri dettagli come quantità, colori, taglie, pulsanti acquista ecc. --}}
                    <div class="col-detail1">
                        <p class="text-muted detail-category">
                            <small class="fw-bold tx-black">{{ __('ui.categoria') }}:
                                @if (isset($article->category))
                                    <a href="{{ route('article.index-category', $article->category) }}"
                                        class="btn btn-dark btn-sm  ">
                                        {{ __('ui.' . $article->category->name) }}
                                    </a>
                                @else
                                    N/D
                                @endif
                            </small>
                        </p>
                        <h3 class="price detail-price text-center">{{ $article->price }} €</h3>
                        @auth
                            @if (Auth::user()->id === $article->user_id)
                                <div>
                                    <button type="submit" class="btn edit-button"><a
                                            href="{{ route('article.edit', $article) }}"
                                            class="link-edit">{{ __('ui.modifica') }} <i class="fa-solid fa-pen"></i></a></button>
                                </div>
                            @endif
                        @endauth

                    </div>
                    {{-- <div class="col-detail3">

                    </div> --}}

                </div>
            </div>

            <div class="row description-section">
                <h3 class="tx-black fw-bold">{{ __('ui.descrizioneDettagliata') }}</h3>
                <div class="col-12 col-detail2">
                    <div class=" ">
                        {{-- Esempio di ulteriori dettagli se necessari --}}

                        <p class="tx-black fw-bold m-0">{{ __('ui.descrizione') }}:</p>
                        <p class="text-muted pt-1">
                            {{-- Descrizione dell'articolo --}}
                            {{ $article->description }}
                        </p>
                    </div>
                </div>
            </div>

        </div>











</x-layout>
