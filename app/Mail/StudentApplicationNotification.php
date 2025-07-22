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

    public $student;

    public function __construct(array $student)
    {
        $this->student = $student;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Upis novog kandidata',
        );
    }
    public function content()
    {
        return new Content(
            view: 'emails.studentApplication',
        );
    }

}
