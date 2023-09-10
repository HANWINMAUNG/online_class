<?php
namespace App\Http\Controllers\backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $query = Admin::query();  
            return DataTables::of($query)
                       ->addColumn('action' , function($admin)
                       {
                        return view('backend.action.admin_action' , ['admin' => $admin]);
                       })
                       ->order(function ($admin)
                       {
                        $admin->orderBy('created_at' , 'desc');
                       })
                       ->addColumn('created_at' , function ($data)
                      {
                        return date('d-M-Y H:i:s' , strtotime($data->created_at));
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
        // $file_name = uniqid() . '_' . date('Y-m-d-H-i-s') . '_' . $request->profile->getClientOriginalName();
        // $request->profile->move('images', $file_name);
        $input = $request->validated();
        if($request->hasFile('profile') && $request->file('profile')->isValid())
        {
           $file_name = uploadFile($request->profile , 'images');
        // $file_name = uniqid() . '_' . date('Y-m-d-H-i-s') . '_' . $request->profile->getClientOriginalName();
        // Storage::put('images/' . $file_name, file_get_contents($request->profile));//put(full_path,content)
           $input['profile'] = $file_name;
        }
          Admin::create($input);
          return redirect()->route('admin.index')->with('success' , 'Admin is successfully created!');
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
        return view('backend.admin.edit' , ['admin' => $admin]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request , Admin $admin)
    {
        $input = $request->validated();
        if($request->hasFile('profile') && $request->file('profile')->isValid())
        {
           $file_name = uploadFile($request->profile , 'images');
           $input['profile'] = $file_name; 
        }
        $admin->update($input);
        return redirect()->route('admin.index')->with('success' , 'Admin is successfully updated!');  
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
        return redirect()->route('admin.index')->with('delete' , 'Admin is successfully deleted!');
    }
}
