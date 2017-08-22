<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class PagesController extends Controller
{
    public function getIndex()
    {
    	// The main dashboard view
    	return view('backend/pages/index');
    }

    public function getProfile()
    {
    	// The main dashboard view
    	return view('backend/pages/profile');
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
