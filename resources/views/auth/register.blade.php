<x-layout>
    {{-- SEZIONE REGISTER --}}
    <section>
        <div class="container-fluid form-register">
            <div class="row row-form-register justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <h2 class="mb-4 fw-bold tx-white">{{ __('ui.registrati') }}</h2>
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- sezione nome --}}
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold tx-white">{{ __('ui.tuoNome') }}</label>
                            <i class="fa-solid fa-circle-info tx-white" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="{{ __('ui.tooltipName') }}"></i>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                wire:model.live="name" id="username" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- sezione email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold tx-white">{{ __('ui.tuaEmail') }}</label>
                            <i class="fa-solid fa-circle-info tx-white" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="{{ __('ui.tooltipEmail') }}"></i>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                wire:model.live="email" id="email" name="email" value="{{ old('email') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- sezione foto profilo --}}
                        <div class="mb-3">
                            <label for="photo"
                                class="form-label fw-bold tx-white">{{ __('ui.inserisciLaTuaFotoProfilo') }}<i
                                    class="fa-solid fa-circle-info ms-1" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                    data-bs-title="{{ __('ui.inserisciLaFotoCheAppariràNelTuoProfilo') }}"></i></label>
                            <input type="file" name="photo" id="photo"
                                class="form-control @error('photo') is-invalid @enderror" wire:model.live="photo">

                            {{-- @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                        </div>



                        <div class="mb-3">
                            <label for="password" class="form-label form-check-label fw-bold tx-white">Password</label>
                            <i class="fa-solid fa-circle-info tx-white" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="{{ __('ui.tooltipPassword') }}"></i>
                            <input type="password" class="form-control   @error('password') is-invalid @enderror"
                                wire:model.live="password" id="password1" name="password">
                            <input type="checkbox" id="checkbox1"
                                class="form-check-input"><span>{{ __('ui.mostra') }}</span>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password2"
                                class="form-label form-check-label fw-bold tx-white">{{ __('ui.confermaPassword') }}</label>
                            <input type="password" class="form-control" id="password2" name="password_confirmation">
                            <input type="checkbox" id="checkbox2"
                                class="form-check-input @error('password') is-invalid @enderror"
                                wire:model.live="password"><span>{{ __('ui.mostra') }}</span>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-custom2 fw-bold">{{ __('ui.registrati') }}</button>
                        <div class="mt-3">
                            <h6> <small>{{ __('ui.haiAccount') }}</small> </h6>
                            <a class="text-decoration-none tx-white fw-bold"
                                href="{{ route('login') }}">{{ __('ui.accedi') }}</a>
                        </div>
                        <div class="flex-row">
                            <h5 class="text-center tx-white  mt-3 mb-3">Accedi con</h5>
                            <a href="{{ route('auth.google') }}"
                                class="text-decoration-none text-black btn-log google"> 



                                <svg version="1.1" width="20" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                    style="enable-background:new 0 0 512 512;" xml:space="preserve">

                                    <path style="fill:#FBBB00;" d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
 c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
 C103.821,274.792,107.225,292.797,113.47,309.408z"></path>
                                    <path style="fill:#518EF8;"
                                        d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
 c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
 c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z"></path>
                                    <path style="fill:#28B446;" d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
 c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
 c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z"></path>
                                    <path style="fill:#F14336;" d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
 c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
 C318.115,0,375.068,22.126,419.404,58.936z"></path>

                                </svg>

                                Google

                            </a>

                        </div>
                    </form>
                </div>

                <div class="col-12 col-md-4 info-register">
                    <h3 class="mb-5">{{ __('ui.perchèIscriversi?') }}</h3>
                    <ul>
                        <li class="fw-bold">{{ __('ui.semplice') }}</li>
                        <p>{{ __('ui.mettiAnnuncioUnClick') }}</p>
                        <li class="fw-bold">{{ __('ui.li1') }}</li>
                        <p>{{ __('ui.p1') }}</p>
                        <li class="fw-bold">{{ __('ui.li2') }}</li>
                        <p>{{ __('ui.p2') }}</p>
                    </ul>
                </div>
            </div>
        </div>
    </section>







</x-layout>
