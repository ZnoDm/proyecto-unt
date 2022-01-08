<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PracticaSecretariaDeniega extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "PRACTICA DENEGADA - ESCUELA DE INGENIERIA DE SISTEMAS - UNT";
    public $alumno,$practica,$tipo="tipo",$mensaje= "Info";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumno,$practica,$mensaje,$tipo)
    {
        $this->alumno = $alumno;
        $this->practica = $practica;
        $this->mensaje = $mensaje;
        $this->tipo = $tipo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.practica-secretaria-deniega');
    }
}
