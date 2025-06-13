<?php

return [
    'required' => 'Este campo es obligatorio',
    'min' => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres',
        'numeric' => 'El valor debe ser al menos :min',
    ],
    'max' => [
        'string' => 'El campo :attribute no debe exceder :max caracteres',
        'numeric' => 'El valor no debe ser mayor que :max',
        'file' => 'El archivo no debe superar los :max kilobytes',
        // 'array' => 'Puedes subir un máximo de :max imágenes',
    ],
    'exists' => 'Selecciona una categoría válida',
    'image' => 'El archivo debe ser una imagen',
    'numeric' => 'El campo :attribute debe ser un número',
    'temporary_images.*.image' => 'Todos los archivos deben ser imágenes',

    'attributes' => [
        'title' => 'título',
        'description' => 'descripción',
        'price' => 'precio',
        'categoria' => 'categoría',
        'images' => 'imágenes',
        'images.*' => 'imagen',
        'temporary_images' => 'imágenes temporales',
    ],

    
   'array' => 'Ingrese al menos una imagen o máximo 4 imágenes',

    'confirmed' => 'La :attribute no coincide con la contraseña ingresada',

];
