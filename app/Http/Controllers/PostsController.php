<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Datatables;
use App\Post;

class PostsController extends Controller
{
    /**
     * Displays view with all posts
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        return view('backend/posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/posts/create');
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
             'body' => 'required|min:200',
            ]);
        
        // The blog post is valid, store in database...
        $post = new Post;
        $post->title = $request->title;
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
        return view('backend/posts/edit', compact('post'));
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
        // Validate the request...
        $this->validate($request, [
             'title' => 'required|max:255',
             'body' => 'required|min:200',
            ]);

        // update into DB
        $post = Post::find($id);
        $post->title = $request->title;
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
