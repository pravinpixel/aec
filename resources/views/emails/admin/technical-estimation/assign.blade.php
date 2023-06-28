@component("mail::message")
<div class="text-center">
    <h2 class="text-center text-dark">Assigned for Estimation</h2>
    <hr>
    <div>
        <p>Dear <span class="text-primary fw-bold">{{ ucfirst($details['name']) }}</span>,< </p>
        <p>This mail is to inform you that an Admin has been assigned to you to estimate the Technical Estimation. </p>
        <p>To check your admin details and verify, click here. <a href="{{ $details['route'] }}"> {{ $details['enquiry_number'] }}</a></p>
        <p>Thank You.</p>
        <p>Regards,</p>
        <p>{{ config('app.name') }}</p>
    </div>
</div>
@endcomponent