<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentForm($roomId, $amount)
{
    return view('payment', compact('roomId', 'amount'));
}

    // public function processPayment(Request $request)
    // {
    //     // Retrieve roomId and amount from the request
    //     $roomId = $request->input('roomId');
    //     $amount = $request->input('amount');
    
    //     // Create a new payment record
    //     $paymentData = [
    //         'room_id' => $roomId,
    //         'amount' => $amount,
    //     ];
    
    //     $payment = Payment::create($paymentData);
    
    //     // Optionally, you can return the created payment record as a response
    //     return 'parfait';
    // }

    public function processPayment(Request $request)
{
    // Retrieve roomId from the request
    $roomId = $request->input('roomId');
    $amount = $request->input('amount');

    // Create a new payment record
    $paymentData = [
        'room_id' => $roomId,
        'amount' => $amount,
    ];

    $payment = Payment::create($paymentData);

    // Update the availability status of the room to 0
    $room = Reservation::find($roomId);
    $room->avalibility = 0;
    $room->save();

    // Optionally, you can return a success message or redirect to a success page
    return 'parfait';
}
}
