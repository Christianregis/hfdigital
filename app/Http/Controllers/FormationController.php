<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\User;
use App\Models\Chapitre;
use App\Models\Video;
use Str;

class FormationController extends Controller
{
    public function store(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if ($user && $user->role == 'admin') {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|integer',
                'duration' => 'nullable|integer',
                'nbreModule' => 'required|integer',
                'imageFormation' => 'nullable|image|mimes:jpg,png,jpeg',
                'aproposFormation' => 'nullable|string',
                'imageApropos' => 'nullable|image|mimes:jpg,png,jpeg',
                'apprentissage1' => 'nullable|string',
                'apprentissage2' => 'nullable|string',
                'apprentissage3' => 'nullable|string',
                'apprentissage4' => 'nullable|string',
                'chapitres' => 'required|array',
                'chapitres.*.titre' => 'required|string',
                'chapitres.*.description' => 'nullable|string',
                'chapitres.*.videos' => 'nullable|array',
                'chapitres.*.videos.*.titre' => 'required|string',
                'chapitres.*.videos.*.url' => 'required|string',
            ]);

            // Upload de l'image principale
            if ($request->hasFile('imageFormation')) {
                $filename = time() . '_' . $request->file('imageFormation')->getClientOriginalName();
                $path = $request->file('imageFormation')->move(public_path('images'), $filename);
                $validatedData['imageFormation'] = basename($path);
            }

            // Upload de l'image "à propos"
            if ($request->hasFile('imageApropos')) {
                $filename2 = time() . '_' . $request->file('imageApropos')->getClientOriginalName();
                $path2 = $request->file('imageApropos')->move(public_path('images'), $filename2);
                $validatedData['imageApropos'] = basename($path2);
            }

            // Génération du code d’accès unique
            $validatedData['codeAccess'] = strtoupper(Str::random(10));

            // Création de la formation
            $formation = Formation::create($validatedData);

            // Enregistrement des chapitres et vidéos
            foreach ($request->chapitres as $chap) {
                $chapitre = Chapitre::create([
                    'formation_id' => $formation->id,
                    'titre' => $chap['titre'],
                    'description' => $chap['description'] ?? null,
                ]);

                if (isset($chap['videos'])) {
                    foreach ($chap['videos'] as $video) {
                        Video::create([
                            'chapitre_id' => $chapitre->id,
                            'titre' => $video['titre'],
                            'url' => $video['url'],
                        ]);
                    }
                }
            }

            return redirect()->back()->with('success', 'Formation enregistrée avec succès.');
        }
        return redirect()->route('home')->withErrors('Action non autorisée.');
    }

    /**
     * Visualiser les information d'une formation
     * @param mixed $formation_id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showFormation($formation_id)
    {
        $formation = Formation::where('id', '=', $formation_id)->first();
        if ($formation) {
            return view('formation', compact('formation'));
        } else {
            return redirect()->route('home')->withErrors('Formation introuvable');
        }

    }

    public function deleteFormation($slug, $formation_id)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if ($user && $user->role == 'admin') {
            $formation = Formation::findOrFail($formation_id);
            if ($formation) {
                $formation->delete();
                return redirect()->route('user.page', ['slug' => $user->slug])->with('success', 'Formation supprimée avec succès.');
            } else {
                return redirect()->route('user.page', ['slug' => $user->slug])->withErrors('Formation non trouvée.');
            }
        } else {
            return redirect()->route('home')->withErrors('Action non autorisée.');
        }
    }


    public function showFormationWithCode(Request $request)
    {

        $validatedData = $request->validate([
            'codeAccess' => 'required|string|max:20',
        ]);

        $formation = Formation::where('codeAccess', '=', $validatedData['codeAccess'])->first();
        if ($formation) {
            return view('showSpecificFormationWithCode', compact('formation'));
        } else {
            return redirect()->route('home')->withErrors('Code d’accès invalide.');
        }
    }

    public function showAllFormations()
    {
        $formations = Formation::orderBy('created_at', 'desc')->get();
        return view('allFormation', compact('formations'));
    }
}
