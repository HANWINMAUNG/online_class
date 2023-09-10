<?php
namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // abort_if(!auth()->guard('admin')->user()->can('view-user'),403);
        $this->checkRolePermission('view-user');
        if($request->ajax())
        {
            $query = User::query();
            return DataTables::of($query)
                       ->addColumn('action' , function($user)
                       {
                        return view('backend.action.user_action' , ['user' => $user]);
                       })
                       ->order(function ($user)
                       {
                        $user->orderBy('created_at' , 'desc');
                       })
                       ->addColumn('created_at' , function ($data)
                       {
                        return date('d-M-Y H:i:s' , strtotime($data->created_at));
                       })
                       ->rawColumns(['action'])
                       ->make(true);
        }    
        return view('backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $this->checkRolePermission('create-user');
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->validated();
        if($request->hasFile('profile') && $request->file('profile')->isValid())
        {
           $file_name = uploadFile($request->profile , 'images');
           $input['profile'] = $file_name;
        }
        $this->checkRolePermission('create-user');
        User::create($input);
        return redirect()->route('user.index')->with('success' , 'User is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->checkRolePermission('view-user');
        return view('backend.detail.user_detail' , ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->checkRolePermission('edit-user');
        return view('backend.user.edit' , ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request , User  $user)
    {
        $input = $request->validated();
        if($request->hasFile('profile') && $request->file('profile')->isValid())
        {
           $file_name = uploadFile($request->profile , 'images');
           $input['profile'] = $file_name;
        }
        $this->checkRolePermission('edit-user');
        $user->update($input);
        return redirect()->route('user.index')->with('success' , 'User is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->checkRolePermission('delete-user');
        $user->delete();
        return redirect()->route('user.index')->with('delete' , 'User is successfully deleted!');
    }
}
