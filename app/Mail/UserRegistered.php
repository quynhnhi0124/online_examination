<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $email)
    {
        $this->username = $username; 
        $this->email = $email;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.user-registered')
                    ->with([
                        'username'=>$this->username,
                        'email'=>$this->email]);
    }
}
