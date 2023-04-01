<?php

namespace App\Http\Controllers;


use App\Models\Tag;

use App\Models\User;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth')->except('index', 'show');
    }




    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('articles'));
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
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required|unique:articles|min:5',
            'subtitle' =>'required|unique:articles|min:5',
            'body' =>'required|min:10',
            'image' => 'image|required',
            'category' =>'required',
            'tags' =>'required',

        ]);


        $article = Article::create([
            'title' =>$request->title,
            'subtitle' =>$request->subtitle,
            'body' => $request->body,
            'image' =>$request->file('image')->store('public/images'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->title),
        ]);

        $tags = explode(' , ', $request->tags);
            
            foreach($tags as $tag){
                $newTag = Tag::updateOrCreate([
                    'name' => $tag,
                ]);
                $article->tags()->attach($newTag);
            }


        return redirect(route('article.index'))->with('message', 'Articolo creato correttamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
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
        $request->validate([
            'title'=> 'required|min:5|unique:articles,title',  $article->id,
            'subtitle'=> 'required|min:5|unique:articles,subtitle', $article->id,
            'body' => 'required|min:10',
            'image' => 'image',
            'category' => 'required',
            'tags' => 'required',

        ]);

        $article->update([
            'title' =>$request->title,
            'subtitle' =>$request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
        ]);
 
        if($request->image){
            Storage::delete($article->image);
            $article->upadate([
                'image' => $request->file('image')->store('pubblic/images'),
            ]);
        }
        $tags = explode(',', $request->tags);
        $newTags = [];

        foreach($tags as $tag){
            $newTag = Tag::updateOrCreate([
                'name' => $tag,
            ]);

            $newTags[] = $newTag->id;

        }

        $article->tags()->sync($newTags);

        return redirect(route('writer.dashboard'))->with('message', 'Hai correttamente aggiornato l\'articolo scelto');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach($article->tags as $tag){
            $article->tags()->detach($tag);
        }

        $article->delete();

        return redirect(route('writer.dashboard'))->with('message', 'Hai correttamente cancellato l\'articolo scelto');
    }
    public function byCategory(Category $category){
        $articles = $category->articles->sortByDesc('created_at')->where('is_accepted',true);
        return view('article.by-category', compact('category', 'articles')); 
    }

    public function byUser(User $user){
        $articles = $user->articles->sortByDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });
        return view('article.by-user', compact('user', 'articles')); 
    }

    public function articleSearch(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
      
        return view('article.search-index', compact('articles', 'query')); 
    }
}

