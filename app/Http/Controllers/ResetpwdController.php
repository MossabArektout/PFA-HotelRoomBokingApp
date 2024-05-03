<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetpwdController extends Controller
{
    public function forgetPassword()
    {
        return view("forget-password");
    }

    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => "required|email",
        ]);

        $token = Str::random(64);

        DB::table("password_reset_tokens")->insert([
            "email" => $request->email,
            "token" => $token
        ]);

        Mail::send("forget-password-email", ['token' => $token], function ($message) use ($request) {
            $message->to($request->email)->subject('Reset Password');
        });
        return redirect()->to(route('showHomePage'))->with('success', 'We have sent you an email');
    }

    public function resetPassword($token)
    {
        return view('new-password', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);

        $upadetedPassword = DB::table('password_reset_tokens')->where(["email" => $request->email, "token" => $request->token])->first();

        if (empty($upadetedPassword)) {
            return redirect()->to(route('reset.password'))->with('error', 'invalid');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect('/')->with('success', 'Done');
    }
}