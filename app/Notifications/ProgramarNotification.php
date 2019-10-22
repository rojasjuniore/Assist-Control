<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Auth;
use App\Estante;
use App\OrdenesEstante;

class ProgramarNotification extends Notification
{
    use Queueable;
    protected $ordersnotify;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ordersnotify)
    {
        $this->ordersnotify = $ordersnotify;
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
        session(['tipo' => 'programar']);
        $message = new MailMessage;
        $message->greeting('Información del cliente:');
        $message->line(nl2br('Nombre cliente: '.$this->ordersnotify[0]->nombre_cliente));
        $message->line(nl2br('Código cliente: '.$this->ordersnotify[0]->code_cliente));
        $message->line('...');
        $message->line(nl2br('Consolidar orden con codigo: '));
        foreach($this->ordersnotify as $order) {
            
            $message->line(nl2br('Codigo de orden: '.$order->ware_reciept));
            $estante = OrdenesEstante::where('orden',$order->ware_reciept)->first();
            if($estante){
                $estante2 = Estante::where('id_estante', $estante->id_estante)->first();
            $message->line(nl2br('Codigo de estante: '.$estante2->codigo));
            $message->line(nl2br('Descripción: '.$order->descripcion));
            $message->line('...');
            }
            }
            
        $message->salutation('Saludos, Casillero express');
        return ($message);
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
