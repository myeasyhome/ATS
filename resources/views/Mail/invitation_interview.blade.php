@component('mail::message')

Dear, 

We would like to invite you to attend Interview Session for <strong>{{ $interview['position'] }}</strong> , here the candidate : <br>

Candidate Name : {{ $interview['candidate_name'] }} <br>
Date : {{ $interview['interview_date'] }} <br>
Time : {{ $interview['time_start'] }} - {{ $interview['time_end'] }} <br>
Location : {{ $interview['location'] }} <br>

@component('mail::button', ['url' => route('downloadCV',$interview['cv_id']) ])
	Download CV
@endcomponent

Thank you,<br>

Regards,<br>
{{ $interview['sender'] }}
@endcomponent