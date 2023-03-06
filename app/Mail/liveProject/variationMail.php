<?php

namespace App\Mail\liveProject;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class variationMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data=[])
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        return $this->markdown('mail.variation-mail',compact('data'));
    }
}
