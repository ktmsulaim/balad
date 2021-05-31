<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EditApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $application;
    protected $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($application)
    {
        $this->application = $application;
        $this->code = $application->getCode();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.edit_application', [
            'application' => $this->application,
            'code' => $this->code,
        ])->subject('Verification code - Edit application');
    }
}
