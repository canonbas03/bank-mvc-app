<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // public function showRegister()
    // {
    //     return view('auth.register');
    // }

    // public function showWorkerRegister()
    // {
    //     return view('worker.register');
    // }

    public function showLogin()
    {
        return view('auth.login');
    }

    // public function register(Request $request)
    // {
    //     $validated = $request->validate([
    //         'firstName' => 'required|string|max:255',
    //         'lastName' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //         'role' => 'required|string'
    //     ]);

    //     $user = User::create($validated);

    //     return view('auth.register');
    //     //Auth::login($user);
    // }

    // public function registerWorker(Request $request)
    // {
    //    
    // }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            return match ($role) {
                'admin' => redirect()->route('workers.index'),
                'worker' => redirect()->route('clients.index'),
                'client' => redirect()->route('clients.dashboard'),
            };
        }

        throw ValidationException::withMessages([
            'credentials' => 'Sorry, incorrect credentials.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }
}
