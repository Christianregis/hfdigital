<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{
    public function store(Request $request, $slug)
    {
        $user = User::where('slug', '=', $slug)->first();

        // Récupérer les données du panier envoyées depuis le frontend
        $cart = $request->input('cart'); // tableau de produits [id, qty, price]

        if (!$cart || count($cart) === 0) {
            return response()->json(['error' => 'Panier vide'], 400);
        }

        // Calcul du total
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        // Création de la commande
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'en attente',
        ]);

        // Attacher les produits à la commande
        foreach ($cart as $item) {
            $order->products()->attach($item['id'], [
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return response()->json([
            'message' => 'Commande enregistrée avec succès',
            'order_id' => $order->id
        ]);

    }

    public function showOrderWithUser($slug)
    {
        $user = User::where('slug', '=', $slug)->first();
        if (!$user) {
            return redirect()->back()->withErrors('Utilisateur introuvable !');
        }
        if ($user->role == 'customer') {
            $orders = $user->orders()->with('products')->latest()->get();
            return response()->json($orders);
        }
        return redirect()->back()->withErrors('Action Interdite !');
    }

    public function edit($slug, $order_id, Request $request)
    {
        $user = User::where('slug', '=', $slug)->first();
        if (!$user) {
            return redirect()->back()->withErrors('Utilisateur introuvable !');
        }
        if ($user->role == 'admin') {
            $status=$request->input('status');
            Order::where('id', '=', $order_id)->update([
                'status' => $status,
            ]);

            return redirect()->route('user.page',['slug'=>$user->slug])->with('success',"Commande mis a jour !");
        }
    }

    public function export($slug){
        $user = User::where('slug', '=', $slug)->first();
        if (!$user) {
            return redirect()->back()->withErrors('Utilisateur introuvable !');
        }
        if ($user->role == 'admin') {
            $orders = Order::with('user', 'products')->get();

            $filename = "NanaRaff_export_" . date('Ymd_His') . ".csv";
            $handle = fopen($filename, 'w+');
            fputcsv($handle, ['ID', 'Client', 'Produits (Quantite)', 'Total', 'Date', 'Statut']);

            foreach ($orders as $order) {
                $products = $order->products->map(function ($product) {
                    return $product->title . ' (' . $product->pivot->quantity . ')';
                })->implode(', ');

                fputcsv($handle, [
                    $order->id,
                    $order->user->name . ' | ' . $order->user->email,
                    $products,
                    $order->total . ' FCFA',
                    $order->created_at,
                    $order->status
                ]);
            }

            fclose($handle);

            return response()->download($filename)->deleteFileAfterSend(true);
        }
        return redirect()->back()->withErrors('Action Interdite !');
    }
}
