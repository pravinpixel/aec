@component("mail::message")
<div>
    <h2>Dear  {{ $details['user_name'] }} ,</h2>
    <p>Your account to be registered successfully.! we proved to say that you can use our application in 24/7 and,</p>
    <p><br>For any information contact us</p>
    <p>{{ env('FOOTER_COMPANY_CONTACT') }}</p>
    <p><a href="">{{ env('FOOTER_EMAIL') }}</a></p>
    <center><b>Thank you</b></center>
</div>
@endcomponent