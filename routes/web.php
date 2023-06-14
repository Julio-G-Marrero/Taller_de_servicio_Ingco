<?php

use App\Http\Controllers\CobranzaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdenController;

include 'auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Roles
105-Cliente
206-Gerente
307-Supervisor
408-Centro
509-Cobranza
*/

/* Cliente */
Route::get('/', function () {
    return view('Main.index');
})->name('inicio');

Route::get('/sobre-nosotros', function () {
    return view('Main.sobre-nosotros');
})->name('sobre-nosotros');

Route::get('/garantia', function () {
    return view('Main.garantia');
})->name('garantia');

Route::get('/garantias', function() {
    return view('publico.garantias');
})->name('garantias');


Route::get('/registra-tu-herramienta',[OrdenController::class, 'registrarHerramienta'])->middleware(['auth','verified','rol.usuario'])->name('registra-tu-garantia');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 
 
//-------Dashbaord---------//

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth','verified','rol.dashboard'])->name('dashboard');

Route::get('/dashboard/centro', [DashboardController::class, 'centroDeServicio'])->middleware(['auth','verified','rol.centro'])->name('dashboard-centro');

//Cobranza
Route::get('/dashboard/cobranza',[CobranzaController::class, 'index'])->middleware(['auth','verified','rol.dashboard'])->name('cobranza');
Route::post('/dashboard/cobranza',[CobranzaController::class, 'index'])->middleware(['auth','verified','rol.dashboard'])->name('cobranza');
Route::get('/dashboard/centro/cobranza',[CobranzaController::class, 'cobranzaIndex'])->middleware(['auth','verified','rol.centro'])->name('cobranza-centro');
Route::post('/dashboard/centro/cobranza',[CobranzaController::class, 'cobranzaIndex'])->middleware(['auth','verified','rol.centro'])->name('cobranza-centro');
Route::get('/dashboard/cobranza/edit/{order}',[CobranzaController::class, 'edit'])->middleware(['auth','verified','rol.dashboard'])->name('cobranza.edit');
Route::post('/dashboard/cobranza/edit/{order}',[CobranzaController::class, 'edit'])->middleware(['auth','verified','rol.dashboard'])->name('cobranza.edit');



//Inventario
Route::get('/dashboard/inventario', function () {
    return view('user.inventario');
})->middleware(['auth','verified','rol.dashboard'])->name('inventario');
Route::get('/dashboard/inventario/registrar', function () {
    return view('user.inventario-crear');
})->middleware(['auth','verified','rol.dashboard'])->name('inventario-crear');


//Ordenes
Route::get('/dashboard/ordenes',[OrdenController::class, 'index'])->middleware(['auth','verified','rol.dashboard'])->name('ordenes.index');
Route::get('/dashboard/centro/ordenes',[OrdenController::class, 'indexCentro'])->middleware(['auth','verified','rol.centro'])->name('ordenes.index-centro');
// Route::get('/dashboard/ordenes/garantias',[OrdenController::class, 'garantias'])->middleware(['auth','verified'])->name('ordenes.garantias');
// Route::post('/dashboard/ordenes/garantias',[OrdenController::class, 'garantias'])->middleware(['auth','verified'])->name('ordenes.garantias');

Route::get('/dashboard/ordenes/reparaciones',[OrdenController::class, 'reparaciones'])->middleware(['auth','verified','rol.dashboard'])->name('ordenes.reparaciones');
Route::post('/dashboard/ordenes/reparaciones',[OrdenController::class, 'reparaciones'])->middleware(['auth','verified','rol.dashboard'])->name('ordenes.reparaciones');

Route::get('/dashboard/ordenes/revision',[OrdenController::class, 'revision'])->middleware(['auth','verified','rol.dashboard'])->name('ordenes.revision');
Route::post('/dashboard/ordenes/revision',[OrdenController::class, 'revision'])->middleware(['auth','verified','rol.dashboard'])->name('ordenes.revision');

