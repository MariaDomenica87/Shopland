<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;
    // use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'user_id',
        'category_id',
        'category',
        'is_accepted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function setAccepted($value){
    //     $this->is_accepted = $value;
    //     $this->save();
    //     return true;
    // }

    public static function toBeRevisedCount(){
        return Article::where('is_accepted', null)->count();
    }

    // funzione per barra di ricerca
    public function toSearchableArray()
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'category'=>$this->category,
            'description'=>$this->description,
        ];
        
    }

    public function setAccepted(?bool $value)
{
    $this->is_accepted = $value;
    $this->save();
}

public function images(): HasMany
{
    return $this->hasMany(Image::class);
}
}
