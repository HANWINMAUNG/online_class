<?php

namespace App\Http\Controllers\frontend;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::query()->with('Instructor','Category')->get(); 
       
        
        return view('frontend/home',
        [
            'courses'=> $courses,
           
        ]);
    }
}
