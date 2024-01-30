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
use App\Http\Controllers\CardProductosController;
use App\Http\Controllers\CardBolsaTrabajoController;
use App\Http\Controllers\ImgProductosController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\ImgContactosController;

// Rutas de vistas
// Rutas que no incluyen el middleware de autenticación

Route::get('/', function () {
    return Inertia::render('Welcome', []);
})->name('home');

Route::get('/productos', function () {
    return Inertia::render('components/vistasPublicas/productos');
})->name('productos');

Route::get('/nosotros', function () {
    return Inertia::render('components/vistasPublicas/nosotros');
})->name('nosotros');

Route::get('/avisoPrivacidad', function () {
    return Inertia::render('components/vistasPublicas/avisoPrivacidad');
})->name('avisoPrivacidad');

Route::get('/bolsaTrabajo', function () {
    return Inertia::render('components/vistasPublicas/bolsaTrabajo');
})->name('bolsaTrabajo');

Route::get('/contactanos', function () {
    return Inertia::render('components/vistasPublicas/contactanos');
})->name('contactanos');

// Rutas que incluyen el middleware de autenticación
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Rutas de los controladores
    $controllers = [
        'home' => CarruselHomeController::class,
        'productos' => ProductosController::class,
        'nosotros' => NosotrosController::class,
        'avisoPrivacidad' => AvisoPrivacidadController::class,
        'CardProductos' => CardProductosController::class,
        'CardBolsaTrabajo' => CardBolsaTrabajoController::class,
        'ImgProductos' => ImgProductosController::class,
        'Contactos' => ContactosController::class,
        'Departamentos' => DepartamentosController::class,
        'ImgContactos' => ImgContactosController::class,
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

Route::post('/cardP', [CardProductosController::class, 'bannerDataNew']);
Route::post('/cardBT', [CardBolsaTrabajoController::class, 'bannerDataNew']);
Route::post('/ImgProduct', [ImgProductosController::class, 'bannerDataNew']);
Route::post('/ImgContact', [ImgContactosController::class, 'bannerDataNew']);

Route::post('/CarruselHome/bannerData', [CarruselHomeController::class, 'bannerData']);
Route::post('/Productos/bannerData', [ProductosController::class, 'bannerData']);
Route::post('/Nosotros/bannerData', [NosotrosController::class, 'bannerData']);
Route::post('/AvisoPrivacidad/bannerData', [AvisoPrivacidadController::class, 'bannerData']);
Route::post('/CardProductos/bannerData', [CardProductosController::class, 'bannerData']);
Route::post('/CardBolsaTrabajo/bannerData', [CardBolsaTrabajoController::class, 'bannerData']);
Route::post('/ImgProductos/bannerData', [ImgProductosController::class, 'bannerData']);
Route::post('/Contactos/bannerData', [ContactosController::class, 'bannerData']);
Route::post('/Departamentos/bannerData', [DepartamentosController::class, 'bannerData']);
Route::post('/ImgContactos/bannerData', [ImgContactosController::class, 'bannerData']);