<?php
namespace App\Http\Controllers\backend;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Support\Str;
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
    public function index(Request $request , Course $course)
    {
        if($request->ajax())
        {
            $query = Episode::where('course_id' , $course->id); 
            return DataTables::of($query)
                       ->addColumn('course_id' , function($episode)
                       {
                        return $episode->Course->title;
                       })
                       ->order(function ($episode)
                       {
                        $episode->orderBy('created_at' , 'desc');
                       })
                       ->addColumn('created_at' , function ($data)
                       {
                        return date('d-M-Y H:i:s' , strtotime($data->created_at));
                       })
                       ->addColumn('action' , function($episode)
                       {
                        return view('backend.action.episode_action' , ['episode' => $episode]);
                       })
                       ->rawColumns(['action'])
                       ->make(true);
        }
        return view('backend.episode.index' , ['course' => $course]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view('backend.episode.create',['course' =>$course]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EpisodeRequest $request , Course $course)
    {
        $attributes = $request->validated();
        if($request->hasFile('cover') && $request->file('cover')->isValid())
        {
            $file_name = uploadFile($request->cover , 'images');
            $attributes['cover'] = $file_name;
         }
         if($request->hasFile('image') && $request->file('image')->isValid())
         {
            $file_name = uploadFile($request->image , 'images');
            $attributes['image'] = $file_name;
         }
         if($request->hasFile('video') && $request->file('video')->isValid())
         {
            $file_name = uploadFile($request->video , 'videos');
            $attributes['video'] = $file_name;
         } 
        $attributes['course_id'] = $course->id;  
        Episode::create($attributes);
        return redirect()->route('episode.index' , [$course->id])->with('success' , 'Episode is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course , Episode $episode)
    {
        return view('backend.detail.episode_detail' , ['episode' => $episode]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course , Episode $episode)
    {
        return view('backend.episode.edit' , ['episode' => $episode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EpisodeRequest $request , Course $course, Episode $episode)
    {
        $attributes = $request->validated();
        if($request->hasFile('cover') && $request->file('cover')->isValid())
        {
            $file_name = uploadFile($request->cover , 'images');
            $attributes['cover'] = $file_name;
         }
         if($request->hasFile('image') && $request->file('image')->isValid())
         {
            $file_name = uploadFile($request->image , 'images');
            $attributes['image'] = $file_name;
         }
         if($request->hasFile('video') && $request->file('video')->isValid())
         {
            $file_name = uploadFile($request->video , 'videos');
            $attributes['video'] = $file_name;
         }
        $episode->update($attributes);
        return redirect()->route('episode.index' , [$episode->Course->id])->with('success' , 'Episode is successfully updated!');   
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course , Episode $episode)
    {
        $episode->delete();
        return redirect()->route('episode.index' , [$episode->Course->id])->with('delete' , 'Episode is successfully deleted!');
    }
}
