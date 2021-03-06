<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Category;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function getIndex()
    {
        // Get the latest 5 posts
        $posts = DB::table('posts')
                ->orderBy('created_at', 'desc')
                ->take(2)
                ->get();
        $allposts = Post::all();
        $comments = Comment::all();
        $categories = Category::all();
        $users = User::all();
                
        return view('frontend/pages/welcome', compact('posts', 'allposts', 'users', 'comments', 'categories'));
    }

}
