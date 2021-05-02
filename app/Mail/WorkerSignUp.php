<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkerSignUp extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * User which gets passed into view
     *
     * @var mixed
     */
    public $worker;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $worker)
    {
        $this->worker = $worker;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.users.worker_signup');
    }
}
