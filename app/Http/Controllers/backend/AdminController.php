<?php

namespace App\Http\Controllers\backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Admin::query();
             
            return DataTables::of($query)
                       ->addColumn('action', function($admin){
                        return view('backend.action.admin_action',['admin' => $admin]);
                       })
                       ->order(function ($admin){
                        $admin->orderBy('created_at','desc');
                                 })->addColumn('created_at', function ($data) {
                        return date('d-M-Y H:i:s', strtotime($data->created_at));
                             })
                       
                       ->rawColumns(['action'])
                       ->make(true);
        }
        
        
        return view('backend.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        
        Admin::create($request->validated());
        return redirect()->route('admin.index')->with('success','Admin is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('backend.detail.admin_detail',['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        
        return view('backend.admin.edit', ['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, Admin $admin)
    {
       
        $admin->update($request->validated());
        return redirect()->route('admin.index')->with('success','Admin is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('success','Admin is successfully deleted!');
    }
}
