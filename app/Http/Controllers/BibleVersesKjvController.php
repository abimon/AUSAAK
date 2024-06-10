<?php

namespace App\Http\Controllers;

use App\Models\BibleVersesKjv;
use Illuminate\Http\Request;

class BibleVersesKjvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = [];
        for ($i = 1; $i <= 66; $i++) {
            $book = [];
            $verses=[];
            $chapters = [];
            for ($j = 1; $j <= 150; $j++) {
                $verses = BibleVersesKjv::where([['book', $i],['chapter',$j]])->select('verse','text')->get();
                if($verses->count()>0){
                    array_push($chapters, ['chapter'=>$j,'verses'=>$verses]);
                }
            }
            array_push($book, ['book' => $i, 'chapters' => $chapters]);
            array_push($books, $book); 

        }
        return $books;

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(BibleVersesKjv $bibleVersesKjv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BibleVersesKjv $bibleVersesKjv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BibleVersesKjv $bibleVersesKjv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BibleVersesKjv $bibleVersesKjv)
    {
        //
    }
}
