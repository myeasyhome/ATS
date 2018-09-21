<?php

namespace App\Http\Controllers\HR_BussinessPartner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;
use App\Models\Hiring_brief;

use App\Mail\Request_approvalHRBP;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function __construct() 
    {
    	$this->middleware('auth');
    }

    public function list()
    {
        $ticket = Ticket::where('approval_lm2','1')->get();

        /* untuk notice hiring brief */
        $hiring = Hiring_brief::all();
    	return view('HR_BussinessPartner.list',compact('ticket','hiring'));
    }

    /* untuk approve ticket */
    public function approved($id)
    {
        $ticket = Ticket::findOrFail($id);
        
        Ticket::findOrFail($id)->update([
            'approval_hrbp' => '1'
        ]);

        /* dibuat untuk saling berhubungan dengan HR talent di table hiring brief */
        Hiring_brief::create([
            'ticket_id' => $id
        ]);

        /* send email for notif */
        Mail::to(Auth::user()->email)->send(new Request_approvalHRBP($ticket));

        return redirect()->route('hrbp.list')->with('success','Successfully Approved!');
    }

    /* for reject ticket */
    public function reject($id,Request $request)
    {
        Ticket::findOrFail($id)->update([
            'approval_hrbp' => '2',
            'reason_reject_hrbp' => ucfirst($request->reason_for_rejection),
        ]);

        return back()->with('error','You Have Been Rejected This Ticket !');
    }

    /* Detail ticket */
    public function detail($id)
    {
        $detail = Ticket::findOrFail($id);
        $soft = json_decode($detail->ticket_jd_details->soft_competency);
        $hard = json_decode($detail->ticket_jd_details->hard_index);
        $hard_value = json_decode($detail->ticket_jd_details->hard_value);

        return view('HR_BussinessPartner.detail',compact('detail','soft','hard','hard_value'));
    }
}
