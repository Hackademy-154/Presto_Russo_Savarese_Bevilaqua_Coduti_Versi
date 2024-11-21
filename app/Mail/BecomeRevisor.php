<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BecomeRevisor extends Mailable {
    use Queueable, SerializesModels;


    public $user;

    public function __construct( User $user ) {
        if ($user === null) {
            // Puoi loggare o gestire l'errore
            throw new \Exception('User not found');
        }
        $this->user = $user;
    }

    public function envelope(): Envelope {
        
        return new Envelope(
            subject: 'Rendi Revisore L\'Utente : ' .$this->user->name,
        );
    }

    /**
    * Get the message content definition.
    */

    public function content(): Content {
        return new Content(
            view: 'mail.become-revisor',
        );
    }
}



