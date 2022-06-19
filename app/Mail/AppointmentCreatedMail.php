<?php

namespace App\Mail;

use App\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentCreatedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var \App\Appointment
     */
    private Appointment $appointment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): AppointmentCreatedMail
    {
        return $this
            ->subject('Votre demande de prise de rendez-vous')
            ->view('mails.confirmation')
            ->with([
                'appointment' => $this->appointment
            ]);
    }
}
