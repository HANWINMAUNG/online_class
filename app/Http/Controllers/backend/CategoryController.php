<?php
namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
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
            $query = Category::query();
            return DataTables::of($query)
                       ->addColumn('action' , function($category)
                       {
                        return view('backend.action.category_action' , ['category' => $category]);
                       })
                       ->order(function ($category)
                       {
                        $category->orderBy('created_at' , 'desc');
                       })
                       ->addColumn('created_at' , function ($data)
                       {
                        return date('d-M-Y H:i:s' , strtotime($data->created_at));
                       })
                       ->rawColumns(['action'])
                       ->make(true);
        }  
            return view('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
         $title = $request->validated();
         $slug = Str::slug($title['title']);
         Category::create([
              'title' => $title['title'],
              'slug' => $slug
         ]);
         return redirect()->route('category.index')->with('success' , 'Category is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.detail.category_detail' , ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit' , ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request , Category $category)
    {
        $title = $request->validated();
        $slug = Str::slug($title['title']);
        Category::update([
              'title' => $title,
              'slug' => $slug
        ]);
        return redirect()->route('category.index')->with('success' , 'Category is successfully updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success' , 'Category is successfully deleted!');
    }
}
