<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

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
    public function build(Request $request)
    {
        return $this
            ->markdown('emails.contact', ['msg' => $request->msg])
            ->to(['contact@moofradat.com'])
            ->from(['sender_email' => $request->input('email')],
                ['sender_name' => $request->input('user_name')])
            ->subject('رسالة تواصل: طلب عمل ')
            ->with(['sender_name' => $request->input('user_name'),
                'sender_email' => $request->user_name,
                'msg_title' => $request->msg]);

    }
   
};
