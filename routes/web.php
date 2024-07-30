<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;


use App\Http\Controllers\BarberoController;
use App\Http\Controllers\ServicioController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/* Proteger la ruta de creación de citas */
Route::get('/citas/create', [CitaController::class, 'create'])
    ->middleware('auth')
    ->name('citas.create');


require __DIR__.'/auth.php';

/*-------------------------rutas agregadas--------------------------------*/
Route::resource('barberos', BarberoController::class);
Route::resource('servicios', ServicioController::class);

// Rutas para el perfil del usuario
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

// Rutas para las citas
Route::resource('citas', CitaController::class);

// Ruta para cerrar sesión
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


/* Route::resource('citas', CitaController::class); */
/* Route::get('citas/horarios', [CitaController::class, 'getAvailableTimes']); */

/* Route::get('/horas-disponibles', [CitaController::class, 'horasDisponibles']);

/*Manejar la solicitud AJAX de horas disponibles
Route::get('/citas/available-hours', [CitaController::class, 'availableHours'])->name('citas.availableHours'); */


/* Route::post('/citas/horas-disponibles', [CitaController::class, 'availableHours'])->name('citas.availableHours'); */
/* 

Route::get('/citas/disponibilidad', [CitaController::class, 'obtenerDisponibilidad'])->name('citas.disponibilidad'); */
// routes/web.php

Route::post('/citas/check-availability', [CitaController::class, 'checkAvailability'])->name('citas.check_availability');
Route::post('/citas/check-availability', [CitaController::class, 'checkAvailability'])->name('citas.check_availability');

Route::get('/', [HomeController::class, 'index']);


















