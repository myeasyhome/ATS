<?php

namespace App\Http\Controllers\Line_Manager1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CV;
use App\Models\Hiring_brief;

class CandidateController extends Controller
{
    public function __construct() 
    {
    	$this->middleware('auth');
    }

    /* index di candidate */
    public function index()
    {
    	$candidate = Hiring_brief::where('approval_hiring_by_hrbp','1')->get();
    	return view('Line_Manager1.Candidate.index',compact('candidate'));
    }

    /* daftar data candidate */
    public function sourcing($id)
    {
        $candidate = CV::where('hiring_brief_id',$id)->get();
        return view('Line_Manager1.Candidate.candidate',compact('candidate'));
    }

    public function getCV($id)
    {
        $document = CV::findOrFail($id);

        /* lokasi file */
        $file_path = public_path('CV_Candidate').'/'.$document->CV_candidate;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response()->download($file_path , $document->CV_canddate, $headers);
    }
}
