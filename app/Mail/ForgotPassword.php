<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
    public $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $code)
    {
        $this->token = $token;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('global.mail_from_address'))
        ->subject(env('APP_NAME')." - Reset Password")
        ->markdown('emails.customer.forgot-password-mail')
        ->with('data',['token'=>$this->token, 'code'=> $this->code]);
    }
}
