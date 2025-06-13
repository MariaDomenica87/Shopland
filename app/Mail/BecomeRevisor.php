<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BecomeRevisor extends Mailable
{
    use Queueable, SerializesModels;
    //  l'attributo $user è l’utente che ha fatto richiesta di diventare revisore. Questa variabile user sarà automaticamente disponibile sulla vista della mail inviata all’admin
    public $user;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    // la funzione envelope , letteralmente “busta”, viene utilizzata per impostare le informazioni sull'intestazione di posta elettronica per la mail da inviare. Queste informazioni includono il mittente, il destinatario e, nel nostro caso, l'oggetto della mail
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rendi revisore l\' utente' . $this->user->name,
        );
    }

    /**
     * Get the message content definition.
     */
    //stabiliamo il contenuto della mail, quindi che vista deve essere materialmente spedita all’admin.
    public function content(): Content
    {
        return new Content(
            view: 'mail.become-revisor',
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
