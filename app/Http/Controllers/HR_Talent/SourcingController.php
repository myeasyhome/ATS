<?php

namespace App\Http\Controllers\HR_Talent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Ticket;
use App\Models\Hiring_brief;
use App\Models\CV;
use Validator;
use File;
use Carbon\Carbon;

class SourcingController extends Controller
{
    public function __construct() 
	{
		$this->middleware('auth');
	}

	/* daftar posisi yang sudah di approve melalui briefing */
	public function index()
	{
		$data = Hiring_brief::where('approval_hiring_by_hrbp','1')->get();

		/* untuk kandidat yg sudah di pilih oleh LM1 */
		$candidate = CV::get();

		return view('HR_Talent.Sourcing.index',compact('data','candidate'));
	}

	/* upload beberapa candidate */
	public function upload($id)
	{
		$candidate = CV::where('hiring_brief_id',$id)->get();
		return view('HR_Talent.Sourcing.upload',compact('candidate','id'));
	}

	/* tampilkan kandidate yg di approve,reject */
	public function showCandidate($id)
	{
		$candidate = CV::where('hiring_brief_id',$id)->get();
		return view('HR_Talent.Sourcing.show',compact('candidate'));
	}

	/* save to database */
	public function doUpload(Request $request)
	{
		$validator = Validator::make($request->all(), [
	        'cv' => 'required|file|mimes:pdf,docx,doc|max:2048',
	    ]);

			/*jika type file sesuai*/
		    if ($validator->passes()) {
		        $input = $request->all();
		        $input['hiring_brief_id'] = $request->hiring_brief_id;
		        $input['name_candidate'] = ucwords($request->name_candidate);
		        $input['gender'] = $request->gender;
		        $input['place_birth'] = ucwords($request->place);
		        $input['date_birth'] = Carbon::parse($request->birth_date)->toDateString();
		        $input['education'] = $request->education;
		        $input['CV_candidate'] = $request->cv->getClientOriginalName();
		        $input['current_position'] = $request->current_position;
		        $input['current_company'] = $request->current_company;
		        $input['current_industry'] = $request->current_industry;
		        $input['work_exp'] = $request->work_exp;
		        $input['source'] = $request->source;
		        $input['skill'] = $request->skill;
		        $input['salary_range'] = $request->salary_range;
		        $input['tags'] = $request->tags;
		        $input['other'] = $request->other;
		        $request->cv->move(public_path('CV_Candidate'), $input['CV_candidate']);

		        CV::create($input);
		        return back()->with('success','Successfully Upload Candidate !');
		    }
		 return back()->with('error','Format file must pdf,docx,doc and max file size 2MB !');
	}

	/* get document CV */
	public function getDocument($id)
	{
		$document = CV::findOrFail($id);

		/* lokasi file */
		$file_path = public_path('CV_Candidate').'/'.$document->CV_candidate;

		$headers = array(
        	'Content-Type: application/pdf',
        );

		return Response()->download($file_path , $document->CV_canddate, $headers);
	}

	/* delete candidate */
	public function delete($id)
	{
		$filename = CV::findOrFail($id);

		/* lokasi file */
		$file_path = public_path('CV_Candidate').'/'.$filename->CV_candidate;
		File::delete($file_path);

		$filename->delete();

		return back();
	}

	/* fungsi utk button next proses setelah Line Manager1 sudah memilih kandidat */
	public function nextProcess($id)
	{
		CV::findOrFail($id)->update([
			'date_nextProcess_hrta' => Carbon::now()
		]);

		return back();
	}
}
