<?php

namespace App\Http\Controllers\HR_Talent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\CV;
use App\Models\Interview;
use App\User;
use Calendar;
use Carbon\Carbon;
use DateTime;

/* package email */
use Illuminate\Support\Facades\Mail;
use App\Mail\Invitation_interview;


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
    			// ->pluck('id');
                ->get();

    	return view('HR_Talent.Interview.index',compact('cv'));
    }

    /* halaman candidate list */
    public function candidate_list($id)
    {
        $cv = CV::where([
                    ['hiring_brief_id',$id],
                    ['approval_candidate','1']
                ])->get();

        $events = [];
        $data = Interview::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->interview_title, //event title
                    true, // fullday event?
                    new \DateTime($value->interview_date.' '.$value->time_start),
                    new \DateTime($value->interview_date.' '.$value->time_end),
                    // new \DateTime($value->interview_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        // 'url' => 'pass here url and any route',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);

        $test = Interview::get();

        /* form invitation */
        $interview_user = User::where([
                            ['id','!=',Auth::user()->id],
                            ['grade','8']
                        ])->get();

        return view('HR_Talent.Interview.candidate_list',compact('cv','calendar','id','test','interview_user'));
    }

    /* form invitation */
    public function invitation(Request $req)
    {
        // $email = User::where('id',$req->interview_user)->pluck('email');
        $name = User::whereIn('id',$req->interview_user)->pluck('name');
        // dd($req->interview_user,$name);

        Interview::create([
            'cv_id' => $req->cv_id,
            'interview_title' => $req->interview_title,
            'interview_user' => json_encode($req->interview_user),
            'interview_date' => Carbon::parse($req->interview_date)->toDateString(),
            'time_start' => $req->time_start,
            'time_end' => $req->time_end,
            'location' => $req->location
        ]);


        $filename = "invite.ics";
        $meeting_duration = (3600 * 2); // 2 hours
        // $meetingstamp = strtotime( $interview['time_start'] . " UTC");
        $meetingstamp = strtotime( Carbon::parse($req->time_start)->format('H:i a') . " UTC");
        $dtstart = gmdate('Ymd\THis\Z', $meetingstamp);
        $dtend =  gmdate('Ymd\THis\Z', $meetingstamp + $meeting_duration);
        $todaystamp = gmdate('Ymd\THis\Z');
        $uid = date('Ymd').'T'.date('His').'-'.rand().'@yourdomain.com';
        // $description = strip_tags($interview['interview_title']);
        $description = strip_tags($req->interview_title);
        $location = "Telefone ou vídeo conferência";
        $titulo_invite = "Your meeting title";
        $organizer = "CN=Organizer name:email@YourOrganizer.com";
        
        // ICS
        $mail[0]  = "BEGIN:VCALENDAR";
        $mail[1] = "PRODID:-//Google Inc//Google Calendar 70.9054//EN";
        $mail[2] = "VERSION:2.0";
        $mail[3] = "CALSCALE:GREGORIAN";
        $mail[4] = "METHOD:REQUEST";
        $mail[5] = "BEGIN:VEVENT";
        $mail[6] = "DTSTART;TZID=America/Sao_Paulo:" . $dtstart;
        $mail[7] = "DTEND;TZID=America/Sao_Paulo:" . $dtend;
        $mail[8] = "DTSTAMP;TZID=America/Sao_Paulo:" . $todaystamp;
        $mail[9] = "UID:" . $uid;
        $mail[10] = "ORGANIZER;" . $organizer;
        $mail[11] = "CREATED:" . $todaystamp;
        $mail[12] = "DESCRIPTION:" . $description;
        $mail[13] = "LAST-MODIFIED:" . $todaystamp;
        $mail[14] = "LOCATION:" . $location;
        $mail[15] = "SEQUENCE:0";
        $mail[16] = "STATUS:CONFIRMED";
        $mail[17] = "SUMMARY:" . $titulo_invite;
        $mail[18] = "TRANSP:OPAQUE";
        $mail[19] = "END:VEVENT";
        $mail[20] = "END:VCALENDAR";
        
        $mail = implode("\r\n", $mail);
        header("text/calendar");
        file_put_contents($filename, $mail);


        /* custom mail */
        $interview = [
                'from' => 'developer@gmail.com', 
                'sender' => Auth::user()->name,
                'subject' => $req->interview_title,
                'position' => CV::findOrFail($req->cv_id)->hiring_briefs->tickets->position_name,
                'candidate_name' => CV::findOrFail($req->cv_id)->name_candidate,
                'interview_date' => Carbon::parse($req->interview_date)->format('l, jS F Y'),
                'interview_title' => $req->interview_title,
                'time_start' => Carbon::parse($req->time_start)->format('H:i a'),
                'time_end' => Carbon::parse($req->time_end)->format('H:i a'),
                'location' => ucwords($req->location),
                'filename' => $filename
            ];


        Mail::to('asem@asem.com')
            ->cc(['1@gmai.com','2@gmail.com','3@gmail.com'])
            // ->cc($name)
            ->send(new Invitation_interview($interview));

        return back()->with('success','Successfully Arrange Interview For '.CV::findOrFail($req->cv_id)->name_candidate);
    }

}
