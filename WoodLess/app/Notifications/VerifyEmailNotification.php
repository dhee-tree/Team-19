<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Verify Your Email Address')
            ->line('Thank you for registering on our website!')
            ->line('To complete your registration, please click the button below to verify your email address:')
            ->action('Verify Email Address', $this->verificationUrl($notifiable))
            ->line('If you did not create an account, no further action is required.');
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @return string
     */
    protected function verificationUrl($notifiable): string
    {
        return url('/verify-email/' . $notifiable->getKey() . '/' . $notifiable->verification_code);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
