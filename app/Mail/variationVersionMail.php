<?php

namespace App\Mail;

use App\Models\Issues;
use App\Models\VariationOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class variationVersionMail extends Mailable
{
    use Queueable, SerializesModels;
    public $variation;
    public $ticket_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($variation)
    {
        $this->variation = $variation;
        $this->ticket_id = Issues::find(VariationOrder::find($this->variation['variation_id'])->issue_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.variation-version-mail');
    }
}
