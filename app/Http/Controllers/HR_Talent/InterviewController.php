<?php

namespace App\Http\Controllers\HR_Talent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\CV;

class InterviewController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index() 
    {
    	/* munculkan CV yg hasil hiring briefnya sudah di approvel oleh HRBP */
    	$cv = CV::whereIn('approval_candidate',['1'])
    			->whereHas('hiring_briefs', function($query) {
    				$query->where('approval_hiring_by_hrbp','1');
    			})
    			->groupBy('hiring_brief_id')
    			->get();

    	return view('HR_Talent.Interview.index',compact('cv'));
    }
}
