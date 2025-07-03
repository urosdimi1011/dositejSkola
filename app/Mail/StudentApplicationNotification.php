<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentApplicationNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Student Application Notification',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'view.emails.',
        );
    }
    public function attachments(): array
    {
        return [];
    }
    public function build()
    {
        return $this
            ->subject('Upis novoga studenta')
            ->view('emails.student-created')
            ->with('student', $this->data);
    }
}
