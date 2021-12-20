<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvisaPractica extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "!ULTIMA SEMANA! Informe Final";
    
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
        return $this->view('mail.aviso-practica');
    }
}
