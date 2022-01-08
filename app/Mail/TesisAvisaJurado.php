<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TesisAvisaJurado extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "JURADO DE TESIS - ESCUELA DE INGENIERIA DE SISTEMAS - UNT";
    public $alumno,$tesis,$docente,$puesto="nada",$mensaje= "Info";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumno,$tesis,$docente,$puesto,$mensaje)
    {
        $this->alumno =$alumno;
        $this->tesis =$tesis;
        $this->puesto =$puesto;
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
        return $this->markdown('mails.tesis-avisa-jurado');
    }
}
