<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Post;
use App\Email;
use App\User;
use Charts;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user|admin|support');
        $this->middleware('auth');
    }

    public function getIndex()
    {
        // USER ROLE
        $posts =  DB::table('posts')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        $messages = DB::table('emails')->where('recipient', Auth::user()->email)->get();
        $comments = DB::table('comments')->where('name', Auth::user()->name)->get();
    	$mylatest = DB::table('posts')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->take(4)
                    ->get();
        $chart = Charts::database($posts, 'bar', 'highcharts')
                ->title('Summary of my posts by month')
                ->elementLabel("posts")
                ->dimensions(0, 300)
                ->groupByMonth();

        // SUPERADMIN ROLE
        $allusers = User::all();
        $allposts = Post::all();
        $allmessages = Email::all();
        $userchart = Charts::database($allusers, 'bar', 'highcharts')
                    ->title('Summary of all users by month')
                    ->elementLabel("users")
                    ->dimensions(0, 300)
                    ->groupByMonth();
        $allpostschart = Charts::database($allposts, 'bar', 'highcharts')
                        ->title('Summary of all posts by month')
                        ->elementLabel("posts")
                        ->dimensions(0, 300)
                        ->groupByMonth();
        $latestusers = DB::table('users')
                        ->orderBy('created_at', 'desc')
                        ->take(8)
                        ->get();

    	return view('backend/pages/index', compact('posts', 'messages', 'comments','mylatest', 'chart', 'allusers', 'allposts', 'allmessages', 'userchart', 'allpostschart', 'latestusers'));
    }

    public function getProfile()
    {
    	// The main dashboard view
        $user = Auth::user();
    	return view('backend/pages/profile', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outbox()
    {
        $inbox = DB::table('emails')->where('recipient', Auth::user()->email)->get();
        $sent = DB::table('emails')->where('from', Auth::user()->email)->get();
        return view('backend/email/outbox', compact('inbox', 'sent'));
    }
}
