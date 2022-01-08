<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PracticaInformeFinalAprobada extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "PRACTICA FINALIZADA - ESCUELA DE INGENIERIA DE SISTEMAS - UNT";
    public $alumno,$mensaje= "Info";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumno,$mensaje)
    {
        $this->alumno =$alumno;
        $this->mensaje =$mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.practica-informe-final-aprobada');
    }
}
