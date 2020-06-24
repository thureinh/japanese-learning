<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VocabDetail;

class VocabdetailController extends Controller
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
        //
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
            "word" => "required|unique:App\VocabDetail,word",
            "meaning" => "required"
        ]);

        $vocabdetail = new VocabDetail();
        $vocabdetail->word = request('word');
        $vocabdetail->meaning = request('meaning');
        $vocabdetail->vocab_id = request('vocabid');
        $vocabdetail->save();

        return redirect()->route('vocab.show', $vocabdetail->vocab_id);
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
        $vocabDetail = VocabDetail::find($id);
        return json_encode($vocabDetail);
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
        $vocabdetail = VocabDetail::find($id);
        $vocabdetail->vocab_id = $request->topic;
        $vocabdetail->word = $request->word;
        $vocabdetail->meaning = $request->meaning;
        $vocabdetail->save();
        return json_encode($vocabdetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vocabdetail = VocabDetail::find($id);
        $vocabdetail->delete();
        return '{}';
    }

}
