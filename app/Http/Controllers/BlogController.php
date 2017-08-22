<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class BlogController extends Controller
{
	public function getIndex()
	{
		$posts = Post::orderBy('id', 'desc')->paginate(5);
        $tags = Tag::all();
        $categories = Category::all();

		//return the view
        return view('frontend.pages.blog.index', compact('posts', 'tags', 'categories'));
	}

    public function getSingle($slug)
    {
        //fetch from the DB based on slug
        $post = Post::where('slug', '=', $slug)->first();
        $tags = Tag::all();
        $categories = Category::all();
        // Get the latest 5 posts
        $posts = DB::table('posts')
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();

        //return the view
        return view('frontend.pages.blog.read', compact('post', 'posts', 'tags', 'categories'));
    }
}
