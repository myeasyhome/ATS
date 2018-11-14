<?php

namespace App\Http\Controllers\Line_Manager1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Auth;

class DashboardController extends Controller
{
    public function __construct() 
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	if ( Auth::user()->grade > 6 ) {
    		$data = Ticket::where('created_by',Auth::user()->id)
    					->orderBy('created_at','dsc')
    					->get();
    	} else {
    		$data = [];
    	}

    	return view('Line_Manager1.dashboard',compact('data'));
    }
}
