<?php

namespace App\Http\Controllers;

use App\Models\Types;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function showRooms(Request $request)
    {

        if (!Auth::check()) {
            // Redirect the user to the login page
            return redirect('/')->with('failure', 'Please, Log in first!');
        }

        $roomTypeLabel = $request->input('room_type');
        $typeId = Types::where('type', $roomTypeLabel)->value('id');

        $rooms = Reservation::where('id_feature', $typeId)->get();

        // Retrieve startdate and enddate from the request
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');

        foreach ($rooms as $room) {
            // Get all payments for this room
            $payments = Payment::where('room_id', $room->id)->get();

            $available = true;

            foreach ($payments as $payment) {
                // Check if the reservation dates overlap with the requested dates
                if ($payment->enddate >= $startdate && $payment->startdate <= $enddate) {
                    // If there's an overlap, mark the room as unavailable
                    $available = false;
                    break;
                }
            }

            // Update room availability based on the final determination
            $room->avalibility = $available ? 1 : 0;
            $room->save();
        }

        $types = Types::all();

        // Pass startdate and enddate to the view along with rooms
        return view('show-rooms', ['rooms' => $rooms, 'startdate' => $startdate, 'enddate' => $enddate, 'types' => $types]);
    }

    public function showRoomDetails($roomId, Request $request)
    {
        $room = Reservation::findOrFail($roomId);
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        return view('room_details', compact('room', 'startdate', 'enddate'));
    }

}