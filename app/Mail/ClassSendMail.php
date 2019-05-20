<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClassSendMail extends Mailable
{
    use Queueable, SerializesModels;
     
    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $demo;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('recuero.22@gmail.com')
                    ->view('mail.mail')
                    ->text('mail.mail_plain')
                    ->with(
                      [
                        'testVarOne' => '1',
                        'testVarTwo' => '2',
                      ])
                      ;
    }
}
