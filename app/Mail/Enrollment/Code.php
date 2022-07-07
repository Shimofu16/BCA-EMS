<?php

namespace App\Mail\Enrollment;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Code extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'))->subject('Verification Code')->markdown('BCA.Mails.enrollment.verification-code', [
            'data' => $this->data,
            'url' => route('verify.student', ['token' => $this->data['verification_code']]),
        ]);
    }
}
