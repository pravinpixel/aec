@component('mail::message')
<p> Dear <b>{{ ucfirst($data['name']) }}</b>,</p>
<p>
    This mail is to inform you that a ticket has been raised for the project 
    <q>{{ $data['project_name'] }}</q> with the reference number (<b>{{ $data['issue_id'] }}</b> ) by <b>{{ $data['request_name'] }}</b>.
</p>
<p><br> For more details, <a href="{{ url('/login') }}">click here</a>.</p>
<b>Thanks</b>,<br>
Team AECPrefab AS
@endcomponent