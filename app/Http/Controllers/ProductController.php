<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function store(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();
        if ($user && $user->role == 'admin') {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'utilisation' => 'required|string',
                'precaution' => 'required|string',
                'composition' => 'required|string',
                'price' => 'required|integer|min:0',
                'stock' => 'required|integer|min:0',
                'category' => 'required|string|max:100',
                'image' => 'nullable|image|max:2048',
                'image2' => 'nullable|image|max:2048',
                'image3' => 'nullable|image|max:2048',
            ]);

            $product = new Product();
            $product->title = $validatedData['title'];
            $product->description = $validatedData['description'];
            $product->utilisation = $validatedData['utilisation'];
            $product->precaution = $validatedData['precaution'];
            $product->composition = $validatedData['composition'];
            $product->price = $validatedData['price'];
            $product->stock = $validatedData['stock'];
            $product->reste = $validatedData['stock'];
            $product->category = $validatedData['category'];
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $filename2 = time() . '_' . $request->file('image2')->getClientOriginalName();
            $filename3 = time() . '_' . $request->file('image3')->getClientOriginalName();
            if ($request->hasFile('image')) {
                $path = $request->file('image')->move(public_path('images'), $filename);
                $product->image = basename($path);
            }
            if ($request->hasFile('image2')) {
                $path = $request->file('image2')->move(public_path('images'), $filename2);
                $product->image2 = basename($path);
            }
            if ($request->hasFile('image3')) {
                $path = $request->file('image3')->move(public_path('images'), $filename3);
                $product->image3 = basename($path);
            }
            $product->save();

            return redirect()->back()->with('success', 'Produit ajouté avec succès !');
        }
        return redirect()->back()->withErrors('Vous n\'êtes pas autorisé à ajouter des produits.');
    }

    public function edit($slug, $product_id, Request $request)
    {
        $user = User::where('slug', '=', $slug)->first();
        if (!$user) {
            return redirect()->back()->withErrors('Utilisateur introuvable !');
        }
        if ($user->role == 'admin') {
            $request->validate([
                'image' => "image|nullable",
                'image2' => "image|nullable",
                'image3' => "image|nullable",
                'price' => "integer|min:0|nullable",
                'description' => "string|max:255|nullable",
                'precaution' => "string|max:255|nullable",
                'utilisation' => "string|max:255|nullable",
                'composition' => "string|max:255|nullable",
            ]);

            $product_before = Product::where('id', '=', $product_id)->first();
            if ($request->hasFile('image')) {
                $filename = time() . '_' . $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->move(public_path('images'), $filename);
                $image_location = basename($path);

                Product::where('id', '=', $product_id)->update([
                    'image' => $image_location ? $image_location : $product_before->image,
                    'price' => $request->input('price') ? $request->input('price') : $product_before->price,
                    'description' => $request->input('description') ? $request->input('description') : $product_before->description,
                    'utilisation' => $request->input('utilisation') ? $request->input('utilisation') : $product_before->utilisation,
                    'precaution' => $request->input('precaution') ? $request->input('precaution') : $product_before->precaution,
                    'composition' => $request->input('composition') ? $request->input('composition') : $product_before->composition,
                ]);
            }

            if ($request->hasFile('image2')) {
                $filename = time() . '_' . $request->file('image2')->getClientOriginalName();
                $path = $request->file('image2')->move(public_path('images'), $filename);
                $image_location = basename($path);

                Product::where('id', '=', $product_id)->update([
                    'image2' => $image_location ? $image_location : $product_before->image2,
                    'price' => $request->input('price') ? $request->input('price') : $product_before->price,
                    'description' => $request->input('description') ? $request->input('description') : $product_before->description,
                    'utilisation' => $request->input('utilisation') ? $request->input('utilisation') : $product_before->utilisation,
                    'precaution' => $request->input('precaution') ? $request->input('precaution') : $product_before->precaution,
                    'composition' => $request->input('composition') ? $request->input('composition') : $product_before->composition,
                ]);
            }
            if ($request->hasFile('image3')) {
                $filename = time() . '_' . $request->file('image3')->getClientOriginalName();
                $path = $request->file('image3')->move(public_path('images'), $filename);
                $image_location = basename($path);

                Product::where('id', '=', $product_id)->update([
                    'image3' => $image_location ? $image_location : $product_before->image3,
                    'price' => $request->input('price') ? $request->input('price') : $product_before->price,
                    'description' => $request->input('description') ? $request->input('description') : $product_before->description,
                    'utilisation' => $request->input('utilisation') ? $request->input('utilisation') : $product_before->utilisation,
                    'precaution' => $request->input('precaution') ? $request->input('precaution') : $product_before->precaution,
                    'composition' => $request->input('composition') ? $request->input('composition') : $product_before->composition,
                ]);
            }

            Product::where('id', '=', $product_id)->update([
                'price' => $request->input('price') ? $request->input('price') : $product_before->price,
                'description' => $request->input('description') ? $request->input('description') : $product_before->description,
                'utilisation' => $request->input('utilisation') ? $request->input('utilisation') : $product_before->utilisation,
                'precaution' => $request->input('precaution') ? $request->input('precaution') : $product_before->precaution,
                'composition' => $request->input('composition') ? $request->input('composition') : $product_before->composition,
            ]);

            return redirect()->back()->with('success', 'Imformations mis a jour !.');

        }
        return redirect()->back()->withErrors('Vous n\'êtes pas autorisé à modifier des produits.');
    }

    public function delete($slug, $product_id)
    {
        $user = User::where('slug', '=', $slug)->first();
        if (!$user) {
            return redirect()->back()->withErrors('Utilisateur introuvable !');
        }
        if ($user->role == 'admin') {
            Product::where('id', '=', $product_id)->delete();
            return redirect()->back()->with('success', 'Produit supprimé avec succès !');
        }
        return redirect()->back()->withErrors('Vous n\'êtes pas autorisé à supprimer des produits.');
    }
}
