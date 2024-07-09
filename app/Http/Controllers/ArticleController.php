<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::select(
            'id',
            'title',
            DB::raw('CASE 
                WHEN CHAR_LENGTH(full_text) > 20 THEN CONCAT(SUBSTRING(full_text, 1, 20), "...")
                ELSE full_text
                END as display_text')
        )->paginate(20);
        return View::make('articles.dashboard.all', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return View::make('articles.dashboard.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) { // store image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }
        $article = Article::create($data);
        if ($request->filled('tag_ids')) {
            $article->tags()->attach($data['tag_ids']);
        }

        return Redirect::route('articles.index')->with('status', 'article.created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return View::make('articles.dashboard.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return View::make('articles.dashboard.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) { // store image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }
        $article->update($data);
        if ($request->filled('tag_ids')) {
            $article->tags()->sync($data['tag_ids']);
        }

        return Redirect::route('articles.index')->with('status', 'article.updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return Redirect::back()->with('status', 'article.deleted');
    }
}
