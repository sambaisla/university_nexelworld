<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $first_name;
    public function __construct($name)
    {
        $this->first_name=$name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_name=$this->first_name;
        // echo "<pre>";print_r($e_name);die;
        return $this->view('mail.RegistrationConfirmation',compact("e_name"))->subject("Welcome to Brand Samosa");
    }
}
