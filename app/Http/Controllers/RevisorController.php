<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard()
    {
        $unrevisionedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', True)->get();
        $rejectedArticles = Article::where('is_accepted', false)->get();
        
        return view('revisor.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticles'));
    }

    public function acceptArticle(Article $articles)
    {
        $articles->update([
            'is_accepted' => true,
        ]);
        
        return view('revisor.dashboard', compact('message', 'Hai accettato l\'articolo scelto'));
    }

    public function rejectArticle(Article $articles)
    {
        $articles->update([
            'is_accepted' => false,
        ]);
        
        return view('revisor.dashboard', compact('message', 'Hai rifiutato l\'articolo scelto'));
    }

    public function undoArticle(Article $articles)
    {
        $articles->update([
            'is_accepted' => false,
        ]);
        
        return view('revisor.dashboard', compact('message', 'Hai riportato di nuovo l\'articolo scelto in revisione'));
    }
}
