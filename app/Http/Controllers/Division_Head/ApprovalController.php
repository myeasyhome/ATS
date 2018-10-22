<?php

namespace App\Http\Controllers\Division_Head;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;
use App\Models\Ticket_erf;
use App\Models\Ticket_jd;
use Validator;

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
        $ticket = Ticket::where([
                            ['approval_hrbp','1'],
                            ['user_DH',Auth::user()->id]
                        ])->get();
        
    	return view('Division_Head.list',compact('ticket'));
    }

    /* Deatil content requirement */
    public function content_req($id)
    {
        $content = Ticket::findOrFail($id);
        return response()->json();
    }

    public function approval()
    {
        $ticket = Ticket::where('approval_DH','0')->get();
    	return view('Division_Head.approval',compact('ticket'));
    }

    /* approve tiket */
    public function approved($id)
    {
        $ticket = Ticket::findOrFail($id);

        Ticket::findOrFail($id)->update([
            'approval_DH' => '1'
        ]);
        
        /* Send to Email */
        // Mail::to(Auth::user()->email)->send(new Request_approval($ticket));

        return redirect()->route('lm2.list')->with('success','Successfully Approved!');
    }

    /* rreject tiket */
    public function reject($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reason_reject_DH' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with("error","Rejected reason can't Null!");
        }

        Ticket::findOrFail($id)->update([
            'approval_DH' => '2',
            'reason_reject_DH' => ucfirst($request->reason_for_rejection),
        ]);

        return redirect()->route('lm2.list')->with('error','You Have Been Rejected This Ticket !');
    }

    /* detail tiket */
    public function detail($id)
    {
        $detail = Ticket::findOrFail($id);
        $soft = json_decode($detail->ticket_jd_details->soft_competency);
        $hard = json_decode($detail->ticket_jd_details->hard_index);
        $hard_value = json_decode($detail->ticket_jd_details->hard_value);

        return view('Division_Head.detail',compact('detail','soft','hard','hard_value'));
    }

}
