<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Students;
class AllController extends Controller
{
	public function index(){
		return view('NavbarTemplate');
	}
    public function ShowDetails(){
    	$Details=Students::paginate(5);
    	// $Details = DB::table("students")->paginate(5);
        return view("studentsView", ['details' => $Details]);
    }
}
