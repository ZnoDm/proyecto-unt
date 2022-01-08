<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TesisInformeFinalAprobada extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "TESIS ACEPTADA - ESCUELA DE INGENIERIA DE SISTEMAS - UNT";
    public $alumno,$tesis,$mensaje= "Info";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumno,$tesis,$mensaje)
    {
        $this->alumno =$alumno;
        $this->tesis =$tesis;
        $this->mensaje =$mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.tesis-informe-final-aprobada');
    }
}
