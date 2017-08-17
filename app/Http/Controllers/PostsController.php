<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
//use Yajra\Datatables\Datatables;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    /**
     * Displays view with all posts
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'asc')->paginate(10);
        return view('backend/posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend/posts/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $this->validate($request, [
             'title' => 'required|max:255',
             'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
             'category_id' => 'required|integer',
             'body' => 'required|min:50',
            ]);
        
        // The blog post is valid, store in database...
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->save();

        //Redirect users with success message
        Session::flash('new-post', 'Post created successfully!');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('backend/posts/show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) 
        {
            $cats[$category->id] = $category->name;
        }
        return view('backend/posts/edit')->withPost($post)->withCategories($cats);
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
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) 
        {
           // Validate the title and body...
            $this->validate($request, [
                 'title' => 'required|max:255',
                 'category_id' => 'required|integer',
                 'body' => 'required|min:200',
                ]); 
        }
        else
        {
            // Validate the request...
            $this->validate($request, [
                 'title' => 'required|max:255',
                 'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                 'category_id' => 'required|integer',
                 'body' => 'required|min:200',
                ]);
        }
        
        // update into DB
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        //save into DB
        $post->save();
        
        //Flash Message
        Session::flash('update-post', 'Your post was updated successfully!');

        // Redirect to view the post with saved changes
        return redirect()->route('posts.show', $post->id);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        
        Session::flash('delete-post', 'The post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
