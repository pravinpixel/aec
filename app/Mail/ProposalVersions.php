<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProposalVersions extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()    { 
        return $this->from(config('global.mail_from_address'))
        ->subject("{$this->details['projectName']}|{$this->details['enquiryNo']}|{$this->details['version']}")
        ->markdown('emails.admin.proposal-versions');
    }
}
