<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KanjiWord;

class KanjiwordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "word" => "required|unique:App\KanjiWord,word",
            "yomikata" => "required",
            "meaning" => "required"
        ]);

        $kanjiword = new KanjiWord();
        $kanjiword->word = request('word');
        $kanjiword->yomikata = request('yomikata');
        $kanjiword->meaning = request('meaning');
        $kanjiword->kanji_id = request('kanjiid');
        $kanjiword->save();

        return redirect()->route('kanji.show', $kanjiword->kanji_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kanjiword = KanjiWord::find($id);
        return json_encode($kanjiword);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kanjiword = KanjiWord::find($id);
        $kanjiword->kanji_id = $request->kanji;
        $kanjiword->word = $request->word;
        $kanjiword->yomikata = $request->yomikata;
        $kanjiword->meaning = $request->meaning; 
        $kanjiword->save();
        return json_encode($kanjiword);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kanjiword = KanjiWord::find($id);
        $kanjiword->delete();
        return '{}';
    }
}
