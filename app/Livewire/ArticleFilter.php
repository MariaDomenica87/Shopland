<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleFilter extends Component
{

    use WithPagination;

    public $minPrice = null;
    public $maxPrice = null;
    public $category;

    public function render()
    {
        $articles = Article::query()
    ->where('is_accepted', true)
    ->when($this->category, function($query) {
        $query->where('category_id', $this->category);
    })
    ->when($this->minPrice, function($query) {
        $query->where('price', '>=', $this->minPrice);
    })
    ->when($this->maxPrice, function($query) {
        $query->where('price', '<=', $this->maxPrice);
    })
    ->orderBy('price', 'asc')
    ->Paginate(6);


        return view('livewire.article-filter', [
            'articles' => $articles,
        ]);
    }
}

//     public function render()
// {
//     $articles = Article::query()
//         ->when($this->minPrice !== null, function ($query) {
//             $query->where('price', '>=', $this->minPrice);
//         })
//         ->when($this->maxPrice !== null, function ($query) {
//             $query->where('price', '<=', $this->maxPrice);
//         })
//         ->orderBy('price', 'desc')
//         ->paginate(6);

//     return view('livewire.article-filter', [
//         'articles' => $articles,
//     ]);
// }
