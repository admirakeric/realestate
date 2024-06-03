<?php

namespace App\Mail\ContactUS;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendUsMessage extends Mailable{
    use Queueable, SerializesModels;

    public $_subject, $_reply_to, $_reply_to_email, $_name, $_email, $_phone, $_message, $_reason;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $reply_to, $reply_to_email, $name, $email, $phone, $message, $reason = null){
        $this->_subject = $subject;
        $this->_reply_to = $reply_to;
        $this->_reply_to_email = $reply_to_email;
        $this->_name = $name;
        $this->_email = $email;
        $this->_phone = $phone;
        $this->_message = $message;
        $this->_reason = $reason;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope{
        return new Envelope(
            from: new Address('europlac-nekretnine@hotmail.com', 'NoReply Euro-PLac d.o.o'),
            replyTo: [
                new Address($this->_reply_to_email, $this->_reply_to),
            ],
            subject: $this->_subject
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content{
        return new Content(
            markdown: 'public-part.email-templates.contact-us.send-us-a-message',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array{
        return [];
    }
}
