<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('vehicle')->group(function () {
    //VISTA PARA CREAR
    Route::get('create', function () {
        return view('/vehicles/create');
    });
    //VISTA PARA EDITAR
    Route::put('delete/{id}', [VehicleController::class, 'delete']);
    Route::get('update/{id}', [VehicleController::class, 'edit']);
    //METODOS
    Route::get('', [VehicleController::class, 'all']);
    Route::put('{id}', [VehicleController::class, 'update']);
    //Route::get('{id}', [VehicleController::class, 'show']);
    Route::post('', [VehicleController::class, 'store']);
});

