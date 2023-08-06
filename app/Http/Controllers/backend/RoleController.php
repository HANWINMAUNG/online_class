<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Role::query();

            return DataTables::of($query)
                       ->addColumn('action', function($role){
                        return view('backend.action.role_action',['role' => $role]);
                       })
                       ->rawColumns(['action'])
                       ->make(true);
        }
        return view('backend.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::toBase()->get()->pluck('name', 'id')->toArray();
        
        return view('backend.role.create',['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
       
        $attributes = $request->validated();

        $role = Role::create([
            'name' =>$attributes['name'],
            'guard_name' => 'admin'
        ]);

        $role->syncPermissions($attributes['permission']);
        return redirect()->route('role.index')->with('success','Role is successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('backend.detail.role_detail',['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::toBase()->get()->pluck('name', 'id')->toArray();
        
        return view('backend.role.edit',['permissions'=>$permissions,'role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $attributes = $request->validated();

        $role = Role::update([
            'name' =>$attributes['name'],
            'guard_name' => 'admin'
        ]);

         $role->syncPermissions($attributes['permission']);
        return redirect()->route('role.index')->with('success','Role is successfully Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('success','Role is successfully deleted!');
    }
}
