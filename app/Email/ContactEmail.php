<?php

namespace App\Email;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * Create a new message instance.
     *
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('emails.contact', [
                'contact' => $this->contact,
                'title' => 'Nuovo contatto dal form di Executable'
            ])
            ->subject('Nuovo contatto dal form di Executable');
    }
}
