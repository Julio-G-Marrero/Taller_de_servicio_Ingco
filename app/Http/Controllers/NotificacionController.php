<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function nuevas()
    {
        $notificaciones = auth()->user()->unreadNotifications;

        //Limpiar notificaciones
        auth()->user()->unreadNotifications->markAsRead();

        if(auth()->user()->role_id == 1){
            return view('user.notificaciones-cliente-nuevas', [
                'notificaciones' => $notificaciones
            ]);
        }elseif(auth()->user()->role_id == 4) {
            return view('user.notificaciones-centro-nuevas', [
                'notificaciones' => $notificaciones
            ]);

        }else {
            return view('user.notificaciones-dashboard-nuevas', [
                'notificaciones' => $notificaciones
            ]);
        }
    }

    public function todas()
    {
        $notificaciones = auth()->user()->Notifications;

        if(auth()->user()->role_id == 1){
            return view('user.notificaciones-cliente', [
                'notificaciones' => $notificaciones
            ]);
        }elseif(auth()->user()->role_id == 4) {
            return view('user.notificaciones-centro', [
                'notificaciones' => $notificaciones
            ]);

        }else {
            return view('user.notificaciones-dashboard', [
                'notificaciones' => $notificaciones
            ]);
        }
    }
}
