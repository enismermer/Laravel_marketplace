<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProductsController;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/categories', [CategoriesController::class, 'index']);

Route::resource('products', ProductsController::class);






// Route pour diriger vers la vue layout
Route::get('/auth-layout',function() {
    return view('auth.layout');
});

// Route pour afficher le formulaire d'inscription et de connexion
Route::get('/inscription-connexion', function() {
    return view('auth.inscription-connexion');
})->name('inscription-connexion');


// Route pour traiter le formulaire d'inscription
Route::post('/inscription', [InscriptionController::class, 'register'])->name('inscription');


// Route pour diriger vers la vue de succès d'inscription
Route::get('/inscription-success', function() {
    return view('auth.inscription-success');
})->name('inscription.success');




Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/connexion', [ConnexionController::class, 'ShowLoginForm'])->name('connexion');
});

// Ca permet d'activer la vérification par e-mail dans Laravel en générant automatiquement les routes et les vues nécessaires pour gérer le processus de vérification par e-mail lors de l'inscription des utilisateurs.
// Auth::routes(['verify' => true]);


// ce type de requête "EmailVerificationRequest" va se charger automatiquement de valider les requêtes id et hash (les paramètres)
// la méthode "fullfill()" va appeler la méthode "markEmailAsVerified" sur l'utilisateur authentifié et distribuera l'événement "Illuminate\Auth\Events\Verified"
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


// Route pour diriger vers la vue de Home
Route::get('/home', [HomeController::class, 'index'])->name('home');







// Route pour traiter le formulaire de connexion
Route::post('/connexion', [ConnexionController::class, 'login'])->name('connexion');



// Route pour déconnecter
Route::post('/logout', [ConnexionController::class, 'logout'])->name('logout');