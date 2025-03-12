<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    // public function handleLogin(AuthRequest $request)
    // {
    //     $credentials = $request->only(['email', 'password']);

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->route('dashboard');
    //     } else {
    //         return redirect()->back()->with('error_msg', 'Paramètre de connexion non reconnu');
    //     }
    // }
    public function handleLogin(AuthRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        Log::info('Tentative de connexion avec les identifiants', $credentials);

        // Récupérer l'utilisateur par email
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            Log::info('Connexion réussie');
            return redirect()->route('dashboard');
        } else {
            Log::info('Connexion échouée');
            return redirect()->back()->with('error_msg', 'Paramètre de connexion non reconnu');
        }
    }

}
