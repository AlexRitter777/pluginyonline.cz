<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailResetPasswordToken extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
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
                    ->subject(__('notifications.password_reset_request.subject'))
                    ->greeting(__('notifications.password_reset_request.greeting'))
                    ->line(__('notifications.password_reset_request.line_1'))
                    ->action(__('notifications.password_reset_request.action'), url(route('password.reset', ['token' => $this->token])))
                    ->line(__('notifications.password_reset_request.line_2'))
                    ->line(__('notifications.password_reset_request.line_3'))
                    ->salutation(__('notifications.password_reset_request.regards') . "  \r\n" . config('app.name'));

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
