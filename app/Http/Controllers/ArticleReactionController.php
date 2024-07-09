<?php

namespace App\Http\Controllers;

use App\Models\ArticleReaction;
use App\Models\Like;
use Illuminate\Http\Request;

class ArticleReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $id = request("post_id");
        $new_key= uniqid().'_'.gethostbyaddr($_SERVER["REMOTE_ADDR"]);
        $md_key= md5($new_key);
        if(!isset($_COOKIE['visitor_id'.($id)]))
        {
            $view = Like::where([['user_ip',$md_key],['post_id',$id]])->get() ;
            if($view -> count() < 1){
                Like::create([
                    'user_ip' => $md_key,
                    'post_id' => $id,
                 ]);
                setcookie('visitor_id'.($id),$md_key,time() + (86400*30), "/");
            }
        }
        
        if(!isset($_COOKIE['visitor_id'.($id)])) {
            
            if(!$view){
                
                setcookie('visitor_id'.($id),$md_key,time() + (86400*30), "/");
            }
        }
        return redirect()->back()->with('success', 'Thank you for liking!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleReaction $articleReaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleReaction $articleReaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticleReaction $articleReaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleReaction $articleReaction)
    {
        //
    }
}
