<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevaSolicitudGarantia extends Notification
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
    public function __construct($idOrden,$idCliente,$nombreCliente,$contenidoNotificacion,$tipoNotificacion,$mensaje)
    {
        $this->idOrden = $idOrden;
        $this->idCliente = $idCliente;
        $this->nombreCliente = $nombreCliente;
        $this->contenidoNotificacion = $contenidoNotificacion;
        $this->tipoNotificacion = $tipoNotificacion;
        $this->mensaje = $mensaje;
        /**
         * 1-Color verde
         * 2.-Color amarillo
         * 3.-Color rojo
         * 4.-Color gris
         */

    }

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
        $url = url('/dashboard/notificaciones/nuevas');
        return (new MailMessage)
                    ->line('La orden #' . $this->idOrden .' fue solicitada a garantia por el cleinte:  "' . $this->nombreCliente.'"')
                    ->action('Ver Notificaciones', $url)
                    ->line('Gracias por usar nuestros Servicios.');
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
