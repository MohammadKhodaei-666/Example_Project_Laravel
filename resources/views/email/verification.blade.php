@component('mail::message')
# verify email

dear {{$name}}

@component('mail::button', ['url' => $url])
please verify email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
