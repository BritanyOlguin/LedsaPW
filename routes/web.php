<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;

// Controladores
use App\Http\Controllers\CarruselHomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\AvisoPrivacidadController;

// Rutas de vistas
// Rutas que no incluyen el middleware de autenticación
Route::get('/', function () {
    return Inertia::render('Welcome', []);
});

Route::get('/homeAdmin', function () {
    return Inertia::render('components/vistasPublicas/home');
})->name('homeAdmin');

Route::get('/productosAdmin', function () {
    return Inertia::render('components/vistasPublicas/productos');
})->name('productosAdmin');

Route::get('/nosotrosAdmin', function () {
    return Inertia::render('components/vistasPublicas/nosotros');
})->name('nosotrosAdmin');

Route::get('/avisoPrivacidadAdmin', function () {
    return Inertia::render('components/vistasPublicas/avisoPrivacidad');
})->name('avisoPrivacidadAdmin');

Route::get('/bolsaTrabajo', function () {
    return Inertia::render('components/vistasPublicas/bolsaTrabajo');
})->name('bolsaTrabajo');

// Rutas que incluyen el middleware de autenticación
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    /* Route::get('/homeAdmin', function () {
        return Inertia::render('components/vistasAdmin/homeAdmin');
    })->name('homeAdmin');

    Route::get('/productosAdmin', function () {
        return Inertia::render('components/vistasAdmin/productosAdmin');
    })->name('productosAdmin');

    Route::get('/nosotrosAdmin', function () {
        return Inertia::render('components/vistasAdmin/nosotrosAdmin');
    })->name('nosotrosAdmin');

    Route::get('/avisoPrivacidadAdmin', function () {
        return Inertia::render('components/vistasAdmin/avisoPrivacidadAdmin');
    })->name('avisoPrivacidadAdmin');
 */
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
