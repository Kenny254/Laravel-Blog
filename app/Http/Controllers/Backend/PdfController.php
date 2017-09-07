<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App;
use App\User;
use App\Email;

class PdfController extends Controller
{
	public function __construct()
	{
		$this->middleware('role:support|admin');
	}

    public function users()
    {
    	$users = User::all();
    	$view = view('backend.PDF.users',compact('users'))->render();
    	$filename = "users";
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		//$pdf->setPaper($papersize,$paperorientation)
		return $pdf->stream($filename.'.pdf'); 
    }
}
