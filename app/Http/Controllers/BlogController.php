<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getSingle($slug)
    {
    	//fetch from the DB based on slug
    	$post = Post::where('slug', '=', $slug)->first();

    	//return the view
    	return view('frontend.pages.posts.read', compact('post'));
    }
}
