<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class BlogController extends Controller
{
	public function getIndex()
	{
        if (Auth::guest()) {
            $posts = Post::orderBy('id', 'desc')->paginate(15);
            $latest = DB::table('posts')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
            $tags = Tag::all();
            $categories = Category::all();
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(15);
            $latest = DB::table('posts')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
            $tags = Tag::all();
            $categories = Category::all();
            $userlatest = DB::table('posts')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
        }

		//return the view
        return view('frontend.pages.blog.index', compact('posts', 'tags', 'categories', 'latest', 'userlatest'));
	}

    public function getSingle($slug)
    {
        if (Auth::guest()) {
            //fetch from the DB based on slug
            $post = Post::where('slug', '=', $slug)->first();
            $tags = Tag::all();
            $categories = Category::all();
            $latest = DB::table('posts')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
        } else {
            //fetch from the DB based on slug
            $post = Post::where('slug', '=', $slug)->first();
            $tags = Tag::all();
            $categories = Category::all();
            $latest = DB::table('posts')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
            $userlatest = DB::table('posts')
                    ->orderBy('created_at', 'desc')
                    ->where('user_id', Auth::user()->id)
                    ->take(5)
                    ->get();
        }
        //return the view
        return view('frontend.pages.blog.read', compact('post', 'tags', 'categories', 'latest', 'userlatest'));
    }
}
