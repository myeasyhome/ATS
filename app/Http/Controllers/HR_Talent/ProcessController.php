<?php

namespace App\Http\Controllers\HR_Talent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;

class ProcessController extends Controller
{
	public function __construct() 
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$data = Ticket::where([
						['approval_lm2','1'],
						['approval_hrbp','1']
					])->get();
		return view('HR_Talent.hiring_brief',compact('data'));
	}

	public function create($id)
	{
		$data = Ticket::findOrFail($id);

		return view('HR_Talent.create_brief',compact('data'));
	}

	public function store(Request $request)
	{
		dd($request->all());
	}
}
