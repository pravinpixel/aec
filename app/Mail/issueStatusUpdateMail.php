<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class issueStatusUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public function __construct($details)
    {
        $this->details = $details;
    } 
    public function build()
    { 
        return $this->from(config('global.mail_from_address'), env('MAIL_FROM_NAME'))
        ->subject(env('APP_NAME') . "- Issue ".$this->details['issue']['status'])
        ->markdown('mail.issue-status-update-mail');
    }
}
