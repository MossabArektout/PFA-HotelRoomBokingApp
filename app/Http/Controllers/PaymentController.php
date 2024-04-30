<?php

namespace App\Http\Controllers;

use App\Models\Types;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

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
        // Retrieve roomId and amount from the request
        $roomId = $request->input('roomId');
        $amount = $request->input('amount');

        // Retrieve authenticated user
        $user = Auth::user();

        // Retrieve room and reservation information
        $room = Reservation::where('id', $roomId)->firstOrFail();
        // dd($room);

        $type = Types::where('id', $room->id_feature)->firstOrFail();

        // Generate PDF
        $pdf = Pdf::loadView('invoice', ['user' => $user, 'room' => $room, 'type' => $type]);

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
            'pdf_path' => 'pdf/' . $pdfFileName, // Optional: Save the path to the PDF in the database
        ];

        $payment = Payment::create($paymentData);

        // Update the availability status of the room to 0
        $room->avalibility = 0; // Assuming the column name is 'availability', adjust if needed
        $room->save();

        // Optionally, you can return a success message or redirect to a success page
        return 'Payment successful. PDF generated: <a href="' . url('pdf/' . $pdfFileName) . '">Download PDF</a>';
}
}