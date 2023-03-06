@component('mail::message')
<h3>
    <img src="{{ $data['avatar'] }}" style="border-radius:50px;margin-right:10px" height="35">
    {{ ucfirst($data['name']) }}
</h3>
<h2>{{ $data['variation']['title'] }}</h2>
<p>{{ $data['variation']['description'] }}</p>
<p><br> For more details, <a href="{{ url('/login') }}">click here</a>.</p>
<b>Thanks</b>,<br>
{{ config('app.name') }}
@endcomponent
