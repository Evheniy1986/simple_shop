<?php

namespace App\Mail;

use App\Models\Sku;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendSubscribtionMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $sku;

    public function __construct(Sku $sku)
    {
        $this->sku = $sku;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Subscribtion Message',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.subscription',
            with: ['sku' => $this->sku],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
