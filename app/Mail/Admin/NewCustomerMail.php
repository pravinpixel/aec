<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCustomerMail extends Mailable
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
            ->subject(env('APP_NAME') . "- New Customer Information")
            ->markdown('mail.new-customer-mail');
    }
}
