@component("mail::message")
<div>
    <h2> CONFIRM YOUR SUBSCRIPTION </h2>
    <p>Hello <b>{{  $details['full_name']  }}</b> </p>
    <br>
    <h5> Thanks for subscriping to the <b>AEC Prefab AS </b> Web Service.</h5>
    <br>
    <p>Please click the link below to confirm and activate yours subscription.</p>
    <p>You will be able to update your preferences at anytime</p>
    <br>
    <br>
  
    <p>See you soon </p>
    <br>
    <p>AEC Prefab AS</p>
  
    @component('mail::button', ['url' => $details['route']])
        Sign me up
    @endcomponent
</div>
@endcomponent
