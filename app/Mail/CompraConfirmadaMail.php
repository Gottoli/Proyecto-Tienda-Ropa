<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class CompraConfirmadaMail extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;

    /**
     * Crea una nueva instancia del mensaje.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Obtiene el sobre (envelope) del mensaje.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmamos tu compra #' . str_pad($this->order->id, 4, '0', STR_PAD_LEFT) . ' — LISBON™',
        );
    }

    /**
     * Obtiene la definición del contenido del mensaje.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.compra-confirmada',
        );
    }

    /**
     * Obtiene los archivos adjuntos del mensaje.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
