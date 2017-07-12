<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
        return view('frontend/pages/welcome');
    }

    public function getAbout()
    {
    	return view('frontend/pages/about');
    }

    public function getContact()
    {
    	return view('frontend/pages/contact');
    }
}
