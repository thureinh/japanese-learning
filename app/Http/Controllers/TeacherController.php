<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $teacher = Auth::user();
        return view('teacher.show_teacher', ['teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $teacher = Auth::user();
        return view('teacher.edit_teacher', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $teacher = Auth::user();
        if($request->hasFile('profile'))
        {
            $new_profile = $request->file('profile');
            Storage::delete($teacher->profile_pic);
            $path = Storage::putFile('profile_images', $new_profile);
            $teacher->profile_pic = $path;
        }
        $teacher->firstname = $request->firstname;
        $teacher->lastname = $request->lastname;
        $teacher->phone = $request->phone;
        $teacher->dateofbirth = $request->dob;
        $teacher->address = $request->address;
        $teacher->batch_no = $request->batch;
        $teacher->roll_no = $request->roll;
        
        $teacher->save();
        return redirect()->route('teacher.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
