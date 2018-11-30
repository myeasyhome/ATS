<?php

namespace App\Http\Controllers\HR_Talent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;
use App\Models\Hiring_brief;
use App\Models\CV;
use Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        // $hakAkses = ['BIMAS ABIMANYU','ARNOLD WARDIYANTO','ASHIELA ANGGIANA PUTRI']; 

        // if ( in_array(Auth::user()->name, $hakAkses) ) {
        //     $data = Ticket::orderBy('created_at','dsc')->get();
        // } else {
        //     $data = [];
        // }

        if ( Auth::user()->grade > 6 && Auth::user()->group == 'Group HR Development' && Auth::user()->division == 'Div. HR Acquisition & Career Development' ||  Auth::user()->division == 'Group HR Development' || Auth::user()->name == 'ASHIELA ANGGIANA PUTRI' ) {
            $data = Ticket::orderBy('created_at','dsc')->get();
            $modal = Ticket::orderBy('created_at','dsc')->get();
        } else {
            $data = [];
            $modal = [];
        }

    	return view('HR_Talent.dashboard',compact('data','modal'));
    }

    /* Freeze Ticket */
    public function freeze($id,Request $req) {
        $validator = Validator::make($req->all(), [
            'reason_freeze' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error','Reason Freeze Required!');  
        }

    	Ticket::findOrFail($id)->update([
    		'freeze' => '99',
    		'reason_freeze' => $req->reason_freeze
    	]);

    	return back();
    }

    /* Unfreeze Ticket */
    public function unfreeze($id) {
    	Ticket::findOrFail($id)->update([
    		'freeze' => '0',
    		'reason_freeze' => Null
    	]);

    	return back();
    }

    /* detail ticket */
    public function detailTicket($id) {
    	$detail = Ticket::findOrFail($id);
		$soft = json_decode($detail->ticket_jd_details->soft_competency);
        $hard = json_decode($detail->ticket_jd_details->hard_index);
        $hard_value = json_decode($detail->ticket_jd_details->hard_value);
        
		return view('HR_Talent.detail',compact('detail','soft','hard','hard_value'));
    }

    /* KOLOM RECRUITER */
    public function updateRecruiter(Request $request,$id) 
    {
        $recruiter = Ticket::findOrFail($id)->update([
            'recruiter' => json_encode($request->recruiter),
        ]);
        
        return back();
    }
}
