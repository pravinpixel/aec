<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectCompletedMail extends Mailable
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
        ->subject("Successful Completion of Project ".$this->details['project']['project_name'])
        ->markdown('mail.project-completed-mail');
    }
}
