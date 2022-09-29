<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class projectticketmail extends Mailable
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
        return $this->from(config('global.mail_from_address'),env('MAIL_FROM_NAME'))
        ->subject("{$this->details['project_name']}|{$this->details['ticket_id']}")
        ->markdown('emails.ProjectTicketMail')
        ->with('details',$this->details);
    }
}
