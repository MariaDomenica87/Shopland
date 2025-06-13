<x-layout>
    <x-section-hero :category="$category"></x-section-hero>
    <section class="container-fluid mt-4">
        <div class="row">
            <h1 class="text-center">{{ __("ui.$category->name") }}</h1>
            <livewire:article-filter :category="$category->id" />
        </div>
    </section>
</x-layout>
