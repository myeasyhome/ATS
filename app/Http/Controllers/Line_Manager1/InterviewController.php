<?php

namespace App\Http\Controllers\Line_Manager1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\CV;
use App\Models\Interview;
use App\User;
use Carbon\Carbon;

class InterviewController extends Controller
{
    public function __construct() 
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	/* munculkan CV yg hasil hiring briefnya sudah di approvel oleh HRBP */
    	$cv = CV::where('approval_candidate','1')
                ->whereHas('hiring_briefs', function($query) {
    				$query->where('approval_hiring_by_hrbp','1');
    			})
                ->groupBy('hiring_brief_id')
                ->get();
     
    	return view('Line_Manager1.Interview.index',compact('cv'));
    }

    public function feedback_list($id)
    {
    	/* munculkan data interview yang table cvnya di approve dan hiring brief di approve HRBP */
        $interview = Interview::whereHas('cv', function($cv) use ($id) {
				      		$cv->where('approval_candidate',['1']);
					      		$cv->whereHas('hiring_briefs', function($hiring) use ($id) {
					      			$hiring->where([
                                            ['approval_hiring_by_hrbp','1'],
                                            ['hiring_brief_id',$id]
                                        ]);
					      		});
				      	})
      					->get();
                        
    	return view('Line_Manager1.Interview.feedback_list',compact('interview'));
    }

    public function interview_finish($id)
    {
        Interview::findOrFail($id)->update([
            'interview_finish' => Carbon::now()
        ]);

        return back()->with('success','Interview Process Finish, Please fill your feedback !!');
    }
}
