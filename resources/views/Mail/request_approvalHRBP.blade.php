@component('mail::message')
# New Request
There is a new request for <b><em>{{ $position }}</em></b> that has been approved by Line Manager 2 and Hiring Business Partner. Please login and make a schedule ! 

@component('mail::button', ['url' => env("APP_URL").'/login'])
	Login
@endcomponent

{{-- Thanks,<br>
{{ config('app.name') }} --}}
@endcomponent

