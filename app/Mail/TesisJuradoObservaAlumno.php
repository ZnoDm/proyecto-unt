<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TesisJuradoObservaAlumno extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "JURADO OBSERVACION - TESIS";
    public $jurado,$tesis,$mensaje= "Info";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jurado,$tesis,$mensaje)
    {
        $this->jurado = $jurado;
        $this->tesis = $tesis;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.tesis-jurado-observa-alumno');
    }
}
