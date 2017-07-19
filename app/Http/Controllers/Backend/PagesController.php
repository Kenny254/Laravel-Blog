<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
