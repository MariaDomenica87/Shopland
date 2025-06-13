<x-layout>
    {{-- SEZIONE LAVORA CON NOI --}}
    <section>
        <div class="container-fluid img-heder-career">
            <h1 class="txt-header-career">{{ __('ui.lavoraConNoi') }}</h1>
            <div class="row row-form-career">
                <div class="col-12 col-md-8 col-lg-6">
                    <h2 class="mb-4 fw-bold tx-white">{{ __('ui.ciao') }} {{ Auth::user()->name }}</h2>
                    <h4 class="mb-4 fw-bold tx-black">{{ __('ui.controlla') }}</h4>
                    <form action="{{ route('become.revisor') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold">{{ __('ui.tuoNome') }}</label>
                            <i class="fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Inserire il tuo nome reale rende più affidabile il tuo profilo"></i>
                            <input type="text" class="form-control" id="username" name="name"
                                value="{{ old('name', Auth::user()->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">{{ __('ui.tuaEmail') }}</label>
                            <i class="fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Utilizza la tua mail con la quale vorrai inserire i tuoi annunci es: mail@mail.com"></i>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', Auth::user()->email) }}" required>
                        </div>

                        <button type="submit" class="btn btn-career fw-bold">
                            <a class="tx-white text-decoration-none "
                                href="{{ route('become.revisor') }}">{{ __('ui.diventaRevisore') }}</a></button>
                    </form>

                </div>
                <div class="col-12 col-md-8 col-lg-6">
                    <h5 class="mt-3 fw-bold tx-white">{{ __('ui.percheLavora') }}</h5>
                    <p class="fw-bold">{{__('ui.p3')}}</p>
                </div>
            </div>
        </div>
    </section>
</x-layout>
