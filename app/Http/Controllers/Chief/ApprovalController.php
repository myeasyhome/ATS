<?php

namespace App\Http\Controllers\Chief;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Hiring_brief;
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
        /* GH dan CHRO akan login halaman ini, mk di buat if */
        if ( Auth::user()->grade == 8 ) {
            $ticket = Ticket::where([
                            ['approval_hrbp','1'],
                            ['user_chief',Auth::user()->id]
                        ])->get();
        } elseif ( Auth::user()->grade == 9 ) {
            /* cek jika chief CHRO atau bukan, disini CXO itu sm kaya Chief, tampilan front aja CXO */
            if ( Auth::user()->group == 'Office of Dir. & Chief Human Resources' ) {
                $ticket = Ticket::where([
                            ['approval_hrbp','1'],
                            ['approval_chief','1'],
                            ['user_chro',Auth::user()->id]
                        ])->get();
            } else {
                $ticket = Ticket::where([
                            ['approval_hrbp','1'],
                            ['user_chief',Auth::user()->id]
                        ])->get();
            }
        }

    	return view('Chief.index',compact('ticket'));
    }

    /* detail tiket */
    public function detail($id)
    {
        $detail = Ticket::findOrFail($id);
        $soft = json_decode($detail->ticket_jd_details->soft_competency);
        $hard = json_decode($detail->ticket_jd_details->hard_index);
        $hard_value = json_decode($detail->ticket_jd_details->hard_value);

        return view('Chief.detail',compact('detail','soft','hard','hard_value'));
    }

    /*approve ticket*/
    public function approved($id)
    {
        $ticket = Ticket::findOrFail($id);

        Ticket::findOrFail($id)->update([
            'approval_chief' => '1'
        ]);

        /* dibuat untuk saling berhubungan dengan HR talent di table hiring brief */
        Hiring_brief::create([
            'ticket_id' => $id
        ]);

        return redirect()->route('chief.list')->with('success','Successfully Approved!');
    }

    /* reject ticket*/
    public function reject($id,Request $request)
    {
        Ticket::findOrFail($id)->update([
            'approval_chief' => '2',
            'reason_reject_chief' => ucfirst($request->reason_for_rejection),
        ]);

        return redirect()->route('chief.list')->with('error','You Have Been Rejected This Ticket !');
    }
}
