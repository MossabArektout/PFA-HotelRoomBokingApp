<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function getTypes(Types $types){
        $types = Types::all();
        return view('reservationForm' , ['types' => $types]);
    }

    public function getFearures(Types $types){
        $types = Types::all();
    
        // Initialize an empty array to store the names of the features that are true
        $filteredFeatures = [];
    
        // Get the column names representing features
        $featureColumns = array_keys($types->first()->getAttributes());
    
        // Filter the features based on their values
        foreach ($featureColumns as $column) {
            if ($column !== 'id' && $column !== 'type' && $types->first()->$column) {
                // Exclude 'id' and 'type' columns and add the name of the feature to the $filteredFeatures array if its value is true
                $filteredFeatures[] = ucfirst(str_replace('_', ' ', $column)); // Convert snake_case column name to Title Case
            }
        }
    
        // Pass the filtered features to the view
        return view('show-rooms', ['features' => $filteredFeatures]);
    }
    
}