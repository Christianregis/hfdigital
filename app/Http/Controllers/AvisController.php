<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Avi;

class AvisController extends Controller
{
    public function store(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();
        if ($user && $user->role == "customer") {
            $avi = new Avi();
            $avi->name = $request->input('name');
            $avi->description = $request->input('description');
            $avi->star = $request->input('star');
            $avi->user_id = $user->id;
            $avi->save();

            return redirect()->route('avis',['slug'=>$user->slug])->with('success', 'Votre avis a été soumis avec succès.');
        }


        return redirect()->route('avis',['slug'=>$user->slug])->withErrors('Une erreur est survenue lors de la soumission de votre avis.');
    }
}
