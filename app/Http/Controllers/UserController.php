<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Types;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request->validate([
            'firstname' => ['required', 'min:3', 'max:20'],
            'lastname' => ['required', 'min:3', 'max:20'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $incomingFpields['password'] = bcrypt($incomingFields['password']);

        $user = User::create($incomingFields);
        // auth() -> login($user);
        return redirect('/') -> with('success', 'Thank you for creating an account, Please Login');
    }
    
    public function showCorrectHomepage(Types $types){
        $types = Types::all();
        $randomRooms = Reservation::inRandomOrder()->limit(3)->get(); // Fetch three random rooms
        return view('homepage', ['types' => $types, 'randomRooms' => $randomRooms]);
    }

    public function logout(){
        auth()->logout();
        return redirect('/') -> with('success','You are logged out.');
    }

    public function login(Request $request){
        // dd($request);
        $incomingFields = $request -> validate([
            'email' => 'required',
            'password' => 'required' 
        ]);

        if (auth() -> attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
            $request -> session() -> regenerate();
            return redirect('/') -> with("success","You have successfully logged in. ");
        } else {
            return redirect('/') -> with('failure', 'Invalid login.');
        }
    }

    public function showLoginPage(){
        return view('login');
    }
}