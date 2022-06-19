<?php

namespace App\Notifications;

use App\Appointment;
use App\Mail\AppointmentCreatedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class AppointmentCreated extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var \App\Appointment
     */
    private $appointment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param Appointment $notifiable
     *
     * @return \App\Mail\AppointmentCreatedMail
     */
    public function toMail(Appointment $notifiable): AppointmentCreatedMail
    {
        return (new AppointmentCreatedMail($this->appointment))
            ->to($notifiable->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}
