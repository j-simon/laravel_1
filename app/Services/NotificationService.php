<?php

namespace App\Services;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendNotification($to, $subject, $message)
    {
        // Vorsicht! Die \App\Mail\GenericMail Klasse gibt es gar nicht die Mail kann also so nicht an mailtrap gesendet werden !
        //$this->mailer->to($to)->send(new \App\Mail\GenericMail($subject, $message));

        Mail::raw('Dein Nachrichtentext', function ($message) {
            $message->to('empfaenger@example.com')
                ->subject('Betreff');
        });

        return "in mailtrap nachsehen ob die Mail versendet wurde!";
    }
}
