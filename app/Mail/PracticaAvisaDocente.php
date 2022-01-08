<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PracticaAvisaDocente extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "ASESOR DE PRACTICA - ESCUELA DE INGENIERIA DE SISTEMAS - UNT";
    public $alumno,$practica,$docente,$mensaje= "Info";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumno,$practica,$docente,$mensaje)
    {
        $this->alumno =$alumno;
        $this->practica =$practica;
        $this->mensaje =$mensaje;
        $this->docente =$docente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.practica-avisa-docente');
    }
}
