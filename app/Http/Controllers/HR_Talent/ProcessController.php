<?php

namespace App\Http\Controllers\HR_Talent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;
use App\Models\Hiring_brief;
use Carbon\Carbon;

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

	/* create schedule brief */
	public function create($id)
	{
		$data = Ticket::findOrFail($id);

		return view('HR_Talent.create_schedule',compact('data'));
	}

	/* save hiring schedule to database */
	public function schedule($id,Request $request)
	{
		Hiring_brief::findOrFail($id)->update([
			'date_schedule' => Carbon::parse($request->date)->toDateString(),
			'time_schedule' => Carbon::parse($request->time)->toTimeString(),
			'place_schedule' => ucwords($request->place),
			'interviewer_user' => $request->interview_user,
			'interviewer_hrbp' => $request->interview_hrbp
		]);

		return redirect()->route('hiring_brief')->with('success','Successfully Created Schedule!');
	}

	public function input_brief($id)
	{
		$data = Ticket::findOrFail($id);

		return view('HR_Talent.input_brief',compact('data'));
	}

	/* Save result hiring brief */
	public function store_input_brief($id,Request $request)
	{
		Hiring_brief::findOrFail($id)->update([
			'approval_hiring_by_hrbp' => '0',
			'job_function' => $request->job_function,
			'general_information' => $request->general_information,
			'characteristic' => $request->characteristics,
			'date_result_hiring'=> $request->date_result_hiring
		]);

		return redirect()->route('hiring_brief')->with('success','Successfully Input Result Of Brief!');	
	}

	/* alasan di tolak */
	public function rejected_reason($id)
    {
        $reject = Hiring_brief::findOrFail($id);
        return response()->json($reject);
    }
}
