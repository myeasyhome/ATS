<?php

namespace App\Http\Controllers\HR_BussinessPartner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;

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
    	return view('HR_BussinessPartner.list',compact('ticket'));
    }

    public function approval()
    {
        /* akan muncul jika sudah di apporve Line manager 2 */
        $ticket = Ticket::where([
                            ['approval_lm2','1'],
                            ['approval_hrbp','0']
                        ])->get();

    	return view('HR_BussinessPartner.approval',compact('ticket'));
    }

    public function approved($id)
    {
        $ticket = Ticket::findOrFail($id);
        
        Ticket::findOrFail($id)->update([
            'approval_hrbp' => '1'
        ]);

        /* send email for notif */
        Mail::to(Auth::user()->email)->send(new Request_approvalHRBP($ticket));

        return redirect()->route('hrbp.list')->with('success','Successfully Approved!');
    }

    public function reject($id,Request $request)
    {
        Ticket::findOrFail($id)->update([
            'approval_hrbp' => '2',
            'reason_reject_hrbp' => ucfirst($request->reason_for_rejection),
        ]);

        return back();
    }

    public function detail($id)
    {
        $detail = Ticket::findOrFail($id);
        $scope_area = json_decode($detail->ticket_jd_details->scope_area);
        $scope_activities = json_decode($detail->ticket_jd_details->scope_activities);
        $soft = json_decode($detail->ticket_jd_details->soft_competency);
        $hard = json_decode($detail->ticket_jd_details->hard_competency);

        return view('HR_BussinessPartner.detail',compact('detail','scope_area','scope_activities','soft','hard'));
    }
}