Route::get('/dashboard/ordenes/revision-centro',[OrdenController::class, 'revisionCentro'])->middleware(['auth','verified'])->name('ordenes.revision-centro');
Route::post('/dashboard/ordenes/revision-centro',[OrdenController::class, 'revisionCentro'])->middleware(['auth','verified'])->name('ordenes.revision-centro');

Route::get('/dashboard/orden/crear',[OrdenController::class, 'create'])->middleware(['auth','verified','rol.dashboard'])->name('ordenes.create');
Route::get('/dashboard/orden/{order}/edit',[OrdenController::class, 'edit'])->middleware(['auth','verified','rol.dashboard'])->name('ordenes.edit');

//Tracking
Route::get('/dashboard/orden/{order}/tracking',[OrdenController::class, 'tracking'])->middleware(['auth','verified','rol.dashboard'])->name('ordenes.tracking');

Route::get('/dashboard/centro/orden/{order}/tracking',[OrdenController::class, 'trackingCentro'])->middleware(['auth','verified','rol.centro'])->name('ordenes.tracking-centro');

Route::get('/{order}/tracking',[OrdenController::class, 'trackingCliente'])->middleware(['auth','verified','rol.usuario'])->name('ordenes.tracking-cliente');

//Mensajes
Route::get('/dashboard/orden/{order}/mensajes',[OrdenController::class, 'mensajes'])->middleware(['auth','verified','rol.operario'])->name('ordenes.mensajes');
Route::get('/dashboard/centro/orden/{order}/mensajes',[OrdenController::class, 'mensajesCentro'])->middleware(['auth','verified','rol.operario'])->name('ordenes.mensajes-centro');

//Pesronal
Route::get('/dashboard/personal', function () {
    return view('user.personal');
})->middleware(['auth','verified'])->name('personal');
Route::get('/dashboard/personal/crear', function () {
    return view('user.personal-crear');
})->middleware(['auth','verified'])->name('personal-crear');


//Perfil Centro
Route::get('/dashboard/centro/perfil', function () {
    return view('user.main-centro');
})->middleware(['auth','verified'])->name('perfil-dashboard-centro');
// Route::get('/dashboard/centro/perfil/editar', function () {
//     return view('user.user-editar');
// })->middleware(['auth','verified'])->name('perfil-dashboard-editar-centro');

//Perfil
Route::get('/dashboard/perfil', function () {
    return view('user.main');
})->middleware(['auth','verified'])->name('perfil-dashboard');
// Route::get('/dashboard/perfil/editar', function () {
//     return view('user.user-editar');
// })->middleware(['auth','verified'])->name('perfil-dashboard-editar');

//Perfil Cliente
Route::get('/perfil', function () {
    return view('publico.mainPerfil');
})->middleware(['auth','verified'])->name('perfil-usuario');
Route::get('/perfil/editar', function () {
    return view('publico.editarPerfilUsuario');
})->middleware(['auth','verified'])->name('perfil-usuario-editar');



//Notificaciones
Route::get('/dashboard/notificaciones/nuevas',[NotificacionController::class, 'nuevas'])->middleware(['auth','verified'])->name('dashboard-noti-nuevas','rol.dashboard');

Route::get('/dashboard/notificaciones/todas',[NotificacionController::class, 'todas'])->middleware(['auth','verified'])->name('dashboard-noti-todas','rol.dashboard');

Route::get('/dashboard/centro/notificaciones/nuevas',[NotificacionController::class, 'nuevas'])->middleware(['auth','verified','rol.centro'])->name('dashboard-centro-noti-nuevas');

Route::get('/dashboard/centro/notificaciones/todas',[NotificacionController::class, 'todas'])->middleware(['auth','verified','rol.centro'])->name('dashboard-centro-noti-todas');


Route::get('/notificaciones/nuevas',[NotificacionController::class, 'nuevas'])->middleware(['auth','verified'])->name('cliente-noti-nuevas');

Route::get('/notificaciones/todas',[NotificacionController::class, 'todas'])->middleware(['auth','verified'])->name('cliente-noti-todas');


