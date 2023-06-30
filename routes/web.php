<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FolioController;
use App\Http\Controllers\MediosPagoController;
use App\Http\Controllers\EsquemaController;
use App\Http\Controllers\MonedaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    # Configuraciones iniciales de sistema
    Route::get('folio', [FolioController::class, 'index'])->name('folio.index');
    Route::get('folio/nuevo-folio', [FolioController::class, 'create'])->name('folio.create');
    Route::post('folio/guardar-folio', [FolioController::class, 'store'])->name('folio.store');
    Route::get('folio/{id}/editar-folio', [FolioController::class, 'edit'])->name('folio.edit');
    Route::put('folio/{id}/actualizar-folio', [FolioController::class, 'update'])->name('folio.update');
    Route::delete('folio/{id}/eliminar-folio', [FolioController::class, 'destroy'])->name('folio.destroy');

    Route::get('moneda', [MonedaController::class, 'index'])->name('moneda.index');
    Route::get('moneda/nuevo-moneda', [MonedaController::class, 'create'])->name('moneda.create');
    Route::post('moneda/guardar-moneda', [MonedaController::class, 'store'])->name('moneda.store');
    Route::get('moneda/{id}/editar-moneda', [MonedaController::class, 'edit'])->name('moneda.edit');
    Route::put('moneda/{id}/actualizar-moneda', [MonedaController::class, 'update'])->name('moneda.update');
    Route::delete('moneda/{id}/eliminar-moneda', [MonedaController::class, 'destroy'])->name('moneda.destroy');

    Route::get('medios-de-pago', [MediosPagoController::class, 'index'])->name('mediospago.index');
    Route::get('medios-de-pago/nuevo-medios-de-pago', [MediosPagoController::class, 'create'])->name('mediospago.create');
    Route::post('medios-de-pago/guardar-medios-de-pago', [MediosPagoController::class, 'store'])->name('mediospago.store');
    Route::get('medios-de-pago/{id}/editar-medios-de-pago', [MediosPagoController::class, 'edit'])->name('mediospago.edit');
    Route::put('medios-de-pago/{id}/actualizar-medios-de-pago', [MediosPagoController::class, 'update'])->name('mediospago.update');
    Route::delete('medios-de-pago/{id}/eliminar-medios-de-pago', [MediosPagoController::class, 'destroy'])->name('mediospago.destroy');
    
    Route::get('esquema', [EsquemaController::class, 'index'])->name('esquema.index');
    Route::get('esquema/nuevo-esquema', [EsquemaController::class, 'create'])->name('esquema.create');
    Route::post('esquema/guardar-esquema', [EsquemaController::class, 'store'])->name('esquema.store');
    Route::get('esquema/{id}/editar-esquema', [EsquemaController::class, 'edit'])->name('esquema.edit');
    Route::put('esquema/{id}/actualizar-esquema', [EsquemaController::class, 'update'])->name('esquema.update');
    Route::delete('esquema/{id}/eliminar-esquema', [EsquemaController::class, 'destroy'])->name('esquema.destroy');
});


require __DIR__.'/auth.php';
