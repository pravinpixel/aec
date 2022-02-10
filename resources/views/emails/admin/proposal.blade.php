@component("mail::message")
    <div>
        <h2>Dear  {{ $details['name'] }} ,</h2>
        <p>The proposal is shared with you to review. Kindly go through the document and please updated <strong>Approve</strong> / <strong>Deny</strong> in proposal document page </p>
        <a href="{{ route('proposal-approve', ['id'=>$details['EnqId'],'proposal_id' => $details['proposal_id'], 'Vid' => $details['Vid'],] ) }}" class="button button-primary" >Click to view</a>
        <p><br>For any information contact us</p>
        <p>04321 - 56789</p>
        <p><a >aecprefab@gmail.com</a></p>
        <center><b>Thank you</b></center>
    </div>
@endcomponent