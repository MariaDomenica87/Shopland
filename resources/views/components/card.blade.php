<div class="card card-custom bg-light">
    {{-- <img src="{{ Storage::url($article->image) }}" alt="" class="card-img-top card-image"> --}}
    <a href="{{ route('article.show', $article) }}" class="card-images">
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(1300, 900) : 'https://picsum.photos/200' }}"
            alt="Immagine dell'articolo {{ $article->title }}" class="card-image">
    </a>
    <div class="card-body text-start d-flex justify-content-center aling-item-center flex-column">
        <h4 class="card-title title-truncate ">{{ $article->title }}</h4>
        <h6 class="card-subtitle mb-2 text-muted price-card fw-bold"><span class="text-dark">{{ __('ui.prezzo') }}
                :</span>
            {{ $article->price }} €</h6>
        <h6 class="card-subtitle mb-2 text-muted"><span class="text-dark fw-bold">{{ __('ui.categoria') }}:</span>
            {{ $article->category->name ?? 'n\d' }}</h6>
        <h6 class="card-subtitle mb-2 text-muted"><span
                class="text-dark fw-bold">{{ __('ui.data di inserimento') }}:</span>
            {{ $article->created_at->format('d/m/Y') }}</h6>
            <a href="{{ route('article.show', $article) }}" class="btn btn-custom-card mt-3  ms-5">{{ __('ui.dettaglio') }}</a>
        </div>
</div>
