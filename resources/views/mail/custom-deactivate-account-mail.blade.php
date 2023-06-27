@component('mail::message')
    <b>Dear {{ $details['full_name'] }},</b> <br>
    <p>We regret to inform you that your account has been deactivated. On behalf of AECPrefab, we would like to express our
        sincere apologies for any inconvenience this may have caused you.</p>
    <p>We understand that the deactivation of your account might have come as a disappointment, and we would like to assure
        you that we have considered your circumstances and reasons for the deactivation decision. Our team has carefully
        reviewed your account and unfortunately determined that the deactivation was necessary.</p>
    <p>We value each and every one of our users, and it is always our intention to provide the best possible experience.
        However, there are times when account deactivation becomes necessary due to violations of our terms of service or
        other reasons that compromise the integrity and security of our platform.</p>
    <p>Should you have any questions or concerns regarding the deactivation of your account, we encourage you to reach out
        to our support team at [mention support hours and contact details]. Our team will be available to provide you with
        more information and address any queries you may have.</p>
    <p>We appreciate your understanding and cooperation in this matter. If you believe there has been a misunderstanding or
        would like to discuss your account's deactivation further, we are open to reviewing your case. Please provide us
        with any additional information or context that you believe would be relevant for our reconsideration.</p>
    <p>Once again, we apologize for any inconvenience caused by the deactivation of your account. We are constantly working
        to improve our platform and enhance user experiences, and we appreciate your feedback and input. If you have any
        suggestions or ideas for improvement, please feel free to share them with us.</p>
    <p>Thank you for your past engagement and for being a part of our community. We wish you the best in your future
        endeavors.</p>
    <b>Thanks</b>,<br>
    {{ config('app.name') }}
@endcomponent
