<?php

namespace App\Http\Controllers\frontend;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index()
    {
        $course_query = Course::query()->with('Instructor','Category')->latest()->filter(request()->all()); 
        $categories = Category::toBase()->get();
       
        $courses = $course_query->paginate(6);
        return view('frontend.courses',
        [
            'courses'=> $courses,
            'categories' =>$categories
        ]);
    }
    public function show(Course $course)
    { 
        return view('frontend.course_detail', [
           'course'=>$course,  
       ]);
    }
}
