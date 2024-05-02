<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;

Route::get('/', [UserController::class, "showCorrectHomepage"]);
// Route::get('/reservationForm', [TypesController::class, 'getTypes']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Route::get('/login', [UserController::class, 'showLoginPage']);

Route::post('/login', [UserController::class, 'login'])->name('login');


Route::post('/show-rooms', [ReservationController::class, 'showRooms'])->name('reservation.showRooms');

// Route to show the payment form
Route::get('/payment/{roomId}/{amount}', [PaymentController::class, 'showPaymentForm'])->name('payment.form');

// Route to process the payment
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('process.payment');

Route::post('/register', [UserController::class, 'register'])->middleware('guest');

Route::get('/rooms/{roomId}', [ReservationController::class, 'showRoomDetails'])->name('room.details');

Route::get('/dashboard', [AdminController::class, 'showDashboardPage'])->name('dashboard');

Route::get('/admin/add-form', [AdminController::class, 'showAddRoomForm'])->name('admin.add-room');

Route::post('/admin/store-room', [AdminController::class, 'storeRoom'])->name('admin.store_room');

Route::get('/admin/show-room-admin', [AdminController::class, 'manageRooms'])->name('manageRooms');

Route::delete('/admin/{room}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::get('/admin/{room}/edit', [AdminController::class, 'edit'])->name('admin.edit');

Route::post('admin/{room}', [AdminController::class, 'actuallyUpdate'])->name('admin.actuallyUpdate');

Route::get('/admin/add-type', [AdminController::class, 'addNewType'])->name('admin.addNewType');

Route::post('/dashboard', [AdminController::class, 'storeType'])->name('admin.store-type');