<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $subjectName;
    public string $name;
    public string $docNo;
    public string $description;

    /**
     * Create a new message instance.
     */
    public function __construct(string $subjectName, string $name, string $docNo, string $description)
    {
        $this->subjectName = $subjectName;
        $this->name = $name;
        $this->docNo = $docNo;
        $this->description = $description;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectName,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.send-email',
            with: [
                'name' => $this->name,
                'docno' => $this->docNo,
                'detail' => $this->description
            ],
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
