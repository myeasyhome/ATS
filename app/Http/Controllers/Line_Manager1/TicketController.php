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
use App\Models\Directorate;
use Validator;

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
        $directorate = Directorate::all();
    	return view('Line_Manager1.create',compact('directorate'));
    }

    public function checkPosition(Request $request)
    {
        $position = $request->position_name;
        $exist = Ticket::where('position_name',$position)->first();
        if ($exist) {
            return response()->json(array("msg" => true));
        } else {
             return response()->json(array("msg" => false));
        }
    }

    public function group_dropdown($id) 
    {
        $group = Group::where('directorates_id',$id)->get();
        return json_encode($group);
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
        /* validasi if position exist */
        $validator = Validator::make($request->all(), [
            'position_name' => 'unique:tickets',
        ]);

        if ($validator->fails()) {
            return back()->with('error','Position Name Already Exist!');
        }

        $ticket = Ticket::create([
            'user_id' => Auth::user()->id,
            'position_name' => ucwords($request->position_name),
            'location' => ucwords($request->location),
            'position_grade' => $request->grade,
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
            'directorate' => $request->directorate,
            'group' => $request->group,
            'division' => $request->division,
            'department' => $request->department,
            'headcount_type' => $request->headcount_type,
            'employee_status' => $request->employee_status,
            // 'contract_from' => $request->from !== null ? Carbon::createFromFormat('d/m/Y',$request->from)->toDateString() : NULL,
            // 'contract_to' => $request->to !== null ? Carbon::createFromFormat('d/m/Y',$request->to)->toDateString() : NULL,
            'contract_duration' => $request->contract_duration,
            'type_hiring' => json_encode($request->type_hiring),
            'confidentiality' => $request->confidentiality,
            // 'bussiness_impact' => $request->bussiness_impact,
            'request_background' => $request->request_background,
            'reason' => ucfirst($request->reason)
        ]);
        
        /* form JD */
        $ticket_jd = Ticket_jd::create([
            'ticket_id' => $ticket_id->id,
            'supervisor' => ucwords($request->supervisor_title),
            'incumbent_name' => ucwords($request->incumbent),
            'supervisor_name' => ucwords($request->supervisor_name),
            'role_purpose' => ucfirst($request->role_purpose),
            'direct_sub' => ucwords($request->direct_sub),
            'indirect_sub' => ucwords($request->indirect_sub),
            'job_level' => $request->job_level,
            'min_education' => $request->min_education,
            'qualification' => $request->qualification,
            // 'scope_area' => json_encode($request->scope_area),
            // 'scope_activities' => json_encode($request->scope_activities),
            'responsibility' => $request->responsibility,
            'soft_competency' => json_encode($request->soft),
            'hard_index' => json_encode($request->hard),
            'hard_value' => json_encode($request->value)
        ]);

        /* send email for notif */
        Mail::to(Auth::user()->email)->send(new Request_approval($ticket));

        return redirect()->route('ticket')->with('success','Successfully Create Ticket For '.ucwords($request->position_name));
    }

    /* Show Edit data */
    public function edit($id)
    {
        $directorate = Directorate::all();
        $group = Group::all();
        $division = Division::all();
        $department = Department::all();
        $data = Ticket::findOrFail($id);
        $soft = json_decode($data->ticket_jd_details->soft_competency);
        $hard = json_decode($data->ticket_jd_details->hard_index);
        $hard_value = json_decode($data->ticket_jd_details->hard_value);

        return view('Line_Manager1.create',compact('group','division','department','directorate','data','soft','hard','hard_value','id'));
    }

    public function update($id,Request $request)
    {
        Ticket::findOrFail($id)->update([
            'location' => ucwords($request->location),
            'position_grade' => $request->grade,
        ]);

        Ticket_erf::where('ticket_id',$id)->update([
            'reporting_to' => ucwords($request->reporting_to),
            'directorate' => $request->directorate,
            'group' => $request->group,
            'division' => $request->division,
            'department' => $request->department,
            'headcount_type' => $request->headcount_type,
            'employee_status' => $request->employee_status,
            // 'contract_from' => $request->from !== null ? Carbon::createFromFormat('d/m/Y',$request->from)->toDateString() : NULL,
            // 'contract_to' => $request->to !== null ? Carbon::createFromFormat('d/m/Y',$request->to)->toDateString() : NULL,
            'contract_duration' => $request->contract_duration,
            'type_hiring' => json_encode($request->type_hiring),
            'confidentiality' => $request->confidentiality,
            // 'bussiness_impact' => $request->bussiness_impact,
            'request_background' => $request->request_background,
            'reason' => ucfirst($request->reason)
        ]);

        Ticket_jd::where('ticket_id',$id)->update([
            'supervisor' => ucwords($request->supervisor_title),
            'incumbent_name' => ucwords($request->incumbent),
            'supervisor_name' => ucwords($request->supervisor_name),
            'role_purpose' => ucfirst($request->role_purpose),
            'direct_sub' => ucwords($request->direct_sub),
            'indirect_sub' => ucwords($request->indirect_sub),
            'job_level' => $request->job_level,
            'min_education' => $request->min_education,
            'qualification' => $request->qualification,
            // 'scope_area' => json_encode($request->scope_area),
            // 'scope_activities' => json_encode($request->scope_activities),
            'responsibility' => $request->responsibility,
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
            'approval_lm2' => '0',
        ]);

        Ticket_erf::where('ticket_id',$id)->update([
            'reporting_to' => ucwords($request->reporting_to),
            'directorate' => $request->directorate,
            'group' => $request->group,
            'division' => $request->division,
            'department' => $request->department,
            'headcount_type' => $request->headcount_type,
            'employee_status' => $request->employee_status,
            // 'contract_from' => $request->from !== null ? Carbon::createFromFormat('d/m/Y',$request->from)->toDateString() : NULL,
            // 'contract_to' => $request->to !== null ? Carbon::createFromFormat('d/m/Y',$request->to)->toDateString() : NULL,
            'contract_duration' => $request->contract_duration,
            'type_hiring' => json_encode($request->type_hiring),
            'confidentiality' => $request->confidentiality,
            // 'bussiness_impact' => $request->bussiness_impact,
            'request_background' => $request->request_background,
            'reason' => ucfirst($request->reason)
        ]);

        Ticket_jd::where('ticket_id',$id)->update([
            'supervisor' => ucwords($request->supervisor_title),
            'incumbent_name' => ucwords($request->incumbent),
            'supervisor_name' => ucwords($request->supervisor_name),
            'role_purpose' => ucfirst($request->role_purpose),
            'direct_sub' => ucwords($request->direct_sub),
            'indirect_sub' => ucwords($request->indirect_sub),
            'job_level' => $request->job_level,
            'min_education' => $request->min_education,
            'qualification' => $request->qualification,
            // 'scope_area' => json_encode($request->scope_area),
            // 'scope_activities' => json_encode($request->scope_activities),
            'responsibility' => $request->responsibility,
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
