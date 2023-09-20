<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class InscriptionController extends Controller
{

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',   // j'impose des règles : champ requis, maximum 255 caractères
            'email' => [                    // j'impose des règles : champ requis, "@" requis, maximum 50 caractères
                'required',
                'email',
                'max:50',
                function ($attribute, $value, $fail) {
                    // si le nom de domaine n'existe pas dans la valeur
                    if (!preg_match('/@.*\..+/', $value)) {
                        // on renverrai une erreur
                        $fail('L\'email doit contenir un nom de domaine valide.');
                    }
                },
            ],                         
            'password' => [
                'required',  // j'impose des règles : champ requis, minimum 8 caractères, champ "password_confirmatio" est associé avec
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*?&])[A-Za-z0-9@$!%*?&]{8,}$/',
                // nous utilisons la regex /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+/ qui vérifie les conditions suivantes :
                // (?=.*[a-z]) : Il y a au moins une lettre minuscule.
                // (?=.*[A-Z]) : Il y a au moins une lettre majuscule.
                // (?=.*[0-9]) : Il y a au moins un chiffre.
                // (?=.*[@$!%*?&]) : Il y a au moins un caractère spécial parmi @, $, !, %, *, ?, &.
                // [A-Za-z\d@$!%*?&]+ : La chaîne contient uniquement des caractères alphanumériques et spéciaux.
            ],
        ],
        [
            'password.regex' => 'Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre et un caractère spécial.',
        ]);


        // Vérifier si l'utilisateur existe déjà dans la base de données
        $existingUser = User::where('email', $validatedData['email'])->first();

        if ($existingUser) {
            // L'utilisateur existe déjà, ajoutez une erreur personnalisée
            return redirect()->back()->with('error-session', 'Cet e-mail existe déjà.');
        }

        // Créer un nouvel utilisateur et enregistrer dans la base de données
        $user = new User();                                              // j'instancie la class User
        $user->name = $validatedData['name'];                            // je valide le champs name
        $user->email = $validatedData['email'];                          // je valide le champs email
        $user->password = Hash::make($validatedData['password']); // je valide le champs password avec la fonction Hash pour hasher
        $user->save();

        event(new Registered($user));

        // Après avoir enregistré l'utilisateur avec succès
        return redirect()->route('inscription.success');
    }
}
