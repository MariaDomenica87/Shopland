<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PublicController extends Controller
{

    public function home()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take('4')->get();
        return view('welcome', compact('articles'));
    }

    public function searchArticles(Request $request)
    {

        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(6);
        // dd($articles, $query);
        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }

    public function setLanguage($lang)
    {

        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function easteregg()
    {
        return view('article.easteregg');
    }
    public function dashboard(Article $article)
    {

        $user = Auth::id();
        if (!$user) {
            return redirect()->route('login');
        }

        $userId = Auth::id();
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        $userArticles = Article::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        return view('auth.dashboard', compact('userArticles', 'articles'));
    }

    public function googleLogin()
    {

        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication()
    {
        try {
            /** @var \Laravel\Socialite\Two\GoogleProvider $driver */
            $driver = Socialite::driver('google');
            $googleUser = $driver->stateless()->user();

            // dd($googleUser->avatar, $googleUser);
            // dd($googleUser->avatar);
            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->route('home'); // Corretto da 'homepage' a 'home'
            } else {
                $userData = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('Password@1234'),
                    'google_id' => $googleUser->id,
                    'photo' => $googleUser->avatar ?? null,
                ]);

                if ($userData) {
                    Auth::login($userData);
                    return redirect()->route('home'); // Corretto da 'homepage' a 'home'
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
