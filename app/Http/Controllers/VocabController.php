<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vocab;
use App\VocabDetail;

class VocabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vocabs = Vocab::orderBy('created_at', 'desc')
                  ->withCount(['vocabdetails'])
                  ->get();
        return view('vocab.index', compact('vocabs'));
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
            "topic" => "required|unique:App\Vocab,topic"
        ]);

        $vocab = new Vocab();
        $vocab->topic = request('topic');
        $vocab->save();

        return redirect()->route('vocab.show', $vocab->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topics = Vocab::all('id', 'topic');
        $vocab = Vocab::find($id);
        $vocabdetails = Vocab::find($id)->vocabdetails;
        return view('vocab.show', compact('vocab', 'vocabdetails', 'topics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $vocab = Vocab::find($id);
        $vocab->topic = $request->topic;
        $vocab->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vocab = Vocab::find($id);
        $vocab->delete();
        return '{}';
    }
}
