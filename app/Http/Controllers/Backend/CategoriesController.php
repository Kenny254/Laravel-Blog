<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Session;
use App\Post;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:support|admin');
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('backend/categories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => 'required|max:60|unique:categories,name'
            ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('new-category', $category->name . ' category has been created successfully');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('backend/categories/show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend/categories/edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'name' => 'required|max:60|unique:categories,name'
            ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        Session::flash('update-category', $category->name . ' category has been updated successfully');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        Post::whereCategoryId($id)->update(['category_id' => null]);

        Session::flash('delete-category', 'The category has been deleted successfully');
        return redirect()->route('categories.index');
    }
}
