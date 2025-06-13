<x-layout>
    <section class="container-fluid  img-header-create  mt-5 pt-5">
        <div class="row  flex-column align-content-center ">
            <div class="col-12 col-md-4">
                <h1 class="my-4 txt-header-create">{{__('ui.modificaArticolo')}}</h1>
            </div>
            <div class="col-12 col-md-4">
                <livewire:article-edit :article="$article" />
            </div>
        </div>
    </section>
</x-layout>
