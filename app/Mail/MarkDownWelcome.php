<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class MarkDownWelcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the user.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@example.com')->markdown('auth.usermessage.contactBanner')->with([
            'name' => $this->user->name,
        ]);
    }
}
