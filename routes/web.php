<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolioController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\MonedaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EsquemaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubgrupoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MediosPagoController;

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
    Route::post('folio/{id}/desactivar-folio', [FolioController::class, 'destroy'])->name('folio.destroy');
    Route::post('folio/{id}/activar-folio', [FolioController::class, 'active'])->name('folio.active');

    Route::get('moneda', [MonedaController::class, 'index'])->name('moneda.index');
    Route::get('moneda/nuevo-moneda', [MonedaController::class, 'create'])->name('moneda.create');
    Route::post('moneda/guardar-moneda', [MonedaController::class, 'store'])->name('moneda.store');
    Route::get('moneda/{id}/editar-moneda', [MonedaController::class, 'edit'])->name('moneda.edit');
    Route::put('moneda/{id}/actualizar-moneda', [MonedaController::class, 'update'])->name('moneda.update');
    Route::post('moneda/{id}/desactivar-moneda', [MonedaController::class, 'destroy'])->name('moneda.destroy');
    Route::post('moneda/{id}/activar-moneda', [MonedaController::class, 'active'])->name('moneda.active');

    Route::get('medios-de-pago', [MediosPagoController::class, 'index'])->name('mediospago.index');
    Route::get('medios-de-pago/nuevo-medios-de-pago', [MediosPagoController::class, 'create'])->name('mediospago.create');
    Route::post('medios-de-pago/guardar-medios-de-pago', [MediosPagoController::class, 'store'])->name('mediospago.store');
    Route::get('medios-de-pago/{id}/editar-medios-de-pago', [MediosPagoController::class, 'edit'])->name('mediospago.edit');
    Route::put('medios-de-pago/{id}/actualizar-medios-de-pago', [MediosPagoController::class, 'update'])->name('mediospago.update');
    Route::post('medios-de-pago/{id}/desactivar-medio-de-pago', [MediosPagoController::class, 'destroy'])->name('mediospago.destroy');
    Route::post('medios-de-pago/{id}/activar-medio-de-pago', [MediosPagoController::class, 'active'])->name('mediospago.active');
    
    Route::get('esquema', [EsquemaController::class, 'index'])->name('esquema.index');
    Route::get('esquema/nuevo-esquema', [EsquemaController::class, 'create'])->name('esquema.create');
    Route::post('esquema/guardar-esquema', [EsquemaController::class, 'store'])->name('esquema.store');
    Route::get('esquema/{id}/editar-esquema', [EsquemaController::class, 'edit'])->name('esquema.edit');
    Route::put('esquema/{id}/actualizar-esquema', [EsquemaController::class, 'update'])->name('esquema.update');
    Route::post('esquema/{id}/desactivar-esquema', [EsquemaController::class, 'destroy'])->name('esquema.destroy');
    Route::post('esquema/{id}/activar-esquema', [EsquemaController::class, 'active'])->name('esquema.active');


    Route::get('grupo', [GrupoController::class, 'index'])->name('grupo.index');
    Route::get('grupo/nuevo-grupo', [GrupoController::class, 'create'])->name('grupo.create');
    Route::post('grupo/guardar-grupo', [GrupoController::class, 'store'])->name('grupo.store');
    Route::get('grupo/{id}/editar-grupo', [GrupoController::class, 'edit'])->name('grupo.edit');
    Route::put('grupo/{id}/actualizar-grupo', [GrupoController::class, 'update'])->name('grupo.update');
    Route::post('grupo/{id}/desactivar-grupo', [GrupoController::class, 'destroy'])->name('grupo.destroy');
    Route::post('grupo/{id}/activar-grupo', [GrupoController::class, 'active'])->name('grupo.active');

    Route::get('subgrupo', [SubgrupoController::class, 'index'])->name('subgrupo.index');
    Route::get('subgrupo/nuevo-subgrupo', [SubgrupoController::class, 'create'])->name('subgrupo.create');
    Route::post('subgrupo/guardar-subgrupo', [SubgrupoController::class, 'store'])->name('subgrupo.store');
    Route::get('subgrupo/{id}/editar-subgrupo', [SubgrupoController::class, 'edit'])->name('subgrupo.edit');
    Route::put('subgrupo/{id}/actualizar-subgrupo', [SubgrupoController::class, 'update'])->name('subgrupo.update');
    Route::post('subgrupo/{id}/desactivar-subgrupo', [SubgrupoController::class, 'destroy'])->name('subgrupo.destroy');
    Route::post('subgrupo/{id}/activar-subgrupo', [SubgrupoController::class, 'active'])->name('subgrupo.active');

    Route::get('empresa', [EmpresaController::class, 'index'])->name('empresa.index');
    Route::get('empresa/nueva-empresa', [EmpresaController::class, 'create'])->name('empresa.create');
    Route::post('empresa/guardar-empresa', [EmpresaController::class, 'store'])->name('empresa.store');
    Route::get('empresa/{id}/editar-empresa', [EmpresaController::class, 'edit'])->name('empresa.edit');
    Route::put('empresa/{id}/actualizar-empresa', [EmpresaController::class, 'update'])->name('empresa.update');
    Route::post('empresa/{id}/desactivar-empresa', [EmpresaController::class, 'destroy'])->name('empresa.destroy');
    Route::post('empresa/{id}/activar-empresa', [EmpresaController::class, 'active'])->name('empresa.active');

    Route::get('proveedor', [ProveedorController::class, 'index'])->name('proveedor.index');
    Route::get('proveedor/nuevo-proveedor', [ProveedorController::class, 'create'])->name('proveedor.create');
    Route::post('proveedor/guardar-proveedor', [ProveedorController::class, 'store'])->name('proveedor.store');
    Route::get('proveedor/{id}/editar-proveedor', [ProveedorController::class, 'edit'])->name('proveedor.edit');
    Route::put('proveedor/{id}/actualizar-proveedor', [ProveedorController::class, 'update'])->name('proveedor.update');
    Route::post('proveedor/{id}/desactivar-proveedor', [ProveedorController::class, 'destroy'])->name('proveedor.destroy');
    Route::post('proveedor/{id}/activar-proveedor', [ProveedorController::class, 'active'])->name('proveedor.active');

    Route::get('cliente', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('cliente/nuevo-cliente', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('cliente/guardar-cliente', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('cliente/{id}/editar-cliente', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::put('cliente/{id}/actualizar-cliente', [ClienteController::class, 'update'])->name('cliente.update');
    Route::post('cliente/{id}/desactivar-cliente', [ClienteController::class, 'destroy'])->name('cliente.destroy');
    Route::post('cliente/{id}/activar-cliente', [ClienteController::class, 'active'])->name('cliente.active');
});


require __DIR__.'/auth.php';
