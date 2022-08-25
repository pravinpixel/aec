@component("mail::message")
<div class="text-center">
    <h2 class="text-center text-dark">Assigned for Verification</h2>
    <hr>
    <div class="text-center">
        <p>Dear <span class="text-primary fw-bold">{{ ucfirst($details['name']) }}</span>,</p>
        <p class="text-center">This mail is to inform you that an Admin has been assigned to you to verify the Cost Estimation. </p>
        <p class="text-center">To check your admin details and verify, click here. <a href="{{ $details['route'] }}"> {{ $details['enquiry_number'] }}</a></p>
        <p>Thank You.</p>
        <p>Regards,</p>
        <p>{{ config('app.name') }}</p>
    </div>
</div>
@endcomponent