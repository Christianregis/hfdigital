<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conseil;
use App\Models\User;

class ConseilController extends Controller
{
    public function addConseil($slug, Request $request) {
        $user = User::where('slug', '=', $slug)->first();
        if (!$user || $user->role != 'admin') {
            return redirect()->back()->withErrors('Action Interdite !');
        }
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'longDescription' => 'nullable|string',
            'shortDescription' => 'required|string',
            'image' => 'nullable|url|max:255',
        ]);

        Conseil::create($validatedData);
        return redirect()->back()->with('success', 'Conseil ajouté avec succès.');
    }

    public function destroy($slug, $id)
    {
        $user = User::where('slug', '=', $slug)->first();
        if ($user && $user->role == 'admin') {
            $conseil = Conseil::find($id);
            if ($conseil) {
                $conseil->delete();
                return redirect()->back()->with('success', 'Conseil supprimé avec succès.');
            }
            return redirect()->back()->withErrors('Conseil non trouvé.');
        }
        return redirect()->back()->withErrors('Action Interdite !');
    }
}
