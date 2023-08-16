<?php

namespace App\Http\Controllers\backend;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeRequest;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Episode::query();
             
            return DataTables::of($query)
                       ->addColumn('course_id',function($episode){
                        return $episode->Course->title;
                       })
                       ->order(function ($episode){
                        $course->orderBy('created_at','desc');
                                 })->addColumn('created_at', function ($data) {
                        return date('d-M-Y H:i:s', strtotime($data->created_at));
                             })
                       ->addColumn('action', function($episode){
                        return view('backend.action.episode_action',['episode' => $episode]);
                       })
                       ->rawColumns(['action'])
                       ->make(true);
        }
        
        return view('backend.episode.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::query()->get();
       
        return view('backend.episode.create',['courses' =>$courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EpisodeRequest $request)
    {
        $attributes = $request->validated();
            
       $episode = Episode::create([
            'title' =>$attributes['title'],
            'course_id' =>$attributes['course_id'],
            'cover' =>$attributes['cover'],
            'video' =>$attributes['video'],
            'summary' =>$attributes['summary']
        ]);
        return redirect()->route('episode.index')->with('success','Episode is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {
        return view('backend.detail.episode_detail',['episode' => $episode]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {

        $courses = Course::query()->get();

        return view('backend.episode.edit',[
            'episode' =>$episode,
            'courses' =>$courses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EpisodeRequest $request, Episode $episode)
    {
        $episode->update($request->validated());

        return redirect()->route('episode.index')->with('success','Episode is successfully updated!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        $episode->delete();
        return redirect()->route('episode.index')->with('success','Episode is successfully deleted!');
    }
}
