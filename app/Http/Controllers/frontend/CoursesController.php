<?php
namespace App\Http\Controllers\frontend;

use App\Models\Course;
use App\Models\Episode;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index()
    {
        $course_query = Course::query()->with('Instructor','Category')->latest()->filter(request()->all()); 
        $categories = Category::pluck('title', 'id')->toArray();
        $courses = $course_query->paginate(6);
        return view('frontend.course.index',
        [
            'courses' => $courses,
            'categories' => $categories
        ]);
    } 

    public function show(Course $course)
    { 
        $episodes = Episode::where('course_id' , $course->id)->get();
        return view('frontend.course.detail', [
           'course' => $course, 
           'episodes' => $episodes 
       ]);
    }  
}
