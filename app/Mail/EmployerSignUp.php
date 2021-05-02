<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployerSignUp extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * User which gets passed into view
     *
     * @var mixed
     */
    public $employer;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $employer)
    {
        $this->employer = $employer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.employer_signup');
    }
}
