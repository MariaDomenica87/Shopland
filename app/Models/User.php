<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo', // aggiunto per gestire la foto del profilo
        'google_id', // aggiunto per gestire l'autenticazione con Google
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // Metodo helper per ottenere URL foto profilo con fallback
    public function getProfilePhotoUrlAttribute()
    {
        if (!$this->photo) {
            return asset('media/easteregg/marika.jpg');
        }
        // Se la foto è una URL esterna (es. Google), usala direttamente
        if (filter_var($this->photo, FILTER_VALIDATE_URL)) {
            return str_replace('s96-c', 's200-c', $this->photo);
        }
        // Altrimenti, se è un path locale
        return asset('storage/' . $this->photo);
    }
}
