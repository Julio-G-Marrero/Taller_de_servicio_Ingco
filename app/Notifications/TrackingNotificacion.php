<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TrackingNotificacion extends Notification
{
    use Queueable;

    public $idOrden;
    public $idCliente;
    public $nombreCliente;
    public $contenidoNotificacion;
    public $tipoNotificacion;
    public $mensaje;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($idOrden,$contenidoNotificacion,$tipoNotificacion,$mensaje)
    {
        $this->idOrden = $idOrden;
        $this->contenidoNotificacion = $contenidoNotificacion;
        $this->tipoNotificacion = $tipoNotificacion;
        $this->mensaje = $mensaje;
        /**
         * 1-Color verde
         * 2.-Color amarillo
         * 3.-Color rojo
         * 4.-Color gris
         */    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    //Almacen anotificaciones en bd
    public function toDatabase($notifiable) 
    {
        return [
            'idOrden' => $this->idOrden,
            'idCliente' => $this->idCliente,
            'nombreCliente' => $this->nombreCliente,
            'contenidoNotificacion' => $this->contenidoNotificacion,
            'tipoNotificacion' => $this->tipoNotificacion,
            'mensaje' => $this->mensaje,

        ];
    }
}
