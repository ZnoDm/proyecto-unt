<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeniedTesis extends Mailable
{
    use Queueable, SerializesModels;
    public $mensajito = 'mensajito';
    public $subject = "TESIS DENEGADA";
    public $alumno1 = "Infor";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumno1,$mensajito)
    {
        $this->alumno1 = $alumno1;
        $this->mensajito  = $mensajito;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.denied-practica');
    }
}
