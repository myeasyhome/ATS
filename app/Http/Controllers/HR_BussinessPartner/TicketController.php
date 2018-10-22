<?php

namespace App\Http\Controllers\HR_BussinessPartner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;
use App\Models\Hiring_brief;
use App\User;
use Validator;

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
        /* cek HRBP ajuin tiket atau tidak */
        $cek = Ticket::where('created_by',Auth::user()->id)->first();
        if ( $cek == null ) {
            $ticket = Ticket::where('user_hrbp',Auth::user()->id)->orderBy('created_at','desc')->get();
        } else {
            /* jika HRBP yg sedang login mengajukan ticket, tdk akan ada daftar list approval */
            if (Ticket::where('created_by',Auth::user()->id)->first()->created_by == Auth::user()->id) {
                $ticket = [];
            } else {
                $ticket = Ticket::orderBy('created_at','desc')->get();
            }
        }

        /* untuk notice hiring brief */
        $hiring = Hiring_brief::all();
    	return view('HR_BussinessPartner.list',compact('ticket','hiring'));
    }

    /* untuk approve ticket */
    public function approved($id,Request $request)
    {
        $ticket = Ticket::findOrFail($id);
        
        Ticket::findOrFail($id)->update([
            'approval_hrbp' => '1',
            'user_GH' => $request->user_GH,
            'user_chief' => $request->user_chief,
        ]);

        /* send email for notif */
        // Mail::to(Auth::user()->email)->send(new Request_approvalHRBP($ticket));

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

        $group_head = User::where([
                    // ['group',$detail->user->group],
                    ['id','!=',$detail->created_by],
                    ['grade',8]
                ])->orderBy('name','asc')->get();

        /* final approval ketika GH HR blm ada otomatis naik ke atas */
        $gh_HR = User::where([
                    ['group','Group HR Business Partner'],
                    ['grade',8]
                ])->orWhere([
                        ['id','!=',$detail->created_by],
                        ['grade',9]
                    ])->orderBy('name','asc')->get();

        $chief = User::where([
                    ['id','!=',$detail->created_by],
                    ['grade',9]
                ])->orderBy('name','asc')->get();

        $chro = User::where([
                    ['chief','Office of Dir. & Chief Human Resources'],
                    ['id','!=',$detail->created_by],
                    ['grade',9]
                ])->orderBy('name','asc')->get();

        return view('HR_BussinessPartner.detail',compact('detail','soft','hard','hard_value','group_head','gh_HR','chief','chro'));
    }
}
