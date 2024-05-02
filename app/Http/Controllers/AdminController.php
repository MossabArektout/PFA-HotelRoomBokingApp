<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Types;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboardPage(){
        $totalClients = User::count();
        $totalOrders = Payment::count();
        $totalRevenue = Payment::sum('amount');

        return view('dashboard-admin', compact('totalClients', 'totalOrders', 'totalRevenue'));
    }
    public function showAddRoomForm(){
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
             // Adjust the validation rules as needed
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

    public function edit(Reservation $room){
        $types = Types::all();
        return view('edit-form-admin', ['room' => $room, 'types' => $types]);
    }


    // update without the old ones
    // public function actuallyUpdate(Reservation $room, Request $request){
    //     $incomingFields = $request->validate([
    //         'numero' => 'required',
    //         'price' => 'required',
    //         'type' => 'required',
    //         'images' => 'nullable|array', // Images can be nullable as user might not upload new images
    //         'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);
    
    //     $room->update([
    //         'numero' => $incomingFields['numero'],
    //         'price' => $incomingFields['price'],
    //         'type' => $incomingFields['type']
    //     ]);
    
    //     // Handle image updates
    //     if ($request->hasFile('images')) {
    //         $imagePaths = [];
    
    //         foreach ($request->file('images') as $image) {
    //             $imageName = time() . '_' . $image->getClientOriginalName();
    //             $imagePath = $image->storeAs('public/images', $imageName); // Store the uploaded file to the storage folder
    //             $imagePaths[] = 'storage/' . str_replace('public/', '', $imagePath); // Store the image path in an array
    //         }
    
    //         // Convert the array of image paths to JSON
    //         $imageJson = json_encode($imagePaths);
    
    //         // Save the JSON string to the database
    //         $room->update(['images' => $imageJson]);
    //     }
    
    //     return redirect()->route('manageRooms');
    // }

    // update with the old ones
    public function actuallyUpdate(Reservation $room, Request $request){
        $incomingFields = $request->validate([
            'numero' => 'required',
            'price' => 'required',
            'type' => 'required',
            'images' => 'nullable|array', // Images can be nullable as user might not upload new images
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Merge old and new image paths
        $existingImages = json_decode($room->images, true) ?? [];
        $newImages = [];
    
        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('public/images', $imageName); // Store the uploaded file to the storage folder
                $newImages[] = 'storage/' . str_replace('public/', '', $imagePath); // Store the new image path in an array
            }
        }
    
        // Combine old and new image paths
        $combinedImages = array_merge($existingImages, $newImages);
    
        // Convert the array of image paths to JSON
        $imageJson = json_encode($combinedImages);
    
        // Update other fields of the room
        $room->update([
            'numero' => $incomingFields['numero'],
            'price' => $incomingFields['price'],
            'type' => $incomingFields['type'],
            'images' => $imageJson // Update images with the combined image paths
        ]);
    
        return redirect()->route('manageRooms');
    }
    
    public function addNewType(){
        return view('add-new-type-admin');
    }

    public function storeType(Request $request){
        $incomingFields = $request->validate([
            'type' => 'required|max:255',
            'number_of_rooms' => 'required',
            'number_of_beds' => 'required',
            'bathroom' => 'required',
            'balcony' => 'required',
            'workspace' => 'required',
            'TV' => 'required',
            'wifi' => 'required',
            'minibar' => 'required',
        ]);
    
        Types::create($incomingFields);
    
        return redirect()->route('dashboard');
    }
}