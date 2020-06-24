<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Writing;
use App\User;
use DB;
use Auth;

class WritingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writings = Writing::orderBy('created_at', 'desc')
                  ->get();
        return view('writing.index_writing', compact('writings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('writing.create_writing');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todaydate = date('Y-m-d');

        $request->validate([
            "title" => "required|unique:App\Writing,title", 
            "maxmark" => "required|numeric|min:1|max:100", 
            "deadline" => "required|after:$todaydate", 
            "instruction" => "required"
        ]);

        $writing = new Writing();
        $writing->title = request('title');
        $writing->max_mark = request('maxmark');
        $writing->deadline = request('deadline');
        $writing->instruction = request('instruction');
        $writing->save();

        return redirect()->route('writing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showwriting = Writing::find($id);

        $detail = $showwriting->users()
                  ->where('status', 'Submitted')
                  ->orwhere('status', 'Checked')
                  ->get();

        return view('writing.show_writing', compact('showwriting', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $writing = Writing::find($id);
        $userwriting = $writing->users()->find(Auth::user()->id)->userwriting;
        return view('writing.edit_studentwriting', compact('writing', 'userwriting'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $writing = Writing::find($id);
        $writing->delete();
        return '{}';
    }

    // for student writing

    public function studentwritinglist() 
    {
        //New Writings
        $newwritings = Writing::orderBy('updated_at', 'desc')
                       ->orderBy('created_at', 'desc')
                       ->get();   

        $newwritings = $newwritings->reject(function ($writing){
            return $writing->users->contains(function ($user) { 
            return $user->id === Auth::id(); });  })
            ->take(2);

        //Get Current User's Ordered Writing
        $writings = Auth::user()
                        ->writings()
                        ->orderBy('updated_at')
                        ->orderBy('created_at')
                        ->get();

        //User Writings
        $userwritings = $writings
                        ->reject(function ($writing){
                            return $writing->userwriting->status === "Saved";
                        })->all();

        //Draft Writings
        $draftwritings = $writings
            ->filter(function ($writing){
                return $writing->userwriting->status === "Saved";
            })->take(2);   


        return view('writing.index_studentwriting', compact('newwritings', 
            'userwritings', 'draftwritings'));
    }

    public function studentwriting($id)
    {
        $writing = Writing::find($id);
        return view('writing.create_studentwriting', compact('writing'));
    }

    public function storewriting($id) 
    {
        $user = User::find(Auth::user()->id);
        $currentdatetime = date('Y-m-d H:m:i'); 
        if (request('just_submit') == 'true') {
            $user->writings()->updateExistingPivot($id, 
                [
                    'status' => 'Submitted',
                    'submitted_datetime' => $currentdatetime
                ]
            );
            return back();
        }
        $writing = request('writing');



        if (request('btnsubmit')) {  
            // $user->writings()->attach([ $id, $writing, '', '', 'Submitted']);
            if(count(Writing::find($id)->users()->where('id', Auth::id())->get()))
            {
                $user->writings()->updateExistingPivot($id,
                    [
                        'student_writing'=>$writing, 
                        'status'=>'Submitted',
                        'submitted_datetime' => $currentdatetime
                    ]
                );
            }
            else{
                $user->writings()->attach($id, [
                    'student_writing'=>$writing, 
                    'status'=>'Submitted',
                    'submitted_datetime' => $currentdatetime
                ]);
            }
        }
        if(request('btnsave')) {
            if(count(Writing::find($id)->users()->where('id', Auth::id())->get()))
            {
                $user->writings()->updateExistingPivot($id, 
                    [
                        'student_writing' => is_null($writing) ? '' : $writing,
                        'status' => 'Saved'
                    ]
                );              
            }
            else{
                $user->writings()->attach($id, 
                    [
                        'student_writing' => is_null($writing) ? '' : $writing,
                        'status' => 'Saved'
                    ]
                );
            }
        }

        return redirect()->route('writing.studentwritinglist');
    }

    // get check writing detail 
    public function checkwriting($userid, $writingid)
    {
        $writing = Writing::find($writingid);
        $userwriting = $writing->users()->where('user_id', $userid)->get();
        return view('writing.check_writing', compact('writing', 'userwriting'));
    }

    public function showallNew()
    {
        $newwritings = Writing::orderBy('updated_at', 'desc')
                               ->orderBy('created_at', 'desc')
                               ->get(); 
        $newwritings = $newwritings->reject(function ($writing){
                    return $writing->users->contains(function ($user) { 
                    return $user->id === Auth::id(); });  });
        return view('writing.showall_newwriting', compact('newwritings'));      
    }

    public function showallDraft()
    {
        $writings = Auth::user()
                        ->writings()
                        ->orderBy('updated_at')
                        ->orderBy('created_at')
                        ->get();

        $draftwritings = $writings
            ->filter(function ($writing){
                return $writing->userwriting->status === "Saved";
            });      
        return view('writing.showall_draftwriting', compact('draftwritings'));
    }
}
