<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Purifier;
use App\Post;
use App\Category;
use App\Tag;
use Image;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        // Users have to be authenticated to access posts
        $this->middleware('auth');

        $this->middleware('role:user|admin|support');
    }
    
    /**
     * Displays view with all posts
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->paginate(10);
        $allposts = Post::paginate(10);
        return view('backend/posts/index', compact('posts', 'allposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('backend/posts/create', compact('categories', 'tags'));
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
             'image' => 'sometimes|image',
            ]);
        
        // The blog post is valid, store in database...
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);
        $post->user_id = Auth::user()->id;

        //add image
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 400)->save(public_path('/images/posts/' . $filename));

            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

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
        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) 
        {
            $tags2[$tag->id] = $tag->name;
        }
        return view('backend/posts/edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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

        // Validate the request...
        $this->validate($request, [
             'title' => 'required|max:255',
             'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
             'category_id' => 'required|integer',
             'body' => 'required',
             'image' => 'image',
            ]);
        
        // update into DB
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        if ($request->hasFile('image')) {
            //add new photo
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 400)->save(public_path('/images/posts/' . $filename));
            $oldFilename = $post->image;

            //update DB
            $post->image = $filename;
            //Delete Old
            Storage::delete($oldFilename);
        } 
        

        //save into DB
        $post->save();

        if (isset($request->tags)) {
             $post->tags()->sync($request->tags);
        } else {
             $post->tags()->sync(array());
        }
        
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
        $post->tags()->detach();
        
       // $post->category()->detach();

        Storage::delete($post->image);

        $post->delete();
        
        Session::flash('delete-post', 'The post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}


