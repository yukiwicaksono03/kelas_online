<?php 
// app/Mail/ExampleMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExampleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Subject of the email')
                    ->view('emails.example') // Blade template for email content
                    ->with([
                        'key' => 'value', // Pass any additional data to the email view
                        'data' => $this->data,
                    ]);
    }
}
