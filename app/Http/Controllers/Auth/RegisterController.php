<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'nullable|in:staff,relawan',
            'he_qi' => 'required|string',
        ]);

        $heQiArray = array_map('trim', explode(',', $validated['he_qi']));
        $heQiJson = json_encode($heQiArray);
        $role = $validated['role'] ?? 'relawan'; // default relawan

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $role,
            'he_qi' => $heQiJson,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }
}
