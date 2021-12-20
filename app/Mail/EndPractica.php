<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EndPractica extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "TRÁMITE FINALIZADO";
    public $alumno= "Info";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumno)
    {
        $this->alumno =$alumno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.end-practica');
    }
}
