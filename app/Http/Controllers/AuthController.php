<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Log;
use App\Models\Users;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $inputEmail = $request->input('email');
        $inputPassword = $request->input('password');

        $user = Users::where('Email',$inputEmail)->first();

        if ($user && Hash::check($inputPassword, $user->password)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error','invalid email or password');
        }
    }
}
