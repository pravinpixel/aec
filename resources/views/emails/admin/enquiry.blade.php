@component("mail::message")
 
<div>
    <h2>Dear  {{ $details['customer_name'] }} ,</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia assumenda, qui repudiandae quidem doloribus minus, aut enim aliquid veritatis quos, vel nesciunt odit inventore debitis obcaecati sunt reprehenderit! Numquam, aspernatur?</p>
    <p><br><strong> Your login credential blow there:</strong></p>
    <p><b>User name : </b> {{ $details['customer_email'] }}</p>
    <p><b>Password  : </b> {{ $details['customer_pws'] }}</p>
    <p><br><strong>Kindly use this username and password to login</strong></p>
    <a href="{{ route("customers-dashboard") }}">Upload your project  information</a>
    <p><br>For any information contact us </p>
    <p>04321 - 56789</p>
    <p><a href="">aecprefab@gmail.com</a></p>
    <center><b>Thank you</b></center>
</div>
@endcomponent