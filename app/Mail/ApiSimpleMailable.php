<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class ApiSimpleMailable extends Mailable
{
    use Queueable, SerializesModels, SendGrid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('mails.simple', [
                'name' => 's-ichikawa'
            ])
            ->to(env('AUTHOR_EMAIL'), 'tester')
            ->subject('api sample mailable')
            ->sendgrid([
                'categories' => [
                    'api_simple_mailable'
                ]
            ]);
    }
}
