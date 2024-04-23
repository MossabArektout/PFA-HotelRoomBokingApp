<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Types;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function showRooms(Request $request)
    {
        // Retrieve the submitted room type label from the request
        $roomTypeLabel = $request->input('room_type');

        // Use the room type label to fetch the corresponding type ID
        $typeId = Types::where('type', $roomTypeLabel)->value('id');

        // Use the retrieved type ID to fetch rooms
        $rooms = Reservation::where('id_feature', $typeId)->get();

        // Pass the rooms collection to the view
        return view('show-rooms', ['rooms' => $rooms]);
    }
}
