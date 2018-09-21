<?php

namespace App\Http\Controllers\Line_Manager2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;
use App\Models\Ticket_erf;
use App\Models\Ticket_jd;

use App\Mail\Request_approval;
use Illuminate\Support\Facades\Mail;

class ApprovalController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $ticket = Ticket::get();
    	return view('Line_Manager2.list',compact('ticket'));
    }

    /* Deatil content requirement */
    public function content_req($id)
    {
        $content = Ticket::findOrFail($id);
        return response()->json();
    }

    public function approval()
    {
        $ticket = Ticket::where('approval_lm2','0')->get();
    	return view('Line_Manager2.approval',compact('ticket'));
    }

    public function approved($id)
    {
        $ticket = Ticket::findOrFail($id);

        Ticket::findOrFail($id)->update([
            'approval_lm2' => '1'
        ]);
        
        /* Send to Email */
        Mail::to(Auth::user()->email)->send(new Request_approval($ticket));

        return redirect()->route('lm2.list')->with('success','Successfully Approved!');
    }

    public function reject($id,Request $request)
    {
        Ticket::findOrFail($id)->update([
            'approval_lm2' => '2',
            'reason_reject_lm2' => ucfirst($request->reason_for_rejection),
        ]);

        return redirect()->route('lm2.list')->with('error','You Have Been Rejected This Ticket !');
    }

    public function detail($id)
    {
        $detail = Ticket::findOrFail($id);
        $soft = json_decode($detail->ticket_jd_details->soft_competency);
        $hard = json_decode($detail->ticket_jd_details->hard_index);
        $hard_value = json_decode($detail->ticket_jd_details->hard_value);

        return view('Line_Manager2.detail',compact('detail','soft','hard','hard_value'));
    }

}
