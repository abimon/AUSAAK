<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AKArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
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

        $articles = AKArticle::orderBy("created_at", "desc")->all();
        return response()->json([
            'status' => true,
            'topics'=>$topics,
            'articles'=>$articles,
        ], 200);
    }
    public function create()
    {
        
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
            return response()->json([
                'status' => true,
                'message' => 'Account created successfully',
            ], 201);
        }
        return response()->json([
            'status' => false,
            'message' => 'Article with the same title already exist.',
        ], 304);
    }

    public function show($id)
    {
        $article = AKArticle::findOrFail($id);
        return response()->json([
            'status' => true,
            'article'=>$article,
            'message' => 'Account created successfully',
        ], 200);
    }

    public function edit()
    {
        
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
        return response()->json([
            'status' => true,
            'message' => 'Article updated successfully',
        ], 200);
    }
    public function destroy(AKArticle $aKArticle)
    {
        //
    }
}
