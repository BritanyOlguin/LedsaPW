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
use App\Http\Controllers\ImgNosotrosController;
use App\Http\Controllers\MisionController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\ValoresController;
use App\Http\Controllers\ImgValoresController;
use App\Http\Controllers\ImgMisionController;
use App\Http\Controllers\ImgVisionController;


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
        'ImgNosotros' => ImgNosotrosController::class,
        'Mision' => MisionController::class,
        'Vision' => VisionController::class,
        'Historia' => HistoriaController::class,
        'Valores' => ValoresController::class,
        'ImgValores' => ImgValoresController::class,
        'ImgMision' => ImgMisionController::class,
        'ImgVision' => ImgVisionController::class,
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
Route::post('/ImgNosotro', [ImgNosotrosController::class, 'bannerDataNew']);
Route::post('/Mis', [MisionController::class, 'bannerDataNew']);
Route::post('/Vis', [VisionController::class, 'bannerDataNew']);
Route::post('/Histor', [HistoriaController::class, 'bannerDataNew']);
Route::post('/ImgVal', [ImgValoresController::class, 'bannerDataNew']);
Route::post('/ImgMis', [ImgMisionController::class, 'bannerDataNew']);
Route::post('/ImgVis', [ImgVisionController::class, 'bannerDataNew']);

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
Route::post('/ImgNosotros/bannerData', [ImgNosotrosController::class, 'bannerData']);
Route::post('/Mision/bannerData', [MisionController::class, 'bannerData']);
Route::post('/Vision/bannerData', [VisionController::class, 'bannerData']);
Route::post('/Historia/bannerData', [HistoriaController::class, 'bannerData']);
Route::post('/Valores/bannerData', [ValoresController::class, 'bannerData']);
Route::post('/ImgValores/bannerData', [ImgValoresController::class, 'bannerData']);
Route::post('/ImgMision/bannerData', [ImgMisionController::class, 'bannerData']);
Route::post('/ImgVision/bannerData', [ImgVisionController::class, 'bannerData']);