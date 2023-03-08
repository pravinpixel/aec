@component('mail::message')
<p> Dear <b>{{ ucfirst($data['name']) }}</b>,</p>
<p>
    This mail informed to the Variation order is shared with you to review. Kindly go through the document and please updated 
    <b style="color:mediumSeaGreen">Approve</b> / <b style="color:tomato">Deny</b> in Variation Order document page.
</p>
<p><a style="color: #000000;background: #ffc107;padding: 5px 10px;border-radius: 3px;text-decoration: none;border: 1px solid #090909;font-weight: 400;" href="{{ url('/login') }}">click to here</a></p>
<b>Thanks</b>,<br>
Team AECPrefab AS
@endcomponent
