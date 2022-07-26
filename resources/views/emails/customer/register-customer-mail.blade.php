@component("mail::message")
<div>
    <h1> <center>CONFIRM YOUR SUBSCRIPTION</center> </h1>
    <p>Hello <b>{{  $details['full_name']  }}</b>, <br></p>
    <p> Thanks for subscriping to the <b>AEC Prefab AS </b> Web Service. <br></p>
    <p>Please click the link below to confirm and activate yours subscription.</p>
    <p>You will be able to update your preferences at anytime  <br><br></p> 
    <p>See you soon  <br></p>  
    <p> <b>AEC Prefab AS </b></p>
    @component('mail::button', ['url' => $details['route']]) Sign me up @endcomponent
</div>
@endcomponent
