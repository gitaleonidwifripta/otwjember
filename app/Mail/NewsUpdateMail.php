<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class NewsUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $destinasi;
    public function __construct(Collection $destinasi)
    {
        $this->destinasi = $destinasi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.news-letter')
        ->with(['destinasi' => $this->destinasi])  // corrected here
        ->subject("Notifikasi Destinasi Wisata");
    }
}
