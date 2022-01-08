<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PracticaSolicitudAprobada extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "SOLICITUD PRACTICA APROBADA - ESCUELA DE INGENIERIA DE SISTEMAS - UNT";
    public $alumno,$practica,$mensaje= "Info";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumno,$practica,$mensaje)
    {
        $this->alumno =$alumno;
        $this->practica =$practica;
        $this->mensaje =$mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.practica-solicitud-aprobada');
    }
    
}
