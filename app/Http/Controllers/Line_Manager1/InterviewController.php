<?php

namespace App\Http\Controllers\Line_Manager1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\CV;
use App\Models\Interview;
use App\User;
use Carbon\Carbon;
use Validator;
use App\Models\Interview_feedback;

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
                    $query->whereHas('tickets', function($ticket) {
                        $ticket->where('created_by',Auth::user()->id);
                    });
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
                        
    	return view('Line_Manager1.Interview.feedback_list',compact('interview','id'));
    }

    /* btn done interview */
    public function interview_finish($id)
    {
        Interview::findOrFail($id)->update([
            'interview_finish' => Carbon::now()
        ]);

        return back()->with('success','Interview Process Finish, Please fill your feedback !!');
    }

    /* form feedback */
    public function form_interviewFeedback($id)
    {
        return view('Line_Manager1.Interview.form_feedback',compact('id'));
    }

    public function save_feedback(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'technical_point' => 'required',
            'point1' => 'required',
            'point2' => 'required',
            'point3' => 'required',
            'point4' => 'required',
            'point5' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error','Please Select Every Point Competencies/Skill !!');
        }

        // dd($req->all(),array_sum($req->technical_point), json_encode(array_filter($req->technical_point)));

        Interview_feedback::create([
            'interview_id' => $req->interview_id,
            'feedback_by' => Auth::user()->id,
            'comment_feedback' => json_encode($req->comment), 
            'point_feedback' => json_encode([$req->point1,$req->point2,$req->point3,$req->point4,$req->point5]),
            'total_point' => array_sum([$req->point1,$req->point2,$req->point3,$req->point4,$req->point5,$req->technical_point]),
            'technical_competencies' => json_encode(array_filter($req->technical)),
            'point_technical' => json_encode(array_filter($req->technical_point)),
            'notes' => $req->notes
        ]);

        return redirect()
            ->route('lm1_feedback_list.interview',['id'=>Interview::findOrFail($req->interview_id)->CV->hiring_briefs->id, 'position' => str_slug(Interview::findOrFail($req->interview_id)->CV->hiring_briefs->tickets->position_name)])
            ->with('success','Successfully Give Feedback For '.Interview::findOrFail($req->interview_id)->CV->name_candidate);
    }
}
