<x-layout>

    {{-- Sezione principale, spostata sotto la navbar --}}
    <div class="bg-image">
        <div class="container container-detail">
            <div class="row">
                @if (session('message'))
                    <div class="alert alert-success mt-4">
                        {{ session('message') }}
                    </div>
                @elseif (session('messageReject'))
                    <div class="alert alert-danger mt-4">
                        {{ session('messageReject') }}
                    </div>
                @endif
                {{-- Colonna sinistra - Carosello --}}
                <div class="col-12 col-md-6 mt-5">
                    <div class="row">
                        <div class="col-12 text-white mb-3">
                            {{-- Carosello immagini o segnaposto --}}
                            @if ($article_to_check && $article_to_check->images->count() > 0)
                                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($article_to_check->images as $key => $image)
                                            <div class="carousel-item @if ($loop->first) active @endif"
                                                data-image-index="{{ $key }}">
                                                <img src="{{ $image->getUrl(1300, 900) }}"
                                                    class="d-block w-100 rounded-3 custom-carousel-image"
                                                    alt="Immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    @if ($article_to_check->images->count() > 1)
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExample" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Precedente</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExample" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Successiva</span>
                                        </button>
                                    @endif
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-12 mb-3 custom-revisor-image">
                                        <img src="/media/header/imgRevisor.png" class="d-block w-100 rounded-3 shadow"
                                            alt="immagine segnaposto">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Colonna destra - Dettagli articolo e controlli revisore --}}
                <div class="col-12 col-md-6 product-details-right mt-5">
                    @if ($article_to_check)
                        <h1 class="mb-3 text-center title-show">{{ $article_to_check->title }}</h1>
                        <div class="col-detail-revisor1">
                            <p class="text-muted detail-category">
                                <small class="fw-bold tx-white">{{ __('ui.categoria') }}:
                                    <a href="#" class="btn btn-outline-light btn-sm">
                                        {{ __('ui.' . $article_to_check->category->name) }}
                                    </a>
                                </small>
                            </p>
                            <h3 class="price detail-price text-center">{{ $article_to_check->price }} €</h3>
                            <p class="fw-bold tx-white autor-revisor">{{ __('ui.autore') }}:
                                {{ $article_to_check->user->name }}</p>
                        </div>

                        {{-- Sezione per Labels e Ratings (aggiornata da JavaScript) --}}
                        <div class="row  col-detail3 ">
                            {{-- Labels --}}
                            <div class=" col-3 col-md-5 p-0 m-0 ">
                                <div class="card-body mediaQ">
                                    <h5 class="tx-black fw-bold">Labels</h5>
                                    <div id="imageLabels">
                                        {{-- Contenuto aggiornato da JavaScript --}}
                                        @if ($article_to_check->images->first() && $article_to_check->images->first()->labels)
                                            @foreach ($article_to_check->images->first()->labels as $label)
                                                #{{ $label }},
                                            @endforeach
                                        @else
                                            <p class="fst-italic">No labels</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- Ratings --}}
                            <div class="col-2 col-md-7 p-0 m-0">
                                <div class="card-body d-flex flex-column mediaQ2">
                                    <h5 class=" me-1 text-center tx-black fw-bold">Ratings</h5>
                                    <div id="imageRatings">
                                        {{-- Contenuto aggiornato da JavaScript --}}
                                        @if ($article_to_check->images->first())
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto" id="ratingAdult">
                                                        {{ $article_to_check->images->first()->adult }}
                                                    </div>
                                                </div>
                                                <div class="col-10"><span class="dimensioni tx-brown">adult</span></div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto" id="ratingViolence">
                                                        {{ $article_to_check->images->first()->violence }}
                                                    </div>
                                                </div>
                                                <div class="col-10">violence</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto" id="ratingSpoof">
                                                        {{ $article_to_check->images->first()->spoof }}
                                                    </div>
                                                </div>
                                                <div class="col-10">spoof</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto" id="ratingRacy">
                                                        {{ $article_to_check->images->first()->racy }}
                                                    </div>
                                                </div>
                                                <div class="col-10">racy</div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto" id="ratingMedical">
                                                        {{ $article_to_check->images->first()->medical }}
                                                    </div>
                                                </div>
                                                <div class="col-10">medical</div>
                                            </div>
                                        @else
                                            <p class="fst-italic">No ratings available.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Fine sezione Labels e Ratings --}}

                        <div class="d-flex justify-content-center gap-3 mt-3">
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-accept px-4 py-2 fw-bold">{{ __('ui.accetta') }}</button>
                            </form>
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-reject px-3 py-2 fw-bold">{{ __('ui.rifiuta') }}</button>
                            </form>
                        </div>
                    @else
                        <div class="text-center mt-5">
                            <h1 class="text-center display-4 fw-bold">
                                {{ __('ui.Ottimolavoro!Nonhainessunarticolodarevisionare') }}</h1>

                            <a href="{{ route('home') }}"
                                class="btn btn-custom-revisor text-center tx-white fw-bold mt-2">{{ __('ui.tornaHomepage') }}</a>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Descrizione dettagliata --}}
            @if ($article_to_check)
                <div class="row mt-5">
                    <h3 class="tx-black fw-bold">{{ __('ui.descrizioneDettagliata') }}</h3>
                    <div class="col-12 col-detail2">
                        <div class="description-section">
                            <p class="tx-black fw-bold m-0">{{ __('ui.descrizione') }}:</p>
                            <p class="text-muted pt-1">
                                {{ $article_to_check->description ?? 'Nessuna descrizione disponibile.' }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Sezione articoli revisionati di recente --}}
            @if ($recent_articles->count())
                <div class="row justify-content-center mt-5">
                    <div class="col-md-10">
                        <h2 class="text-center tx-black display-5 fw-bold mb-4">
                            {{ __('ui.articoliRevisionatiDiRecente') }}</h2>
                        <ul class="list-group article-check">
                            @foreach ($recent_articles as $article)
                                <li class="list-group-item d-flex justify-content-between align-items-center mb-2">
                                    <div class="tx-black fw-bold">
                                        <strong class=""> {{ __('ui.titoloAnnuncio') }}:
                                            {{ $article->title }}</strong><span> -
                                            {{ __('ui.stato') }}:</span>
                                        @if ($article->is_accepted)
                                            <span class="text-success ">{{ __('ui.accettato') }}</span>
                                        @else
                                            <span class="text-danger">{{ __('ui.rifiutato') }}</span>
                                        @endif
                                    </div>
                                    <form action="{{ route('undo', ['article' => $article]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button
                                            class="btn btn-custom-revisor2 btn-sm rounded-5 text-center tx-black fw-bold ">{{ __('ui.annullaRevisione') }}</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Aggiungi qui il codice JavaScript --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let myCarousel = document.querySelectorAll('#carouselExample');

                // Prepara i dati delle immagini per JavaScript
                // Assicurati che $article_to_check esista e abbia immagini
                @if ($article_to_check && $article_to_check->images->count() > 0)
                    var allImageData = [];
                    @foreach ($article_to_check->images as $image)
                        allImageData.push({
                            labels: @json($image->labels ?? []),
                            adult: '{{ $image->adult ?? '' }}',
                            violence: '{{ $image->violence ?? '' }}',
                            spoof: '{{ $image->spoof ?? '' }}',
                            racy: '{{ $image->racy ?? '' }}',
                            medical: '{{ $image->medical ?? '' }}'
                        });
                        console.log('allImageData: ', allImageData);
                    @endforeach
                @else
                    console.log('allImageData 245: ', allImageData);

                    let allImageData = [];
                @endif

                // Funzione per aggiornare le labels e i ratings
                function updateImageInfo(index) {
                    if (allImageData.length === 0 || index < 0 || index >= allImageData.length) {
                        document.querySelector('imageLabels').innerHTML = '<p class="fst-italic">No labels</p>';
                        document.querySelector('imageRatings').innerHTML =
                            '<p class="fst-italic">No ratings available.</p>';
                        return;
                    }

                    let currentImage = allImageData[index];

                    // Aggiorna le Labels
                    let labelsHtml = '';
                    if (currentImage.labels && currentImage.labels.length > 0) {
                        currentImage.labels.forEach(function(label) {
                            labelsHtml += '#' + label + ', ';
                        });
                        // Rimuovi la virgola finale se presente
                        labelsHtml = labelsHtml.replace(/, $/, '');
                    } else {
                        labelsHtml = '<p class="fst-italic">No labels</p>';
                    }
                    document.querySelectorAll('imageLabels').innerHTML = labelsHtml;

                    // Aggiorna i Ratings
                    let ratingsHtml = `
                    <div class="row sizeRowDetail3">
                        <div class="col-2">
                            <div class="text-center mx-auto ${currentImage.adult}"></div>
                        </div>
                        <div class="col-10"><span>Adult</span></div>
                    </div>
                    <div class="row sizeRowDetail3">
                        <div class="col-2 ">
                            <div class="text-center mx-auto  ${currentImage.violence}"></div>
                        </div>
                        <div class="col-10"> <span>Violence</span></div>
                    </div>
                    <div class="row sizeRowDetail3">
                        <div class="col-2">
                            <div class="text-center mx-auto ${currentImage.spoof}"></div>
                        </div>
                        <div class="col-10"> <span>Spoof</span></div>
                    </div>
                    <div class="row sizeRowDetail3">
                        <div class="col-2">
                            <div class="text-center mx-auto ${currentImage.racy}"></div>
                        </div>
                        <div class="col-10"><span>Racy</span></div>
                    </div>
                    <div class="row sizeRowDetail3">
                        <div class="col-2">
                            <div class="text-center mx-auto ${currentImage.medical}"></div>
                        </div>
                        <div class="col-10"><span>Medical</span></div></div>
                    </div>
                `;
                    document.getElementById('imageRatings').innerHTML = ratingsHtml;
                }

                if (myCarousel) {
                    // Aggiorna le info della prima immagine al caricamento della pagina
                    updateImageInfo(0);

                    // Aggiungi l'event listener per il cambio di slide del carosello
                    myCarousel.addEventListener('slid.bs.carousel', function(event) {
                        let activeCarouselItem = event
                            .relatedTarget; // L'elemento della slide che sta diventando attiva
                        let newIndex = parseInt(activeCarouselItem.getAttribute('data-image-index'));
                        updateImageInfo(newIndex);
                    });
                }
            });
        </script>
    @endpush
</x-layout>
