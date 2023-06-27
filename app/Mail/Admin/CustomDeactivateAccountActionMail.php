<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomDeactivateAccountActionMail extends Mailable
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
            ->subject(env('APP_NAME') . "- Account Deactivated")
            ->markdown('mail.custom-deactivate-account-action-mail');
    }  
}
