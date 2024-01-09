<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Inertia\Inertia;

// Controladores
use App\Http\Controllers\CarruselHomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\AvisoPrivacidadController;

// Rutas de vistas
Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');



Route::get('productos', function () {
    return Inertia::render('components/vistasPublicas/productos');
})->name('productos');

Route::get('nosotros', function () {
    return Inertia::render('components/vistasPublicas/nosotros');
})->name('nosotros');

Route::get('avisoPrivacidad', function () {
    return Inertia::render('components/vistasPublicas/avisoPrivacidad');
})->name('avisoPrivacidad');

Route::get('bolsaTrabajo', function () {
    return Inertia::render('components/vistasPublicas/bolsaTrabajo');
})->name('bolsaTrabajo');

// Rutas que no incluyen el middleware de autenticación
Route::get('/', [DashboardController::class, 'index']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('home', function () {
        return Inertia::render('components/vistasPublicas/home');
    })->name('home');

    $controllers = [
        'home' => CarruselHomeController::class,
        'productos' => ProductosController::class,
        'nosotros' => NosotrosController::class,
        'avisoPrivacidad' => AvisoPrivacidadController::class
    ];

    foreach ($controllers as $prefix => $controller) {
        Route::prefix($prefix)->group(function () use ($controller) {
            Route::post('bannerData', [$controller, 'bannerData']);
            Route::post('registrarBanner', [$controller, 'registrarBanner']);
            Route::post('eliminarBanner', [$controller, 'eliminarBanner']);
            Route::post('editarBanner', [$controller, 'editarBanner']);
        });
    }
});

Route::post('/CarruselHome/bannerData', [CarruselHomeController::class, 'bannerData']);
Route::post('/Productos/bannerData', [ProductosController::class, 'bannerData']);
Route::post('/Nosotros/bannerData', [NosotrosController::class, 'bannerData']);
Route::post('/AvisoPrivacidad/bannerData', [AvisoPrivacidadController::class, 'bannerData']);
