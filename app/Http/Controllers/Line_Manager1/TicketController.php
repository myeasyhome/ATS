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

use App\User;
use Excel;

class TicketController extends Controller
{
    public function __construct() 
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $ticket = Ticket::where('created_by',Auth::user()->id)
                        ->get();
    	return view('Line_Manager1.ticket',compact('ticket'));
    }

    /* halaman create ticket */
    public function create()
    {
        $directorate = Directorate::all();
        /* untuk LOA */
        $hrbp = Auth::user()->where([
                    ['group','Group HR Business Partner'],
                    ['id','!=',Auth::user()->id],
                    ['grade','>',5]
                ])->orderBy('name','asc')->get();

        $division_head = Auth::user()->where([
                    ['id','!=',Auth::user()->id],
                    ['grade',7]
                ])->get();

        $group_head = Auth::user()->where([
                    ['group',Auth::user()->group],
                    ['id','!=',Auth::user()->id],
                    ['grade',8]
                ])->orderBy('name','asc')->get();

        /* final approval ketika GH HR blm ada otomatis naik ke atas */
        $gh_HR = Auth::user()->where([
                    ['group','Group HR Business Partner'],
                    ['grade',8]
                ])->orWhere([
                        ['id','!=',Auth::user()->id],
                        ['grade',9]
                    ])->orderBy('name','asc')->get();

        $chief = Auth::user()->where([
                    ['chief','!=','Office of Dir. & Chief Human Resources'],
                    ['id','!=',Auth::user()->id],
                    ['grade',9]
                ])->orderBy('name','asc')->get();

        $chro = Auth::user()->where([
                    ['chief','Office of Dir. & Chief Human Resources'],
                    ['id','!=',Auth::user()->id],
                    ['grade',9]
                ])->orderBy('name','asc')->get();

    	return view('Line_Manager1.create',compact('directorate','hrbp','division_head','group_head','gh_HR','chief','chro'));
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
        // $email_hrbp = User::where('id',$request->hrbp)->first()->email;
        // $email_GH = User::where('id',$request->user_groupHead)->first()->email;
        // $email_chief = User::where('id',$request->user_chief)->first()->email;
        // $array = [$email_GH];
        // dd($array);

        /* validasi if position exist */
        $validator = Validator::make($request->all(), [
            'position_name' => 'unique:tickets',
        ]);

        if ($validator->fails()) {
            return back()->with('error','Position Name Already Exist!');
        }

        $ticket = Ticket::create([
            'created_by' => Auth::user()->id,
            'position_name' => ucwords($request->position_name),
            'location' => ucwords($request->location),
            'position_grade' => $request->grade,
            'user_hrbp' => $request->user_hrbp,
            'user_GH' => $request->user_GH,
            'user_GH_HR' => $request->user_GH_HR,
            'user_chief' => $request->user_chief,
            'user_chro' => $request->user_chro
        ]);

        /*take ticket id*/
        $ticket_id = Ticket::select('id')->where([
            ['created_by',Auth::user()->id],
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
            'responsibility' => $request->responsibility,
            'soft_competency' => json_encode($request->soft),
            'hard_index' => json_encode(array_filter($request->hard,'strlen')),
            'hard_value' => json_encode(array_filter($request->value,'strlen'))
        ]);

        /* send email for notif */
        // Mail::to(Auth::user()->email)->send(new Request_approval($ticket));

        return redirect()->route('ticket')->with('success','Successfully Create Ticket For '.ucwords($request->position_name));
    }

    /* Show Edit data */
    public function edit($id)
    {
        $hrbp = Auth::user()->where([
                    ['group','Group HR Business Partner'],
                    ['id','!=',Auth::user()->id],
                    ['grade','>',5]
                ])->orderBy('name','asc')->get();

        $division_head = Auth::user()->where([
                    ['id','!=',Auth::user()->id],
                    ['grade',7]
                ])->get();

        $group_head = Auth::user()->where([
                    ['group',Auth::user()->group],
                    ['id','!=',Auth::user()->id],
                    ['grade',8]
                ])->orderBy('name','asc')->get();

        /* final approval ketika GH HR blm ada otomatis naik ke atas */
        $gh_HR = Auth::user()->where([
                    ['group','Group HR Business Partner'],
                    ['grade',8]
                ])->orWhere([
                        ['id','!=',Auth::user()->id],
                        ['grade',9]
                    ])->orderBy('name','asc')->get();

        $chief = Auth::user()->where([
                    ['chief','!=','Office of Dir. & Chief Human Resources'],
                    ['id','!=',Auth::user()->id],
                    ['grade',9]
                ])->orderBy('name','asc')->get();

        $chro = Auth::user()->where([
                    ['chief','Office of Dir. & Chief Human Resources'],
                    ['id','!=',Auth::user()->id],
                    ['grade',9]
                ])->orderBy('name','asc')->get();

        $directorate = Directorate::all();
        $group = Group::all();
        $division = Division::all();
        $department = Department::all();
        $data = Ticket::findOrFail($id);
        $soft = json_decode($data->ticket_jd_details->soft_competency);
        $hard = json_decode($data->ticket_jd_details->hard_index);
        $hard_value = json_decode($data->ticket_jd_details->hard_value);

        return view('Line_Manager1.create',compact('group','division','department','directorate','data','soft','hard','hard_value','id','hrbp','group_head','gh_HR','chief','chro'));
    }

    public function update($id,Request $request)
    {
        Ticket::findOrFail($id)->update([
            'location' => ucwords($request->location),
            'position_grade' => $request->grade,
            'user_hrbp' => $request->user_hrbp,
            'user_GH' => $request->user_GH,
            'user_GH_HR' => $request->user_GH_HR,
            'user_chief' => $request->user_chief,
            'user_chro' => $request->user_chro
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
            'responsibility' => $request->responsibility,
            'soft_competency' => json_encode($request->soft),
            'hard_index' => json_encode(array_filter($request->hard,'strlen')),
            'hard_value' => json_encode(array_filter($request->value,'strlen'))
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
            'user_hrbp' => $request->user_hrbp,
            'user_GH' => $request->user_GH,
            'user_GH_HR' => $request->user_GH_HR,
            'user_chief' => $request->user_chief,
            'user_chro' => $request->user_chro,
            'approval_hrbp' => '0',
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
            'responsibility' => $request->responsibility,
            'soft_competency' => json_encode($request->soft),
            'hard_index' => json_encode(array_filter($request->hard,'strlen')),
            'hard_value' => json_encode(array_filter($request->value,'strlen'))
        ]);

        return redirect()->route('ticket')->with('success','Successfully Request Re-Approval Ticket');
    }

    public function delete($id)
    {
        Line_Manager::where('ticket_id',$id)->delete();
        Ticket::findOrFail($id)->delete();
        Ticket_erf::where('ticket_id',$id)->delete();
        Ticket_jd::where('ticket_id',$id)->delete();

        return back()->with('success','Successfully Deleted Ticket');
    }

    /* detail tiket */
    public function detail($id)
    {
        $detail = Ticket::findOrFail($id);
        $soft = json_decode($detail->ticket_jd_details->soft_competency);
        $hard = json_decode($detail->ticket_jd_details->hard_index);
        $hard_value = json_decode($detail->ticket_jd_details->hard_value);

        return view('Line_Manager1.detail',compact('detail','soft','hard','hard_value'));
    }

    /* LINE MANAGER PROGRESS */
    public function progress($id) 
    {
        $ticket = Ticket::findOrFail($id);

        /* bedakan user yg buat berdasarkan grade */
        if ( $ticket->user->grade == 7 ) {
            $gh = User::findOrFail($ticket->user_GH);
            $chief = User::findOrFail($ticket->user_chief);

            return response()->json(
                array(
                    'gh' => $gh->name,
                    'chief' => $chief->name,
                    'approval_GH' => $ticket->approval_GH,
                    'approval_chief' => $ticket->approval_chief,
                    'grade' => $ticket->user->grade,
                )
            );

        } elseif ( $ticket->user->grade == 8 ) {
            $chief = User::findOrFail($ticket->user_chief);
            $chro = User::findOrFail($ticket->user_chro);

            return response()->json(
                array(
                    'chro' => $chro->name,
                    'approval_chro' => $ticket->approval_chro,
                    'chief' => $chief->name,
                    'approval_chief' => $ticket->approval_chief,
                    'grade' => $ticket->user->grade,
                )
            );

        }

    }

}
