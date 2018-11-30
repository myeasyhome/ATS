<?php

namespace App\Http\Controllers\Group_Head;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Auth;
use Validator;

class ApprovalController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /* daftar list */
    public function index()
    {
        $ticket = Ticket::where([
                            ['approval_hrbp','1'],
                            ['user_GH',Auth::user()->id]
                        ])->get();

    	return view('Group_Head.index',compact('ticket'));
    }

    /* detail tiket */
    public function detail($id)
    {
        $detail = Ticket::findOrFail($id);
        $soft = json_decode($detail->ticket_jd_details->soft_competency);
        $hard = json_decode($detail->ticket_jd_details->hard_index);
        $hard_value = json_decode($detail->ticket_jd_details->hard_value);

        return view('Group_Head.detail',compact('detail','soft','hard','hard_value'));
    }

    /*approve ticket*/
    public function approved($id)
    {
        $ticket = Ticket::findOrFail($id);

        Ticket::findOrFail($id)->update([
            'approval_GH' => '1'
        ]);

        return redirect()->route('gh.list')->with('success','Successfully Approved!');
    }

    /* reject ticket*/
    public function reject($id,Request $request)
    {
        Ticket::findOrFail($id)->update([
            'approval_GH' => '2',
            'reason_reject_GH' => ucfirst($request->reason_for_rejection),
        ]);

        return redirect()->route('gh.list')->with('error','You Have Been Rejected This Ticket !');
    }
}
