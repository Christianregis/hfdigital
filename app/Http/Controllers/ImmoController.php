<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Immo;
use App\Models\User;

class ImmoController extends Controller
{
    public function index()
    {
        return view('immo',[
            'immos' => Immo::all(),
        ]);
    }

    public function addImmo(Request $request, $slug)
    {
        $user = User::where('slug', '=', $slug)->first();
        if (!$user || $user->role != 'admin') {
            return redirect()->back()->withErrors('Action Interdite !');
        }
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'sector' => 'required|string|max:255',
            'image' => 'nullable|url|max:255',
        ]);

        Immo::create($validatedData);
        return redirect()->back()->with('success', 'Annonce immobilière ajoutée avec succès.');
    }

    public function destroy($slug, $id)
    {
        $user = User::where('slug', '=', $slug)->first();
        if ($user && $user->role == 'admin') {
            $immo = Immo::find($id);
            if ($immo) {
                $immo->delete();
                return redirect()->back()->with('success', 'Annonce immobilière supprimée avec succès.');
            }
            return redirect()->back()->withErrors('Annonce immobilière non trouvée.');
        }
        return redirect()->back()->withErrors('Action Interdite !');
    }
}
