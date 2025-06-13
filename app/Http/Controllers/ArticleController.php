<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{
    use WithPagination;
    public static function middleware()
    {
        return [new Middleware('auth', except: ['index', 'home', 'show', 'indexCategory', 'dashboard'])];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $articles = Article::where('is_accepted' , true)->orderBy('created_at', 'desc')->Paginate(6);
        return view('article.index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // $article =Article::create([
        //     'title'=>$request->title,
        //     'description'=>$request->description,
        //     'price'=>$request->price,
        //     'user_id'=>Auth::user()->id,
        // ]);
        $article->load('images'); // carica eager loading delle immagini
        return view('article.show', compact('article', ));
    }

    public function indexCategory(Category $category)
    {

        // $articles = Article::where('category_id', $category->id)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('article.index-category', compact('category', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
