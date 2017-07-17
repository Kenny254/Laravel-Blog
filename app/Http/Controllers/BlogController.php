<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
	public function getIndex()
	{
		$posts = Post::orderBy('id', 'desc')->paginate(5);

		//return the view
        return view('frontend.pages.blog.index', compact('posts'));
	}

    public function getSingle($slug)
    {
        //fetch from the DB based on slug
        $post = Post::where('slug', '=', $slug)->first();

        // Get the latest 5 posts
        $posts = DB::table('posts')
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();

        //return the view
        return view('frontend.pages.blog.read', compact('post', 'posts'));
    }
}
