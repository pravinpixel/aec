@component("mail::message")
<div>
    <h2>Dear  {{ $details['customer_name'] }} ,</h2>
    <p>Your account to be registered successfully.! we proved to say that you can use our application in 24/7 and,</p>
    <p><br><strong> Your login credential :</strong></p>
    <p><b>User name : </b> {{ $details['customer_email'] }}</p>
    <p><b>Password  : </b> {{ $details['customer_pws'] }}</p>
    <p><br><strong>Kindly use this username and password to login</strong></p>
    <a href="{{ route("customers-enquiry-dashboard")}}">Upload your project information</a>
    <p><br>For any information contact us</p>
    <p>{{ env('FOOTER_COMPANY_CONTACT') }}</p>
    <p><a href="">{{ env('FOOTER_EMAIL') }}</a></p>
    <center><b>Thank you</b></center>
</div>
@endcomponent