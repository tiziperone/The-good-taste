<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class VerificarCuentaNotification extends Notification
{
    use Queueable;

    public function __construct() {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        // Generamos una URL firmada temporal (expira en 60 minutos) para que nadie pueda alterarla
        $urlVerificacion = URL::temporarySignedRoute(
            'verificar.correo',
            now()->addMinutes(60),
            ['id' => $notifiable->getKey()]
        );

        return (new MailMessage)
            ->subject('¡Verifica tu cuenta en The Good Taste!')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Gracias por registrarte en nuestra plataforma de sabores artesanales.')
            ->line('Para activar tu cuenta y empezar a comprar, dale clic al botón de acá abajo:')
            ->action('Verificar mi Cuenta', $urlVerificacion)
            ->line('Si no creaste esta cuenta, no es necesario que hagas nada.')
            ->salutation('¡Saludos del equipo de The Good Taste!');
    }
}
