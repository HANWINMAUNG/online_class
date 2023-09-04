<?php
namespace App\Http\Controllers\frontend;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpisodesController extends Controller
{
    public function index(Course $course)
    { 
        $episodes = Episode::where('course_id', $course->id)->get();
        return view('frontend.episode_detail', [ 
            'episodes' => $episodes,
            'course' => $course
        ]);
    } 
}
