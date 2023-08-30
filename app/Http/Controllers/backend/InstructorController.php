<?php

namespace App\Http\Controllers\backend;

use App\Models\Instructor;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorRequest;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Instructor::query();

            return DataTables::of($query)
                       ->addColumn('action', function($instructor){
                        return view('backend.action.instructor_action',['instructor' => $instructor]);
                       })
                       ->order(function ($instructor){
                        $instructor->orderBy('created_at','desc');
                                 })->addColumn('created_at', function ($data) {
                        return date('d-M-Y H:i:s', strtotime($data->created_at));
                             })
                       ->rawColumns(['action'])
                       ->make(true);
        }
        
        return view('backend.instructor.index');
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
       $attributes = $request->validated();
       if($request->hasFile('profile') && $request->file('profile')->isValid()){
          $file_name = uploadFile($request->profile, 'images');
          $attributes['profile'] = $file_name;
       }
        Instructor::create([
            'name' =>$attributes['name'],
            'email' =>$attributes['email'],
            'password' =>$attributes['password'],
            'phone' =>$attributes['phone'],
            'address' =>$attributes['address'],
            'gender' =>$attributes['gender'],
            'dob' =>$attributes['dob'],
            'profile' =>$attributes['profile'],
            'link' =>json_encode($attributes['link']),
        ]);
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
        return view('backend.detail.instructor_detail',['instructor' => $instructor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructors  $instructors
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        // $links = json_decode($instructor['link'],true);
        // foreach(json_decode($instructor->link,true) as  $key => $link){
        //     dd($link            ['icon']);
        // }
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
        
        $attributes = $request->validated();
        if($request->hasFile('profile') && $request->file('profile')->isValid()){
            $file_name = uploadFile($request->profile, 'images');
            $attributes['profile'] = $file_name;
         }
        $instructor->update([
            'name' =>$attributes['name'],
            'email' =>$attributes['email'],
            'phone' =>$attributes['phone'],
            'address' =>$attributes['address'],
            'gender' =>$attributes['gender'],
            'dob' =>$attributes['dob'],
            'profile' =>$attributes['profile'],
            'link' =>json_encode($attributes['link']),
        ]);
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
