<?php

namespace App\Http\Controllers\backend;

use App\Models\Course;
use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\CategoryCourse;
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
                       ->order(function ($course){
                        $course->orderBy('created_at','desc');
                                 })->addColumn('created_at', function ($data) {
                        return date('d-M-Y H:i:s', strtotime($data->created_at));
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
        $categories = Category::toBase()->get()->pluck('title', 'id')->toArray();
        return view('backend.course.create',['instructors' =>$instructors,'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        
        $attributes = $request->validated();
            
       $course = Course::create([
            'title' =>$attributes['title'],
            'instructor_id' =>$attributes['instructor_id'],
            'price' =>$attributes['price'],
            'image' =>$attributes['image'],
            'cover_photo' =>$attributes['cover_photo'],
            'description' =>$attributes['description'],
            'summary' =>$attributes['summary']
        ]);

        $course->Category()->attach($attributes['category']);
       
        
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
        return view('backend.detail.course_detail',['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $category_courses = $course->Category->toBase()->pluck('title', 'id')->toArray();
        $categories = Category::toBase()->get()->pluck('title', 'id')->toArray();
        $instructors = Instructor::query()->get();
        return view('backend.course.edit',[
            'instructors' =>$instructors,
            'course' =>$course,
            'categories'=>$categories,
            'category_courses'=>$category_courses

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
        $attributes = $request->validated();
            
       $course = Course::update([
            'title' =>$attributes['title'],
            'instructor_id' =>$attributes['instructor_id'],
            'price' =>$attributes['price'],
            'image' =>$attributes['image'],
            'cover_photo' =>$attributes['cover_photo'],
            'description' =>$attributes['description'],
            'summary' =>$attributes['summary']
        ]);

        $course->Category()->sync($attributes['category']);

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
