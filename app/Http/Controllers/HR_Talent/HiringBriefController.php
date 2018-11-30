<?php

namespace App\Http\Controllers\HR_Talent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;
use App\Models\Hiring_brief;
use App\User;
use Carbon\Carbon;
use DateTime;

use Illuminate\Support\Facades\Mail;
use App\Mail\msg_hiring_brief;

class HiringBriefController extends Controller
{
	public function __construct() 
	{
		$this->middleware('auth');
	}

	/* halaman hiring brief */
	public function index()
	{
		$data = Ticket::where([
						['approval_hrbp','1'],
						['approval_GH','1'],
						['approval_chief','1']
					])
					->orderBy('created_at','dsc')
					->get();
		
		return view('HR_Talent.Hiring_brief.index',compact('data'));
	}

	/* detail tiket yg di ajukan */
	public function detail($id)
	{
		$detail = Ticket::findOrFail($id);
		$soft = json_decode($detail->ticket_jd_details->soft_competency);
        $hard = json_decode($detail->ticket_jd_details->hard_index);
        $hard_value = json_decode($detail->ticket_jd_details->hard_value);
		return view('HR_Talent.detail',compact('detail','soft','hard','hard_value'));
	}

	/* index untuk buat schedule brief */
	public function create($id)
	{
		$data = Ticket::findOrFail($id);
		$user = User::where('id','!=',Auth::user()->id)->get();
		$HRBP = User::where('group','Group HR Business Partner')->get();

		return view('HR_Talent.Hiring_brief.create_schedule',compact('data','user','HRBP'));
	}

	/* save hiring schedule to database */
	public function schedule($id,Request $request)
	{
		/* SEND NOTIF TO EMAIL */
		// $email = User::whereIn('id',[$request->interview_user,$request->interview_hrbp])->pluck('name');
		// Mail::to(array('asu@mail.com','awda@gmail.com','awda@yahoo.com'))->queue(new msg_hiring_brief());

		Hiring_brief::findOrFail($id)->update([
			'date_schedule' => Carbon::parse($request->date)->toDateString(),
			'time_schedule' => Carbon::parse($request->time)->toTimeString(),
			'place_schedule' => ucwords($request->place),
			'interviewer_user' => $request->interview_user,
			'interviewer_hrbp' => $request->interview_hrbp
			// 'interviewer_user' => User::findOrFail($request->interview_user)->id,
			// 'interviewer_hrbp' => User::findOrFail($request->interview_hrbp)->id
		]);

		return redirect()->route('hiring_brief')->with('success','Successfully Created Schedule!');
	}

	/* index untuk masukan hasil briefing */
	public function input_brief($id)
	{
		$data = Ticket::findOrFail($id);

		return view('HR_Talent.Hiring_brief.input_brief',compact('data'));
	}

	/* Save hasil hiring brief */
	public function store_input_brief($id,Request $request)
	{
		Hiring_brief::findOrFail($id)->update([
			'approval_hiring_by_hrbp' => '0',
			'job_function' => $request->job_function,
			'general_information' => $request->general_information,
			'characteristic' => $request->characteristics,
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
