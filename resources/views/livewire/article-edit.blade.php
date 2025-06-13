<div>
    <form class="p-5 form-create" wire:submit="update">
        <div class="mb-3">
            <label for="title" class="form-label fw-bold tx-white">{{ __('ui.titolo') }} </label>
            <input type="text" class="form-control" id="title" value="{{ old('title') }}" wire:model.blur="title">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label  fw-bold tx-white ">{{ __('ui.categoria') }} </label>
            <select class="form-select form-control" aria-label="Default select example" wire:model.live="categoria"
                name="categories[]">
                <option disabled>{{ __('ui.selezionaCategoria') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ __("ui.$category->name") }}</option>
                @endforeach
            </select>
            @error('categoria')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label fw-bold tx-white">{{ __('ui.prezzo') }} €</label>
            <input type="number" class="form-control" id="price" value="{{ old('price') }}"
                wire:model.live="price">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-bold tx-white">{{ __('ui.descrizione') }}</label>
            <textarea id="description" value="{{ old('description') }}" class="form-control" wire:model.live="description"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- SEZIONE CARICAMENTO IMMAGINE --}}
        {{-- Upload immagini --}}
        <div class="mb-3">
            <label for="image" class="form-label fw-bold tx-white">{{ __('ui.immagine') }}</label>
            <input type="file" class="form-control shadow @error('temporary_images.*') is-invalid @enderror"
                id="image" wire:model.live="temporary_images" multiple>
            @error('temporary_images')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @error('temporary_images.*')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Immagini esistenti --}}
        @if (!empty($existingImages))
            <div class="mb-3">
                <label class="form-label fw-bold tx-white">{{ __('ui.immaginiCaricateInPrecedenza') }}</label>
                <div class="d-flex gap-3 flex-wrap border border-primary rounded p-3">
                    @foreach ($existingImages as $image)
                        {{-- @dd($image) --}}
                        <div style="position: relative; width: 150px; height: 150px;">
                            <img src="{{ Storage::url($image['path']) }}" alt="Immagine" class="img-thumbnail">
                            <button type="button" wire:click="removeExistingImage({{ $image['id'] }})"
                                class="btn btn-sm btn-outline-danger position-absolute top-0 end-0"><i class="fa-regular fa-2x fa-trash-can"></i></button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Anteprima nuove immagini --}}
        @if (!empty($temporary_images_final))
            <div class="mb-3">
                <label class="form-label fw-bold tx-white">{{ __('ui.anteprimaNuoveImmaginiCaricate') }}</label>
                @if (session()->has('error'))
                    <span class="text-danger">{{ session('error') }}</span>
                @endif
                <div class="d-flex gap-3 flex-wrap border border-success rounded p-3">
                    @foreach ($temporary_images_final as $key => $image)
                        {{-- @dd($image->temporaryUrl()) --}}
                        <div style="position: relative; width: 150px; height: 150px;">
                            <img src="{{ $image->temporaryUrl() }}" alt="Immagine" class="img-thumbnail">
                            <button type="button" class="btn btn-sm btn-outline-danger position-absolute top-0 end-0" wire:click="removeTemporaryImage({{ $key }})">
                                <i class="fa-regular fa-2x fa-trash-can"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <button type="submit" class="btn btn-dark my-3">{{ __('ui.aggiorna') }}</button>
        <button type="submit" class="btn btn-danger" wire:click="delete">{{ __('ui.elimina') }}</button>
    </form>


</div>
