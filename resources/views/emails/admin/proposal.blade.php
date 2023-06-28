@component("mail::message")
    <div>
        <b>Dear  {{ $details['customer']['full_name'] }},</b>
        <p>The proposal is shared with you to review. Kindly go through the document and please updated <strong>Approve</strong> / <strong>Deny</strong> in proposal document page </p>
        <a href="{{ route('proposal-approve',  $details['proposal_id'] ) }}" class="button button-primary" >Click to view</a>
        <p><br>For any information contact us</p>
        <p>{{ env('FOOTER_COMPANY_CONTACT') }}</p>
        <p><a >{{ env('FOOTER_EMAIL') }}</a></p>
        <center><b>Thank you</b></center>
    </div>
@endcomponent