<?php

namespace App\Jobs;

use App\Email\ContactEmail;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProcessContact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * Create a new job instance.
     *
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to(config('mail.contact_recipient'))->send(new ContactEmail($this->contact));
    }
}
