<?php

namespace App\Http\Controllers\HR_BussinessPartner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;
use App\Models\Hiring_brief;
use Carbon\Carbon;

use App\Mail\Request_approvalHRBP;
use Illuminate\Support\Facades\Mail;

class ApprovalResultBriefController extends Controller
{
    public function __construct() 
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        /* data hiring brief berdasar HRBP yg ada di table tickets */
    	// $hiring = Hiring_brief::whereHas('tickets', function($query) {
     //                                $query->where('user_hrbp',Auth::user()->id);
     //                            })->get();
        $hiring = Hiring_brief::where('interviewer_hrbp',Auth::user()->name)->get();

        return view('HR_BussinessPartner.approval_result_brief',compact('hiring'));
    }

    /* Detail result */
    public function detail($id)
    {
        $hiring = Hiring_brief::findOrFail($id);

        /* buat notif alert di detail */
        $notif = Hiring_brief::all();

        return view('HR_BussinessPartner.detail_result_brief',compact('hiring','notif'));
    }

    /* approve result hiring */
    public function approved_result_hiring($id,Request $Request)
    {
        Hiring_brief::findOrFail($id)->update([
            'approval_hiring_by_hrbp' => '1',

            /* Tanggal ini untuk perhitungan SLA setelah di approve ( selisih waktu tampil di hiring brief HR Talent ) */
            'approval_date_hrbp' => Carbon::now()->toDateString()
        ]);

        return redirect()->route('hrbp.approval.hiring')->with('success','Successfully Approved Result of Hiring Brief');
    }

    /* reject result hiring */
    public function reject_result_hiring($id,Request $request)
    {
        Hiring_brief::findOrFail($id)->update([
            'approval_hiring_by_hrbp' => '2',
            'reason_reject' => $request->reason_for_rejection
        ]);

        return redirect()->route('hrbp.approval.hiring')->with('error','You Have Been Rejected This Ticket !');
    }
}
