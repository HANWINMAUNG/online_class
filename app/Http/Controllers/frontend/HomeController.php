<?php

namespace App\Http\Controllers\frontend;

use App\Models\Course;
use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::query()->with('Instructor','Category')->get(); 
        $categories =Category::toBase()->get();
        $instructors =Instructor::toBase()->get();
        
        return view('frontend/home',
        [
            'courses'=> $courses,
            'categories'=>$categories,
            'instructors'=>$instructors
        ]);
    }
}
