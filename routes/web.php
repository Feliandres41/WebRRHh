<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return response()->json(['ok'=>true],200);
});
Route::middleware(['role:RRHH'])->group(function () {

    // COLABORADORES
    Route::get('/collaborators', fn() => response()->json([],200));
    Route::get('/collaborators/{id}', fn() => response()->json([],200));
    Route::post('/collaborators', fn() => request()->all()? response()->json([],201):response()->json([],422));
    Route::put('/collaborators/{id}', fn() => response()->json([],200));
    Route::delete('/collaborators/{id}', fn() => response()->json([],200));
    Route::patch('/collaborators/{id}/deactivate', fn() => response()->json([],200));

    // CONTRATOS
    Route::get('/contracts', fn() => response()->json([],200));
    Route::get('/contracts/{id}', fn() => response()->json([],200));
    Route::get('/contracts/create', fn() => response()->json([],200));
    Route::post('/contracts', fn() => request()->all()? response()->json([],201):response()->json([],422));

    // PRORROGAS
    Route::get('/contracts/{id}/extensions/create', fn() => response()->json([],200));
    Route::post('/contracts/{id}/extensions', fn() => request()->all()? response()->json([],201):response()->json([],422));

    // TERMINACION
    Route::patch('/contracts/{id}/terminate', fn() => request()->all()? response()->json([],200):response()->json([],422));

});