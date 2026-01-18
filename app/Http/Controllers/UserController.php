<?php

namespace App\Http\Controllers;

use App\Models\Avi;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{

    /**
     * Inscription utilisateur
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'string|max:255|required',
            'email' => 'email|required|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => bcrypt($validateData['password']),
            'role' => 'customer',
        ]);

        return redirect()->route('home')->with('success', "Inscription reussie !");
    }

    public function login(Request $request)
    {
        // logique pour se connecter
        $validateData = $request->validate([
            'email' => "email|required|max:255",
            'password' => "max:255|required|min:6",
        ]);

        $user = User::where('email', '=', $validateData['email'])->first();
        if ($user) {
            if (Hash::check($validateData['password'], $user->password)) {

                return redirect()->route('user.page', ['slug' => $user->slug]);
            } else {
                return redirect()->route('home')->withErrors('Email ou mot de passe invalide !');
            }
        }
        return redirect()->route('home')->withErrors('Email ou mot de passe invalide !');

    }

    public function userPage($slug)
    {
        // logique pour afficher la page utilisateur
        $user = User::where('slug', $slug)->firstOrFail();
        if (!$user) {
            return redirect()->route('home')->withErrors("Utilisateur non trouvé.");
        } else {
            if ($user->role == 'admin') {
                return view('admin.dashboard', [
                    "user" => $user,
                    "customer_count" => User::where("role", "=", "customer")->count(),
                    "customers" => User::where("role", "customer")->orderBy("created_at","desc")->get(),
                    "formation_count"=>Formation::count(),
                    "formations"=>Formation::orderBy('created_at','desc')->get(),
                    "avis_count"=>Avi::count(),
                    'avis'=>Avi::orderBy('created_at','desc')->get(),
                ]);

            } else {
                return view('customer.home', [
                    'formations'=>Formation::orderBy('created_at','desc')->limit(30)->get(),
                    'user'=>$user,
                ]);
            }
        }

    }

    /**
     * Supprimer un client
     * @param mixed $slug
     * @param mixed $customer_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($slug, $customer_id)
    {

        $user = User::where('slug', $slug)->firstOrFail();
        if ($user && $user->role == 'admin') {
            $customer = User::findOrFail($customer_id);
            if ($customer && $customer->role == 'customer') {
                $customer->delete();
                return redirect()->route('user.page', ['slug' => $user->slug])->with('success', 'Utilisateur supprimé avec succès.');
            } else {
                return redirect()->route('user.page', ['slug' => $user->slug])->withErrors('Utilisateur non trouvé ou non autorisé à être supprimé.');
            }
        } else {
            return redirect()->route('home')->withErrors('Action non autorisée.');
        }
    }
}


