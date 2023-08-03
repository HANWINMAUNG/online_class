<?php

namespace App\Http\Controllers\backend;

use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Course::query();

            return DataTables::of($query)
                       ->addColumn('instructor_id',function($course){
                        return $course->Instructor->name;
                       })
                       ->addColumn('action', function($course){
                        return view('backend.action.course_action',['course' => $course]);
                       })
                       ->rawColumns(['action'])
                       ->make(true);
        }
        
        return view('backend.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instructors = Instructor::query()->get();
        return view('backend.course.create',['instructors' =>$instructors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        Course::create($request->validated());
        return redirect()->route('course.index')->with('success','Course is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
       
        $instructors = Instructor::query()->get();
        return view('backend.course.edit',[
            'instructors' =>$instructors,
            'course' =>$course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return redirect()->route('course.index')->with('success','Course is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index')->with('success','Course is successfully deleted!');
    }
}
