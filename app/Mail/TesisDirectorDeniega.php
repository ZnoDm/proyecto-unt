<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TesisDirectorDeniega extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "TESIS DENEGADA - ESCUELA DE INGENIERIA DE SISTEMAS - UNT";
    public $alumno,$tesis,$tipo="tipo",$mensaje= "Info";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumno,$tesis,$mensaje,$tipo)
    {
        $this->alumno =$alumno;
        $this->tesis =$tesis;
        $this->mensaje =$mensaje;
        $this->tipo =$tipo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.tesis-director-deniega');
    }
}
