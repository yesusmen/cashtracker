<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Notification
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
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        return (new MailMessage)
            ->subject('Confirma tu cuenta en CashTracker')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Gracias por registrarte en CashTracker. Estamos emocionados de tenerte con nosotros.')
            ->line('Por favor, haz clic en el siguiente enlace para verificar tu correo electrónico.')
            ->action('Verificar correo electrónico', $verificationUrl)
            ->line('Si no creaste una cuenta, no es necesario realizar ninguna acción.')
            ->line('Gracias por usar nuestra aplicación!')
            ->salutation('El equipo de CashTracker');
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
