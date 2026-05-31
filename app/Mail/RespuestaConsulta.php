<?php

namespace App\Mail;

use App\Models\Consulta;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RespuestaConsulta extends Mailable
{
    use Queueable, SerializesModels;

    public Consulta $consulta; // Le decimos que es un objeto de tipo Consulta
    public string $respuesta;  // Le decimos que es un texto (string)

    public function __construct(Consulta $consulta, string $respuesta)
    {
        $this->consulta = $consulta;
        $this->respuesta = $respuesta;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Respuesta a tu consulta: ' . $this->consulta->asunto,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.respuesta-consulta',
        );
    }
}
