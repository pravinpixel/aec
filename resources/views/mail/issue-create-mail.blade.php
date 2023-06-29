@component('mail::message')
<p> {{ $data['request_name'] }} assigned this issue to you</p>
<small>{{ $data['project_name'] }} / <b>{{ $data['issues']['issue_id'] }}</b></small>
<p><br> {{ $data['issues']['title'] }} <a href="{{ url('/live/project/issues/'.$data['issues']['project_id']) }}">View Issues</a>.</p>
<p><br> For more details, <a href="{{ url('/login') }}">click here</a>.</p>
<b>Thanks</b>,<br>
Team AECPrefab AS
@endcomponent