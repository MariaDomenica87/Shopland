<?php

namespace App\Livewire;

use App\Models\Image;
use App\Models\Article;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleEdit extends Component
{
    use WithFileUploads;
    public  Article $article;
    public $title, $description, $price, $categoria;
    public $existingImages = [];
    public $temporary_images = [];
    public $temporary_images_final = [];

    protected function rules()
    {
        return [
            'title' => 'required|min:5|max:255',
            'description' => 'required',
            'price' => 'required',
            'categoria' => 'required',
            
        ];
    }

    public function mount(Article $article)
    {

        $this->title = $article->title;
        $this->description = $article->description;
        $this->price = $article->price;
        $this->categoria = $article->category_id;

        // Carica immagini esistenti (modifica a seconda della relazione)
        $this->existingImages = $article->images()->get()->toArray();
    }

    public function removeExistingImage($imageId)
    {
        $image = Image::find($imageId);
        if ($image) {
            // Rimuovi file da storage
            if (Storage::exists($image->path)) {
                Storage::delete($image->path);
            }
            // Rimuovi record DB
            $image->delete();

            // Aggiorna lista immagini esistenti
            $this->existingImages = array_filter($this->existingImages, fn($img) => $img['id'] != $imageId);
            $this->existingImages = array_values($this->existingImages); // resetta indici
        }

        if ($this->totalImagesCount() <= 4) {
            session()->forget('error'); // Rimuove l'errore se è rientrato nel limite
        }

    }

    // public function removeTemporaryImage($key)
    // {
    //     unset($this->temporary_images[$key]);
    //     $this->temporary_images = array_values($this->temporary_images);
    // }



    public function update()
    {
        
        $totalImages = count($this->existingImages) + count($this->temporary_images);
        if ($this->totalImagesCount() > 4) {
            session()->flash('error', 'Puoi avere al massimo 4 immagini per articolo');
            return;
        }
        // $this->existingImages= [];
        // $this->existingImages = $this->temporary_images_final;

        $this->validate();
        
        $this->article->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->categoria,
            'is_accepted' => null,
        ]);

        foreach ($this->temporary_images_final as $image) {
            $newFileName = "articles/{$this->article->id}";
            $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
            dispatch(new ResizeImage($newImage->path, 1300, 900));
        }
        File::deleteDirectory(storage_path('app/livewire-tmp'));


        // Pulisci immagini temporanee dopo salvataggio
        // $this->temporary_images = [];

        return redirect()->route('article.index')->with('messageEdit', 'Articolo aggiornato con successo, un revisore lo valuterà al più presto');
        // session()->flash('messageEdit', 'Articolo aggiornato con successo, un revisore lo valuterà al più presto');
    }

    public function updatedTemporaryImages()
    {
        $this->validate([
            'temporary_images.*' => 'image|max:1024',
        ]);

        foreach ($this->temporary_images as $image) {
            $this->temporary_images_final[] = $image;
        }

        $total = count($this->existingImages) + count($this->temporary_images_final ?? []);


        if ($this->totalImagesCount() > 4) {
            session()->flash('error', 'Puoi avere al massimo 4 immagini per articolo');
            return;
        }

        //$this->temporary_images = []; // Svuota per evitare problemi di duplicazione
    }

    private function totalImagesCount()
    {
        return count($this->existingImages) + count($this->temporary_images_final);
    }

    public function delete()
    {
        // Rimuovi immagini dal storage
        foreach ($this->existingImages as $image) {
            if (Storage::exists($image['path'])) {
                Storage::delete($image['path']);
            }
        }
        $this->article->delete();
        return redirect()->route('article.index')->with('messageDelete', 'Articolo eliminato con successo');
    }

    public function removeTemporaryImage($key)
    {
        unset($this->temporary_images_final[$key]);
        $this->temporary_images_final = array_values($this->temporary_images_final);

        if ($this->totalImagesCount() <= 4) {
            session()->forget('error'); // Rimuove l'errore se è rientrato nel limite
        }

    }



    public function render()
    {
        $categories = Category::all();
        return view('livewire.article-edit', compact('categories'));
    }
}
