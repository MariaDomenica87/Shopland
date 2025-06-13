<x-layout>
    <section class="container-fluid img-dashbord img-fluid  all-article2">
        <div class="row justify-content-center ">
            <div class="col-6 mx-2 user-dashboard">
                <h3 class="text-center fw-bold tx-white">Benvenuto nella tua dashboard</h3>
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="Foto profilo" class="rounded-circle me-2 img-profile-nav">
                    <div>
                        <h4 class="mb-0"><em>{{ Auth::user()->name }}</em></h4>
                        <div class="small">E-mail: <em>{{ Auth::user()->email }}</em></div>
                    </div>
                </div>
            </div>


            <div class="container my-5">
                <h2 class="text-center fw-bold display-5 tx-white">I tuoi articoli</h2>
                <div class="row ">
                    @forelse ($userArticles as $article)
                        <div class="col-md-3  d-flex justify-content-center">
                            <x-card :article="$article" />
                        </div>
                    @empty
                        <p class="text-center fw-bold tx-white">Non hai ancora caricato articoli.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </section>
</x-layout>
