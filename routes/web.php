<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\ReservationController;

Route::get('/', [TypesController::class, 'getTypes']);
Route::post('/show-rooms', [ReservationController::class, 'showRooms'])->name('reservation.showRooms');
