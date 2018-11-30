@component('mail::message')
# New Request
There is a new request for <b><em>{{-- {{ $position }} --}} TEST</em></b> from Line Manager, please login ! 

@component('mail::button', ['url' => env("APP_URL").'/login'])
	Login
@endcomponent

{{-- Thanks,<br>
{{ config('app.name') }} --}}
@endcomponent

