<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'home'], 200);
});

Route::get('/collaborators', function () {
    return response()->json([], 200);
});

Route::get('/collaborators/create', function () {
    return response()->json([], 200);
});

Route::get('/collaborators/{id}', function ($id) {
    return response()->json([], 200);
});

Route::get('/collaborators/{id}/edit', function ($id) {
    return response()->json([], 200);
});

Route::post('/collaborators', function () {

    if (empty(request()->all())) {
        return response()->json([], 422);
    }

    return response()->json([], 201);
});

Route::put('/collaborators/{id}', function ($id) {
    return response()->json([], 200);
});

Route::delete('/collaborators/{id}', function ($id) {
    return response()->json([], 200);
});

Route::patch('/collaborators/{id}/deactivate', function ($id) {
    return response()->json([], 200);
});