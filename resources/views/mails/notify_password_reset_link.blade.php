@component('mail::message')
# Password reset

You requested for a password reset link, kindly ignore this mail if you did not request for a password reset.

or 

click the link below to complete your password reset request!

@component('mail::button', ['url' => "{{ $data->url }}"])
	Reset Password
@endcomponent

or click on the link below <br>
{{ $data->url }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
