<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\User;
use Illuminate\Http\Request;

class PromoController extends Controller
{

    public function addPromo(Request $request, $slug)
    {
        $user = User::where('slug', '=', $slug)->first();
        if ($user && $user->role == 'admin') {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|max:2048',
            ]);

            $publication = new Promo();
            $publication->title = $validatedData['title'];
            $publication->content = $validatedData['content'];
            $publication->user_id = $user->id;

            if ($request->hasFile('image')) {
                $filename = time() . '_' . $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->move(public_path('images'), $filename);
                $publication->image = basename($path);
            }

            $publication->save();

            return redirect()->back()->with('success', 'Publication ajoutée avec succès !');
        }
        return redirect()->back()->withErrors('Vous n\'êtes pas autorisé à ajouter des publications.');
    }

    public function edit($slug, $post_id, Request $request)
    {
        $user = User::where('slug', '=', $slug)->first();
        if (!$user) {
            return redirect()->back()->withErrors('Utilisateur introuvable !');
        }
        if ($user->role == 'admin') {
            $request->validate([
                'image' => "image|nullable",
                'title' => "string|max:255|nullable",
                'content' => "string|max:255|nullable",
            ]);

            $post_before = Promo::where('id', '=', $post_id)->first();
            if ($request->hasFile('image')) {
                $filename = time() . '_' . $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->move(public_path('images'), $filename);
                $image_location = basename($path);

                Promo::where('id', '=', $post_id)->update([
                    'image' => $image_location ? $image_location : $post_before->image,
                    'title' => $request->input('title') ? $request->input('title') : $post_before->title,
                    'content' => $request->input('content') ? $request->input('content') : $post_before->content,
                ]);
            }

            Promo::where('id', '=', $post_id)->update([
                'title' => $request->input('title') ? $request->input('title') : $post_before->title,
                'content' => $request->input('content') ? $request->input('content') : $post_before->content,
            ]);

            return redirect()->back()->with('success', 'Imformations mis a jour !.');

        }
        return redirect()->back()->withErrors('Vous n\'êtes pas autorisé à modifier des publications.');
    }

    public function delete($slug, $post_id)
    {
        $user = User::where('slug', '=', $slug)->first();
        if (!$user) {
            return redirect()->back()->withErrors('Utilisateur introuvable !');
        }
        if ($user->role == 'admin') {
            Promo::where('id', '=', $post_id)->delete();
            return redirect()->back()->with('success', 'Publication supprimé avec succès !');
        }
        return redirect()->back()->withErrors('Vous n\'êtes pas autorisé à supprimer des publications.');
    }

}
