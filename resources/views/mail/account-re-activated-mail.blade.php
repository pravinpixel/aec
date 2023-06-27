@component('mail::message')
    <b>Dear  {{ $details['full_name'] }},</b> <br>
    <p>
        We are thrilled to inform you that your account password has been successfully changed & reactivated!.
    </p>
    <p>click to <a href="{{ url('/') }}">login</a> your account</p>
    <b>Thanks</b>,<br>
    {{ config('app.name') }}
@endcomponent