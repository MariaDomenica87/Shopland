<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        $recent_articles = Article::whereNotNull('is_accepted')
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('revisor.index', compact('article_to_check', 'recent_articles'));
    }

    //permette di tornare indietro alla revisione di un articolo
    public function undoReview(Article $article)
    {
        $article->setAccepted(null);
        return redirect()->back()->with('message', __('ui.annullamentoRevisione', ['title' => $article->title]));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()
            ->back()
            ->with('message', __('ui.articoloAccettato', ['title' => $article->title]));
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()
            ->back()
            ->with('messageReject', __('ui.articoloRifiutato', ['title' => $article->title]));
    }

    public function becomeRevisor()
    {

        // $body = $request->body;
        $user = Auth::user();
        // $content = compact('user', 'body');

        Mail::to('admin@presto.it')->send(new BecomeRevisor($user));
        return redirect()->route('home')->with('message', __('ui.messaggioRevisore'));
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

    public function career()
    {
        return view('revisor.career');
    }
}
