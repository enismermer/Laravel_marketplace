<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();           // Récupère l'utilisateur actuellement authentifié

        return view('auth.home', ['user' => $user]);   // je renvoie la vue : views/auth/home.blade.php, en important la donnée $user 
    }
}
