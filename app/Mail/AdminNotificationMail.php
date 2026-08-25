<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $senderName;
    public $senderEmail;

    public function __construct($subject, $content, $senderName, $senderEmail)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-notification',
        );
    }
}