<?php

namespace App\Http\Controllers;

use App\Models\AKArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AKArticleController extends Controller
{
    public function index()
    {
        $topics = [
            ['title' => 'Devotion', 'url' => 'devotion'],
            ['title' => 'Law and Grace', 'url' => 'law'],
            ['title' => 'Family Life', 'url' => 'family'],
            ['title' => 'The Sabbath', 'url' => 'sabbath'],
            ['title' => 'Prayer', 'url' => 'prayer'],
            ['title' => 'Christ and His Coming', 'url' => 'christ'],
            ['title' => 'Evangelism Nuggets', 'url' => 'evangelism'],
            ['title' => 'Life and Death', 'url' => 'life'],
            ['title' => 'Stewardship', 'url' => 'stewardship'],
            ['title' => 'Prophecy', 'url' => 'prophesy'],
            ['title' => "The Word of God", 'url' => 'word'],
            ['title' => 'Health', 'url' => 'health'],
            ['title' => 'Salvation', 'url' => 'salvation']
        ];

        $articles = AKArticle::orderBy("created_at", "desc")->paginate(10);
        return view("dashboard.articles.index", compact("articles", "topics"));
    }
    public function create()
    {
        return view("dashboard.articles.create");
    }

    public function store(Request $request)
    {
        $article = AKArticle::where('title', request()->title)->first();

        if (!$article) {
            $art = AKArticle::create(
                [
                    'user_id' => Auth()->user()->id,
                    'category' => request()->category,
                    'title' => request()->title,
                    'date' => date('Y-m-d'),
                    'text' => Str::slug(request()->title),
                    'body' => request()->body,
                    'isPublished' => true,
                ]
            );
            return redirect()->route('article.show', $art->text)->with('success', 'Article posted successfully');
        }
        return redirect()->back()->with('error', 'Article with the same title found. Please change your title')->withInput(request()->all());
    }

    public function show($slug)
    {
        $article = AKArticle::where('text', $slug)->first();
        return view('dashboard.articles.show', compact('article'));
    }

    public function edit($slug)
    {
        $article = AKArticle::where('text', $slug)->first();
        return view('dashboard.articles.edit', compact('article'));
    }
    public function update($id)
    {
        $art = AKArticle::findOrFail($id);
        if (request('category') != null) {
            $art->category = request()->category;
        }
        if (request('title') != null) {
            $art->title = request()->title;
        }
        if (request('date') != null) {
            $art->date = request('date');
        }
        if (request('text') != null) {
            $art->text = Str::slug(request()->title);
        }
        if (request('body') != null) {
            $art->body = request()->body;
        }
        if (request('isPublished') != null) {
            $art->isPublished = request('isPublished');
        }
        $art->update();
        return redirect()->route('article.show', $art->text)->with('success', 'Article updated successfully');
    }
    public function destroy(AKArticle $aKArticle)
    {
        //
    }
}
