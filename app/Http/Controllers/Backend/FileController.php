<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Excel;
use App;
use App\User;
use App\Email;

class FileController extends Controller
{
	public function __construct()
	{
		$this->middleware('role:support|admin');
	}

    public function users_pdf()
    {
    	$users = User::all();
    	$view = view('backend.files.users_pdf',compact('users'))->render();
    	$filename = "users";
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		//$pdf->setPaper($papersize,$paperorientation)
		return $pdf->stream($filename.'.pdf'); 
    }

    public function users_xls($type)
    {
    	$data = User::get()->toArray();
		return Excel::create('Quickpost Blog Excel', function($excel) use ($data) {
			$excel->sheet('All Users', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
    }
}
