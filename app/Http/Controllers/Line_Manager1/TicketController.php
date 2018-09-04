<?php

namespace App\Http\Controllers\Line_Manager1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Ticket_jd;
use App\Models\Ticket_erf;
use App\Models\Group;
use App\Models\Division;
use App\Models\Department;

use App\Mail\Request_approval;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function __construct() 
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $ticket = Ticket::where('user_id',Auth::user()->id)
                        ->get();
    	return view('Line_Manager1.ticket',compact('ticket'));
    }

    public function create()
    {
        $group = Group::all();
    	return view('Line_Manager1.create',compact('group'));
    }

    public function division_dropdown($id)
    {
        $division = Division::where('groups_id',$id)->get();

        return json_encode($division);
    }

    public function department_dropdown($id)
    {
        $department = Department::where('divisions_id',$id)->get();

        return json_encode($department);
    }

    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'user_id' => Auth::user()->id,
            'position_name' => ucwords($request->position_name),
            'location' => ucwords($request->location),
            'position_grade' => $request->grade,
            'reason' => ucfirst($request->reason)
        ]);

        /*take ticket id*/
        $ticket_id = Ticket::select('id')->where([
            ['user_id',Auth::user()->id],
            ['position_name',ucwords($request->position_name)]
        ])->first();

        /* form ERF */
        $ticket_erf = Ticket_erf::create([
            'ticket_id' => $ticket_id->id,
            'reporting_to' => ucwords($request->reporting_to),
            'directorate' => ucwords($request->directorate),
            'group' => $request->group,
            'division' => $request->division,
            'department' => $request->department,
            'headcount_type' => $request->headcount_type,
            'employee_status' => $request->employee_status,
            'contract_from' => $request->from !== null ? Carbon::parse($request->from)->toDateString() : NULL,
            'contract_to' => $request->to !== null ? Carbon::parse($request->to)->toDateString() : NULL,
            'type_hiring' => $request->type_hiring,
            'advertisement' => $request->advertisement,
            'bussiness_impact' => $request->bussiness_impact,
            'request_background' => $request->request_background
        ]);
        
        /* form JD */
        $ticket_jd = Ticket_jd::create([
            'ticket_id' => $ticket_id->id,
            'supervisor' => ucwords($request->supervisor_title),
            'incumbent_name' => ucwords($request->incumbent),
            'supervisor_name' => ucwords($request->supervisor_name),
            'direct_sub' => ucwords($request->direct_sub),
            'indirect_sub' => ucwords($request->indirect_sub),
            'role_purpose' => ucfirst($request->role_purpose),
            'internal_within' => $request->within,
            'internal_outside' => $request->outside,
            'external' => $request->external,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'skill' => $request->skill,
            'scope_area' => json_encode($request->scope_area),
            'scope_activities' => json_encode($request->scope_activities),
            'soft_competency' => json_encode($request->soft),
            'hard_index' => json_encode($request->hard),
            'hard_value' => json_encode($request->value)
        ]);

        /* send email for notif */
        Mail::to(Auth::user()->email)->send(new Request_approval($ticket));

        return redirect()->route('ticket')->with('success','Successfully Create Ticket For '.ucwords($request->position_name));
    }

    public function edit($id)
    {
        $group = Group::all();
        $edit = Ticket::findOrFail($id);
        $scope_area = json_decode($edit->ticket_jd_details->scope_area);
        $scope_activities = json_decode($edit->ticket_jd_details->scope_activities);
        $soft = json_decode($edit->ticket_jd_details->soft_competency);
        $hard = json_decode($edit->ticket_jd_details->hard_index);
        $hard_value = json_decode($edit->ticket_jd_details->hard_value);

        return view('Line_Manager1.create',compact('group','edit','soft','hard','hard_value','scope_area','scope_activities','id'));
    }

    public function update($id,Request $request)
    {
        Ticket::findOrFail($id)->update([
            'location' => ucwords($request->location),
            'position_grade' => $request->grade,
            'reason' => ucfirst($request->reason)
        ]);

        Ticket_erf::where('ticket_id',$id)->update([
            'reporting_to' => ucwords($request->reporting_to),
            'directorate' => ucwords($request->directorate),
            'group' => $request->group,
            'division' => $request->division,
            'department' => $request->department,
            'headcount_type' => $request->headcount_type,
            'employee_status' => $request->employee_status,
            'contract_from' => $request->from !== null ? Carbon::parse($request->from)->toDateString() : NULL,
            'contract_to' => $request->to !== null ? Carbon::parse($request->to)->toDateString() : NULL,
            'type_hiring' => $request->type_hiring,
            'advertisement' => $request->advertisement,
            'bussiness_impact' => $request->bussiness_impact,
            'request_background' => $request->request_background
        ]);

        Ticket_jd::where('ticket_id',$id)->update([
            'supervisor' => ucwords($request->supervisor_title),
            'incumbent_name' => ucwords($request->incumbent),
            'supervisor_name' => ucwords($request->supervisor_name),
            'direct_sub' => ucwords($request->direct_sub),
            'indirect_sub' => ucwords($request->indirect_sub),
            'role_purpose' => ucfirst($request->role_purpose),
            'internal_within' => $request->within,
            'internal_outside' => $request->outside,
            'external' => $request->external,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'skill' => $request->skill,
            'scope_area' => json_encode($request->scope_area),
            'scope_activities' => json_encode($request->scope_activities),
            'soft_competency' => json_encode($request->soft),
            'hard_index' => json_encode($request->hard),
            'hard_value' => json_encode($request->value)
        ]);

        return redirect()->route('ticket')->with('success','Successfully Updated Ticket');
    }

    public function rejected_reason($id)
    {
        $reject = Ticket::findOrFail($id);
        return response()->json($reject);
    }

    public function re_approval($id, Request $request)
    {
        Ticket::findOrFail($id)->update([
            'location' => ucwords($request->location),
            'position_grade' => $request->grade,
            'reason' => ucfirst($request->reason),
            'approval_lm2' => '0'
        ]);

        Ticket_erf::where('ticket_id',$id)->update([
            'reporting_to' => ucwords($request->reporting_to),
            'directorate' => ucwords($request->directorate),
            'group' => $request->group,
            'division' => $request->division,
            'department' => $request->department,
            'headcount_type' => $request->headcount_type,
            'employee_status' => $request->employee_status,
            'contract_from' => $request->from !== null ? Carbon::parse($request->from)->toDateString() : NULL,
            'contract_to' => $request->to !== null ? Carbon::parse($request->to)->toDateString() : NULL,
            'type_hiring' => $request->type_hiring,
            'advertisement' => $request->advertisement,
            'bussiness_impact' => $request->bussiness_impact,
            'request_background' => $request->request_background
        ]);

        Ticket_jd::where('ticket_id',$id)->update([
            'supervisor' => ucwords($request->supervisor_title),
            'incumbent_name' => ucwords($request->incumbent),
            'supervisor_name' => ucwords($request->supervisor_name),
            'direct_sub' => ucwords($request->direct_sub),
            'indirect_sub' => ucwords($request->indirect_sub),
            'role_purpose' => ucfirst($request->role_purpose),
            'internal_within' => $request->within,
            'internal_outside' => $request->outside,
            'external' => $request->external,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'skill' => $request->skill,
            'scope_area' => json_encode($request->scope_area),
            'scope_activities' => json_encode($request->scope_activities),
            'soft_competency' => json_encode($request->soft),
            'hard_index' => json_encode($request->hard),
            'hard_value' => json_encode($request->value)
        ]);

        return redirect()->route('ticket')->with('success','Successfully Request Re-Approval Ticket');
    }

    public function delete($id)
    {
        Ticket::findOrFail($id)->delete();
        Ticket_erf::where('ticket_id',$id)->delete();
        Ticket_jd::where('ticket_id',$id)->delete();

        return back()->with('success','Successfully Deleted Ticket');
    }

}
