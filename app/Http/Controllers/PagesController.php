<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function getIndex()
    {
        // Get the latest 5 posts
        $posts = DB::table('posts')
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();


        return view('frontend/pages/welcome', compact('posts'));
    }

    public function getRead()
    {
        $onepost = DB::table('posts')->where('id', '1')->first();
        // Get the latest 5 posts
        $posts = DB::table('posts')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

    	return view('frontend/pages/posts/read', compact('posts', 'onepost'));
    }

}
