<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;

Route::get('/', [TypesController::class, 'getTypes']);
Route::post('/show-rooms', [ReservationController::class, 'showRooms'])->name('reservation.showRooms');

// Route to show the payment form
Route::get('/payment/{roomId}/{amount}', [PaymentController::class, 'showPaymentForm'])->name('payment.form');

// Route to process the payment
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('process.payment');

// Route to handle webhook events from Stripe
Route::post('/stripe/webhook', [PaymentController::class, 'handleWebhook'])->name('stripe.webhook');

