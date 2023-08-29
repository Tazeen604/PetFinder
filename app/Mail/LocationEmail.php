<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LocationEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $locationData;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($locationData, $message)
    {
        $this->locationData = $locationData;
        $this->message = $message;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Location Email',
        );
    }
    public function build()
    {
        return $this->view('emails.location')
            ->subject('Device Location from Pet Finder')
            ->from('tazeen.hashmat2014@gmail.com', 'Me');
    }
    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
          //  view: 'view.location',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
