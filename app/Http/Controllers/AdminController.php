<?php

namespace App\Http\Controllers;

use App\Models\Types;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboardPage(){
        $types = Types::all();
        return view('addroom', ['types' => $types]);
    }

public function storeRoom(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'numero' => 'required|string|max:255',
        'price' => 'required|numeric', // Ensure 'price' is provided and numeric
        'type' => 'required|string',
        'images' => 'required|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Adjust the validation rules as needed
    ]);

    // Create a new Reservation instance and store it in the database
    $type = Types::where('type', $request->type)->first();
    if (!$type) {
        // Handle the case where the provided type does not exist
        return back()->withErrors(['type' => 'The selected type is invalid.']);
    }

    // Create a new Reservation instance and store it in the database
    $reservation = Reservation::create([
        'numero' => $request->numero,
        'price' => $request->price,
        'id_feature' => $type->id, // Use the fetched type ID
    ]);

    // Handle image upload and storage here
    if ($request->hasFile('images')) {
        $imagePaths = [];
    
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/images', $imageName); // Store the uploaded file to the storage folder
            $imagePaths[] = 'storage/' . str_replace('public/', '', $imagePath); // Store the image path in an array
        }
    
        // Convert the array of image paths to JSON
        $imageJson = json_encode($imagePaths);
    
        // Save the JSON string to the database
        $reservation->update(['images' => $imageJson]);
    }

    // Redirect back with success message
    return 'good';
}

public function manageRooms(){
    $rooms = Reservation::all();
    return view('show-rooms-admin', compact('rooms'));
}

// public function showRooms()
//     {
//         $rooms = Reservation::all();
//         return view('show-rooms-admin', compact('rooms'));
//     }

public function destroy(Reservation $room){
    $room->delete();

    return redirect()->route('manageRooms');
}

}