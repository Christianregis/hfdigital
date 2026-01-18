<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborator;
use App\Models\User;

class CollaboratorController extends Controller
{

    public function store(Request $request, $slug)
    {
        $user = User::where('slug', '=', $slug)->first();
        if (!$user || $user->role != 'admin') {
            return redirect()->back()->withErrors('Action Interdite !');
        }
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|url|max:255',
        ]);

        $collaborator = new Collaborator();
        $collaborator->name = $validatedData['name'];
        $collaborator->sector = $validatedData['sector'];
        $collaborator->description = $validatedData['description'] ?? null;
        $collaborator->image = $validatedData['image'];

        $collaborator->save();

        return redirect()->back()->with('success', 'Collaborateur ajouté avec succès.');
    }

    public function index()
    {
        return view('collaborateur', [
            'collaborators' => Collaborator::all(),
        ]);
    }

    public function destroy($slug, $id)
    {
        $user = User::where('slug', '=', $slug)->first();
        if ($user && $user->role == 'admin') {
            $collaborator = Collaborator::find($id);
            if ($collaborator) {
                $collaborator->delete();
                return redirect()->back()->with('success', 'Collaborateur supprimé avec succès.');
            }
            return redirect()->back()->withErrors('Collaborateur non trouvé.');
        }
        return redirect()->back()->withErrors('Action Interdite !');
    }
}
