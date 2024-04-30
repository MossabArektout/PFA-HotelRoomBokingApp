<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Route to handle webhook events from Stripe
Route::post('/stripe/webhook', [PaymentController::class, 'handleWebhook'])->name('stripe.webhook');

Route::post('/register', [UserController::class, 'register'])->middleware('guest');

Route::get('/rooms/{roomId}', [ReservationController::class, 'showRoomDetails'])->name('room.details');