<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',                        // j'impose des règles : champs requis, @ requis, .com requis à la fin
            'password' => 'required',                           // j'impose une règle : champs requis
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            
            return redirect('/home');                       // Authentification réussie, rediriger vers la page d'accueil
        
        } else {
            
            return back()->withInput()->withErrors([
                'email-connexion' => 'Email ou mot de passe incorrect ou inexistant',
            ]);                                                 // Si l'authentification échoue, un message d'erreur apparaît pour l'email ou le mot de passe
        }
    }

    public function logout()
    {
        Auth::logout();                                    // on utilise la façade Auth pour déconnecter l'utilisateur en effaçant sa session

        return redirect('/inscription-connexion');                // Redirigez l'utilisateur vers la page de connexion
    }
}

