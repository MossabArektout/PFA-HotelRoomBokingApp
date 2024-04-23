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
}
