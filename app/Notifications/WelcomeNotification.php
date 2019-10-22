<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
use Auth;

class WelcomeNotification extends Notification
{
    use Queueable;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        session(['tipo' => 'welcome']);
        return (new MailMessage)
                     ->from('no-reply@efectylogistic.com', 'Bienvenido a Casillero Express')
                    ->subject('Bienvenido a Casillero Express')
                    ->subject('Bienvenid@ '.$this->user->nombre.' a Casillero Express ')
                    ->line('Tu información de Casillero Express:')
                    ->line('Codigo de casillero: '.$this->user->code_cliente)
                    ->line('Nombre: '.$this->user->nombre)
                    ->line('Correo Electrónico: '.$this->user->email)
                    ->line('')
                    ->salutation('Saludos, Casillero express');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
