<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentVoid extends Mailable
{
    use Queueable, SerializesModels;
    public $appointVoidDetails;
    /**
     * Create a new message instance.
     */
    public function __construct($appointVoidDetails)
    {
        $this->appointVoidDetails = $appointVoidDetails;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cancellation of Appointment',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
        {
            return $this->markdown('system.appointment.mail');
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
