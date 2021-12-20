<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JuradoTesis extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "TESIS APROBADA";
    public $alumno,$practica,$mensaje,$jurados= "Info";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumno,$practica,$mensaje,$jurados)
    {
        $this->alumno =$alumno;
        $this->practica =$practica;
        $this->mensaje =$mensaje;
        $this->jurados =$jurados;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.aproved-tesis');
    }
}
