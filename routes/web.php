<?php

use App\Http\Controllers\UserController;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\AvisController;

Route::get('/', function () {
    return view('welcome',[
        'formations'=>Formation::orderBy('created_at','desc')->limit(30)->get()
    ]);
})->name('home');


// Route pour l'inscription
Route::post('/register',[UserController::class,'register'])->name('register');

Route::get('formation/{formation_id}',[FormationController::class,'showFormation'])->name('showFormation');

// Route pour la page d'a propos (Non connecté)
Route::get('/propos', function () {
    return view('propos');
})->name('propos');

// Route pour la page d'avis (Non connecté)
Route::get('/avis/{slug}', function ($slug) {
    return view('avis',[
        'user'=>User::where('slug', $slug)->first()
    ]);
})->name('avis');

// Route pour la soumission d'avis
Route::post('/avis/submit/{slug}', [AvisController::class, 'store'])->name('avis.submitAvis');

// Route pour la page de contact (Non connecté)
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Route pour la page de contact (Non connecté)
Route::get('/partenaire', function () {
    return view('partenaires');
})->name('partenaires');

// Route pour la connexion
Route::post('/login',[UserController::class,'login'])->name('login');

// Route pour la page utilisateur
Route::get('/profil/{slug}', [UserController::class, 'userPage'])->name('user.page');

// Route pour supprimer un client
Route::get("profil/{slug}/admin/customer/deleteCustomer-{customer_id}",[UserController::class,"deleteUser"])->name('admin.customer.deleteCustomer');

// Route pour ajouter une formation
Route::post("profil/{slug}/admin/addFormation",[FormationController::class,"store"])->name('admin.formation.addFormation');

// Route pour supprimer une formation
Route::get("profil/{slug}/admin/formation/deleteFormation-{formation_id}",[FormationController::class,"deleteFormation"])->name('admin.formation.deleteFormation');

// Afficher les formation selon le code d'accès
Route::get('/formations/codeAccess/', [FormationController::class, 'showFormationWithCode'])->name('formation.showByCode');

// Afficher toutes les formations
Route::get('/formations/allFormation', [FormationController::class, 'showAllFormations'])->name('formation.showAll');
