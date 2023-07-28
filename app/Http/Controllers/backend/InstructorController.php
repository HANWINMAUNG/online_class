<?php

namespace App\Http\Controllers\backend;

use App\Models\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorRequest;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::query()->get();
        
        return view('backend.instructor.index',['instructors' =>$instructors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstructorRequest $request)
    {
        Instructor::create($request->validated());
        return redirect()->route('instructor.index')->with('success','Instructor is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructors  $instructors
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructors  $instructors
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        return view('backend.instructor.edit', ['instructor'=>$instructor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructors  $instructors
     * @return \Illuminate\Http\Response
     */
    public function update(InstructorRequest $request, Instructor $instructor)
    {
        $instructor->update($request->validated());
        return redirect()->route('instructor.index')->with('success','Instructor is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructors  $instructors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->route('instructor.index')->with('success','Instructor is successfully deleted!');
    }
}
