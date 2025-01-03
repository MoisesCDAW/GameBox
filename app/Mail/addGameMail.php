<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class addGameMail extends Mailable
{
    use Queueable, SerializesModels;

    // The game that was added and the name of the person who did it.
    public $videogame;
    public $userName;

    /**
     * Create a new message instance.
     */
    public function __construct($videogame)
    {
        $this->videogame = $videogame;
        $this->userName = $this->getUserName();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New videogame added.',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.addGameMail',
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


    /**
     * Allows retrieving the name of the user who added the video game.
     */
    public function getUserName(){
        $user = User::find($this->videogame->user_id);
        return $user->name;
    }
}
