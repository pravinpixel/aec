@component("mail::message")
<div>
    <h3>
        <center>Reminder Mail </center>
    </h3>
    <br>
    <p>Dear <b>{{  $details['full_name']  }}</b>,<br></p>
     <p>  This is a reminder to inform you that your registration process is incomplete. Kindly, visit the link below to complete the process. </p>
     @component('mail::button', ['url' => $details['route']]) Click to finish your registration @endcomponent
    <p>Thank You.</p>
    <p>Regards,</p>
    <p>Team - <b>AECPrefab</b></p>
</div>
@endcomponent