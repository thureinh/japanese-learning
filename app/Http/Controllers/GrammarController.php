<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Grammar;

class GrammarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grammars = Grammar::all();
        return view('grammar.teacher_listGrammar', compact('grammars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grammar.teacher_createGrammar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grammar = new Grammar;
        $grammar->title = $request->grammar_topic;
        $grammar->explanation = $request->explanation;
        $grammar->example = $request->example;
        if($request->hasFile('explain_img'))
        {
            $path = Storage::putFile('grammars', $request->file('explain_img'));
            $grammar->explainedimage = $path;
        }
        $grammar->save();
        return route('grammar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grammar = Grammar::find($id);
        return view('grammar.teacher_showGrammar', compact('grammar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grammar = Grammar::find($id);
        return view('grammar.teacher_editGrammar', compact('grammar'));
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
        $grammar = Grammar::find($id);
        $grammar->title = $request->grammar_topic;
        $grammar->explanation = $request->explanation;
        $grammar->example = $request->example;
        if($request->hasFile('explain_img'))
        {
            $new_img = $request->file('explain_img');
            Storage::delete($grammar->explainedimage);
            $path = Storage::putFile('grammars', $new_img);
            $grammar->explainedimage = $path;
        }
        $grammar->save();
        return route('grammar.show', ['grammar' => $grammar->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grammar = Grammar::find($id);
        Storage::delete($grammar->explainedimage);
        $grammar->delete();
        return '{}';
    }
}
