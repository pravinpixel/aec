@component('mail::message')
    <h5>Greetings {{ $details['name'] }},</h5>
    <p>
        Many thanks for choosing <i><b>{{ $details['company_name'] }}</b></i> and welcome!. Now that your registration is complete, we are excited to start this journey with you.
        Use your registered username and password to access our website to get started.
    </p>
    <p>click to <a href="{{ url('/') }}">login</a> your account</p>
    <b>Thanks</b>,<br>
    {{ config('app.name') }}
@endcomponent