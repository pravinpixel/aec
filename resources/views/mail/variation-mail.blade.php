@component('mail::message')
# Introduction

The body of your message.
<h1>{{ $data['name'] }}</h1>
<h1>{{ $data['avatar'] }}</h1>
<h1>{{ $data['email'] }}</h1>
<h1>{{ $data['mobile_no'] }}</h1>
<h1>{{ $data['company_name'] }}</h1>
<h1>{{ $data['variation'] }}</h1>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
