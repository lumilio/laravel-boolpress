<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Answer;

class MarkDownRisposta extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    /**
     * Build the answer.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@example.com')->markdown('admin.chats.contactBanner')->with([
            'email-user' => $this->answer['e-mail-user'],
            'contentanswer' => $this->answer['content-answer'],
        ]);
    }
}
