<?php

namespace App\Http\Controllers\Line_Manager1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CV;
use App\Models\Hiring_brief;
use Carbon\Carbon;

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
        return view('Line_Manager1.Candidate.candidate',compact('candidate','posisi'));
    }

    /* buat liat CV */
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

    /* kandidat yang sesuai di approve */
    public function approve_candidate($id)
    {
        $name = CV::findOrFail($id);

        $name->update([
            'approval_candidate' => '1'
        ]);

        /* Jika kandidata sudah di pilih == 3 */
        $candidate = CV::where('hiring_brief_id',$name->hiring_brief_id)->get();

        if ( $candidate->where('approval_candidate',1)->count() == 3 ) {

            $name->update([
                'approval_date_candidate' => Carbon::now()->toDateString()
            ]);
            return redirect()->route('candidate');
        } else {
            return back()->with('success','Successfully Approve '.$name->name_candidate.' For This Position!');
        }

    }

    /* reject kandidat */
    public function reject_candidate($id, Request $request)
    {
        $reject = CV::findOrFail($id);

        $reject->update([
            'approval_candidate' => '2',
            'reason_reject' => $request->reason
        ]);

        return back()->with('success','Successfully Reject '.$reject->name_candidate.' For This Position!');
    }

}
