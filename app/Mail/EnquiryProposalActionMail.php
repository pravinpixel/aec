<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryProposalActionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details ;
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('global.mail_from_address'), env('MAIL_FROM_NAME'))
        ->subject(env('APP_NAME') . "- Proposal status")
        ->markdown('mail.enquiry-proposal-action-mail');
    }
}
