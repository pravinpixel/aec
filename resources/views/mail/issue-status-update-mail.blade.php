@component('mail::message')
<div>
    <b>Hi {{ $details['user']['full_name'] }},</b> 
    <p>Issue was {{ $details['issue']['status'] }} by {{ $details['requester']['full_name'] }}</p>
    <p><b>Remarks :</b> {{ $details['issue']['remarks'] }} </p>
    <small>{{ $details['issue']['project']['project_name'] }} / <b>{{ $details['issue']['issue_id'] }}</b></small>
    <p><br> {{ $details['issue']['title'] }} <a href="{{ url('/live/project/issues/'.$details['issue']['project_id']) }}">View Issues</a>.</p>
    <p><br> For more details, <a href="{{ url('/login') }}">click here</a>.</p>
    <b>Thanks</b>,<br>
    Team AECPrefab AS
</div>
@endcomponent
