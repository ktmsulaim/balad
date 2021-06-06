<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationFeeInvoice extends Mailable
{
    use Queueable, SerializesModels;

    protected $payment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.application_fee', ['payment' => $this->payment])
        ->subject('Offer of Admission for the Malayalam Basic Certificate Course')
        ->attachData($this->payment->getInvoice(), $this->payment->transaction_id . '.pdf', ['mime' => 'application/pdf']);
    }
}
