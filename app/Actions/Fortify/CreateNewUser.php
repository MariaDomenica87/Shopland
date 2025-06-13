<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    use WithFileUploads;

    public $photo;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // validazione foto
        ])->validate();

        $photoPath = null;

        // Controlla se 'photo' è presente e se è un file caricato (UploadedFile)
        if (isset($input['photo']) && is_object($input['photo']) && method_exists($input['photo'], 'store')) {
            $photoPath = $input['photo']->store('profile_photos', 'public');
        }


        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'photo' => $photoPath, // salva il percorso della foto
        ]);
    }
}
