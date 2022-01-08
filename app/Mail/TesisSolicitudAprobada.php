<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TesisSolicitudAprobada extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "SOLICITUD TESIS APROBADA - ESCUELA DE INGENIERIA DE SISTEMAS - UNT";
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
        return $this->markdown('mails.tesis-solicitud-aprobada');
    }
}
