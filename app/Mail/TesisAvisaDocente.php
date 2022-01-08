<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TesisAvisaDocente extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "ASESOR DE TESIS - ESCUELA DE INGENIERIA DE SISTEMAS - UNT";
    public $alumno,$tesis,$docente,$mensaje= "Info";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumno,$tesis,$docente,$mensaje)
    {
        $this->alumno =$alumno;
        $this->tesis =$tesis;
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
        return $this->markdown('mails.tesis-avisa-docente');
    }
}
