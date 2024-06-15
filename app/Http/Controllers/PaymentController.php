<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Types;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function showPaymentForm($roomId, $amount, Request $request)
{
    $room = Reservation::findOrFail($roomId);
    $startdate = $request->input('startdate');
    $enddate = $request->input('enddate');
    return view('payment', compact('room', 'amount', 'startdate', 'enddate'));
}

public function processPayment(Request $request)
{
    $roomId = $request->query('roomId');
    $amount = $request->query('amount');
    $user = Auth::user();
    $startdate = $request->query('startdate');
    $enddate = $request->query('enddate');

    //calculate the timeline
    $start = new DateTime($startdate);
    $end = new DateTime($enddate);

    // Calculate the difference between the two dates
    $interval = $start->diff($end);

    // Get the number of days as an integer
    $days = $interval->days;

    $amount = $amount * $days;
    

    // Retrieve room and reservation information
    $room = Reservation::where('id', $roomId)->firstOrFail();

    $type = Types::where('id', $room->id_feature)->firstOrFail();

    // Generate PDF
    $pdf = Pdf::loadView('invoice', ['user' => $user, 'room' => $room, 'type' => $type, 'startdate' => $startdate, 'enddate' => $enddate, 'amount'=>$amount]);

    // Save or stream PDF
    $pdfFileName = 'invoice_' . time() . '.pdf'; // You can customize the file name
    $pdf->save(public_path('pdf/' . $pdfFileName)); // Save PDF to a public directory
    // Or you can stream the PDF directly to the browser:
    // return $pdf->stream();

    // Create a new payment record with user_id
    $paymentData = [
        'room_id' => $roomId,
        'amount' => $amount,
        'user_id' => $user->id,
        'startdate' => $startdate,
        'enddate' => $enddate,
        'pdf_path' => 'pdf/' . $pdfFileName, // Optional: Save the path to the PDF in the database
    ];

    $payment = Payment::create($paymentData);

    // Update the availability status of the room to 0
    $room->avalibility = 0; // Assuming the column name is 'availability', adjust if needed
    $room->save();

    // Optionally, you can return a success message or redirect to a success page
    return view('payment-done', ['pdfFileName' => $pdfFileName]);
}
}