<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function resetPassword()
    {
        $user = User::where('email', 'app_empl@gmail.com')->first();
        if ($user) {
            $user->password = Hash::make('aaaaaa'); // Hacher le nouveau mot de passe
            $user->save();
            return "Mot de passe réinitialisé avec succès !";
        } else {
            return "Utilisateur non trouvé.";
        }
    }
}
