<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewEnquiryMailForCustomer extends Mailable
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
            ->subject(env('APP_NAME') . "- Your Enquiry Received - Thank You for Reaching Out!")
            ->markdown('mail.new-enquiry-mail-for-customer');
    } 
}
