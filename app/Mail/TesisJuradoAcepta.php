<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TesisJuradoAcepta extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "JURADO APRUEBA - TESIS";
    public $jurado,$tesis;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jurado,$tesis)
    {
        $this->jurado = $jurado;
        $this->tesis = $tesis;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.tesis-jurado-acepta');
    }
}
