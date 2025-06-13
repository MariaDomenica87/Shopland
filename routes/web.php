<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Livewire\ArticleCreate;

Route::get('/', [PublicController::class, 'home'])->name('home');
// rotta per ricerca
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');
// Rotta per lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');



// gestione delle rotte per gli articoli
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'indexCategory'])->name('article.index-category');
Route::get('article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');




// rotte per revisori
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

//rotta per logica di accettazione agli articoli
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');

//rotta per logica di rifiuto agli articoli
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');

//rotta per la revisione degli articoli
Route::patch('/revisor/article/undo/{article}', [RevisorController::class, 'undoReview'])->name('undo');


//rotta per logica invio email
Route::get('revisor/request' , [RevisorController::class , 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::get('make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//rotta per la pagina lavora con noi
Route::get('/revisor/career', [RevisorController::class, 'career'])->name('revisor.career');

//rotta siamo noi
Route::get('/article/easteregg', [PublicController::class, 'easteregg'])->name('article.easteregg');

// Rotta dashboard utenti registrati
Route::get('/auth/dashboard', [PublicController::class, 'dashboard'])->name('auth.dashboard');

//rotta per autenticazione google
Route::get('auth/google', [PublicController::class, 'googleLogin'])->name('auth.google');
Route::get('auth/google-callback', [PublicController::class, 'googleAuthentication'])->name('auth.google-callback');