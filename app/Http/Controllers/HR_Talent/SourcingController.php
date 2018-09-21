<?php

namespace App\Http\Controllers\HR_Talent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;
use App\Models\Hiring_brief;

class SourcingController extends Controller
{
    public function __construct() 
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$data = Hiring_brief::where('approval_hiring_by_hrbp','1')->get();
		return view('HR_Talent.Sourcing.index',compact('data'));
	}

	public function upload($id)
	{
		// $upload = ;
		return view('HR_Talent.Sourcing.upload');
	}
}
