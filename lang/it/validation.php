<?php

return [
    'required' => 'Campo obbligatorio',
    'min' => [
        'string' => 'Il campo :attribute deve essere di almeno :min caratteri',
        'numeric' => 'Il valore deve essere almeno :min',
    ],
    'max' => [
        // 'string' => 'Il campo :attribute deve essere di massimo :max caratteri',
        'numeric' => 'Il valore deve essere al massimo :max',
        'file' => 'Il file deve essere al massimo di :max kilobyte',
        'array' => 'Puoi caricare al massimo :max immagini',
    ],
    'exists' => 'Seleziona una categoria valida',
    'image' => 'Il file deve essere un\'immagine',
    'numeric' => 'Il campo :attribute deve essere un numero',
    'temporary_images.*.image' => 'Tutti i file devono essere immagini',


    'attributes' => [
    'title' => 'titolo',
    'description' => 'descrizione',
    'price' => 'prezzo',
    'categoria' => 'categoria',
    'images' => 'immagini',
    'images.*' => 'immagine',
    'temporary_images' => 'immagini temporanee',

    ],
    'array' => 'Inscerisci almeno una immagine o massimo 4 immagini',
    
    'confirmed' => 'La :attribute non corrisponde alla password inserita',



];
