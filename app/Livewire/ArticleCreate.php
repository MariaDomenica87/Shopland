<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ArticleCreate extends Component
{
    use WithFileUploads;
    public $title, $description, $price;
    public $categoria;
    public $images = [];
    public $temporary_images;
    public $article;


    protected function rules()
    {
        return [
            'title' => 'required|min:3|max:50',
            'description' => 'required|min:5|max:1000',
            'price' => 'required|numeric|min:0',
            'categoria' => 'required|exists:categories,id',
            'images.*' => 'required|image|max:1024',
            'images' => 'required|max:4', // Limite massimo di 4 immagini 
            'temporary_images' => 'required|array|max:4',

            'temporary_images.*' => 'required|max:1024|image',
        ];
    }

    public function store()
    {   
        // dd($this->images);
        $this->temporary_images= [];
        $this->temporary_images = $this->images;
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => Auth::id(),
            'category_id' => $this->categoria,
        ]);
        if (count($this->images) > 0 && count($this->images)<= 4) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
                // dispatch(new ResizeImage($newImage->path, 1000, 1000));
                // dispatch(new GoogleVisionSafeSearch($newImage->id));
                // dispatch(new GoogleVisionLabelImage($newImage->id));
                //nuovo codice per rimuovere i volti
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 1300, 900),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('app/livewire-tmp'));
        }


        $this->reset();
        session()->flash('message', __('ui.articoloCreato'));
        $this->cleanForm();
    }



    public function render()
    {
        $categories = Category::all();
        return view('livewire.article-create', compact('categories'));
    }

    // FUNZIONI NECESSARIE ALLE IMMAGINI
    public function updatedTemporaryImages()
    {
        // if($this->validate([
        //     'temporary_images'=> 'required|array|max:4',

        //     'temporary_images.*' => 'required|max:1024|image',
        // ]))
        // {
        //     dd($this->temporary_images);
        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
        
        // }
        $this->temporary_images = [];
        if (count($this->images) + count($this->temporary_images) >= 4) {
            foreach ($this->images as $image) {
                $this->temporary_images[] = $image;

            }
        } 
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    protected function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->categoria = '';
        $this->price = '';
        $this->images = [];
    }
}
