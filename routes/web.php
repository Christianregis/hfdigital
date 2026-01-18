<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Models\Publication;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\ImmoController;
use App\Models\Promo;
use App\Models\Conseil;
use App\Http\Controllers\ConseilController;

Route::get('/', function () {
    return view('welcome',[
        'posts'=>Publication::orderBy('created_at', 'desc')->limit(3)->get(),
        'products'=> Product::orderBy('created_at','desc')->limit(20)->get(),
        'conseils' => Conseil::orderBy('created_at', 'desc')->limit(5)->get()
    ]);
})->name('home');

Route::get('/import',function () {
    return view('import');
})->name('import');

Route::get('/export',function () {
    return view('export');
})->name('export');

Route::get('/conseil',function () {
    return view('conseil',[
        'conseils' => Conseil::orderBy('created_at','desc')->get(),
    ]);
})->name('conseil');

Route::get('/partenaires',function () {
    return view('partenaires');
})->name('partenaires');

Route::get('/avis',function () {
    return view('avis');
})->name('avis');

Route::get('/propos',function () {
    return view('propos');
})->name('propos');

Route::get('/allProducts',function(){
    return view('allProducts', [
        'products' => Product::all(),
        'posts' => Publication::orderBy("created_at", "desc")->limit(3)->get(),
    ]);
})->name('allProducts');

// Route pour afficher la page des annonces immobilières
Route::get('/immo',[ImmoController::class,'index'])->name('immo');

// Route pour ajouter une annonce immobilière (Admin uniquement)
Route::post('/profil/{slug}/immo/addImmo',[ImmoController::class,'addImmo'])->name('admin.immo.addImmo');

// Route pour supprimer une annonce immobilière (Admin uniquement)
Route::get('/profil/{slug}/immo/delete-{id}',[ImmoController::class,'destroy'])->name('admin.immo.deleteImmo');

// Route pour ajouter une annonce immobilière (Admin uniquement)
Route::post('/profil/{slug}/conseil/addConseil',[ConseilController::class,'addConseil'])->name('admin.conseil.addConseil');

// Route pour supprimer une annonce immobilière (Admin uniquement)
Route::get('/profil/{slug}/conseil/delete-{id}',[ConseilController::class,'destroy'])->name('admin.conseil.deleteConseil');

// Route pour ajouter un collaborateur
Route::post('/profil/{slug}/collaborateur/addCollaborateur',[CollaboratorController::class,'store'])->name('admin.collaborator.addCollaborator');

// Route pour afficher la page des collaborateurs
Route::get('/collaborateur',[CollaboratorController::class,'index'])->name('collaborateur');

// Route pour supprimer un collaborateur (Admin uniquement)
Route::get('/profil/{slug}/collaborateur/delete-{id}',[CollaboratorController::class,'destroy'])->name('admin.collaborateur.delete');

// Route pour afficher le formulaire d'inscription - connexion
Route::get('/login',[UserController::class,'showloginForm'])->name('showLogInForm');

// Route pour se connecter
Route::post('/connexion',[UserController::class,'login'])->name('connexion');

// Route pour s'inscrire
Route::post('/inscription',[UserController::class,'register'])->name('inscription');

// Route pour afficher le page de l'utilisateur selon le role
Route::get('/profil/{slug}',[UserController::class,'showUserPage'])->name('user.page');

// Route pour ajouter un produit (accessible uniquement par les admins)
Route::post('/profil/{slug}/addproduct', [ProductController::class, 'store'])->name('admin.addProduct');

// Route pour mettre a jour un produit
Route::post('/profil/{slug}/editProduct-{product_id}',[ProductController::class,'edit'])->name('admin.product.editProduct');

// Route pour supprimer un produit (admin uniquemenent)
Route::get('/profil/{slug}/deleteProduct/{product_id}',[ProductController::class,'delete'])->name('admin.product.deleteProduct');

// Route pour supprimer un utilisateur (accessible uniquement par les admins)
Route::get('/profil/{slug}/deleteUser-{user_all_id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

// Route pour ajouter une publication (accessible uniquement par les admins)
Route::post('/profil/{slug}/addPublication', [PublicationController::class, 'addPublication'])->name('admin.addPublication');

// Route pour editer une publication
Route::post('/profil/{slug}/editPost-{post_id}',[PublicationController::class,'edit'])->name('admin.post.editPost');

// Route pour supprimer une publication
Route::get('/profil/{slug}/deletePost-{post_id}',[PublicationController::class,'delete'])->name('admin.post.deletePost');

// Route pour ajouter une promo (accessible uniquement par les admins)
Route::post('/profil/{slug}/addPromo', [PromoController::class, 'addPromo'])->name('admin.addPromo');

// Route pour editer une promo
Route::post('/profil/{slug}/editPromo-{post_id}',[PromoController::class,'edit'])->name('admin.promo.editPromo');

// Route pour supprimer une promo
Route::get('/profil/{slug}/deletePromo-{post_id}',[PromoController::class,'delete'])->name('admin.promo.deletePromo');


// Route pour ajouter une commande
Route::post('/profil/{slug}/addOrder',[OrderController::class,'store'])->name('customer.order.AddOrder');

// Route pour exporter l'ensemble des commandes
Route::get('/profil/{slug}/exportOrders',[OrderController::class,'export'])->name('admin.orders.exportOrders');

// Route pour ajouter une commande
Route::get('/profil/{slug}/showOrderWithUser',[OrderController::class,'showOrderWithUser'])->name('customer.order.showOrder');

// Route pour mettre a jour l'etat d'une commande
Route::get('/profil/{slug}/withOrder-{order_id}/status={status}',[OrderController::class,'edit'])->name('admin.order.editOrder');
