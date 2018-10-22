<?php

namespace App\Http\Controllers\HR_Talent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;
use App\Models\Hiring_brief;

class DashboardController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $hakAkses = ['BIMAS ABIMANYU','ARNOLD WARDIYANTO','ASHIELA ANGGIANA PUTRI'];

        if ( in_array(Auth::user()->name, $hakAkses) ) {
            $data = Ticket::orderBy('created_at','dsc')->get();
        } else {
            $data = [];
        }
        
    	return view('HR_Talent.dashboard',compact('data'));
    }

    /* Freeze Ticket */
    public function freeze($id,Request $req) {
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
}
