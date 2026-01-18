<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Avi;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\User;
=======
use App\Models\Order;
use App\Models\Promo;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Collaborator;
use App\Models\Immo;
use App\Models\Conseil;
use Carbon\Carbon;
>>>>>>> 4ab2363a34920e1e831fd0cf354750876d32af69
use Hash;

class UserController extends Controller
{
<<<<<<< HEAD

    /**
     * Inscription utilisateur
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
=======
    public function showloginForm()
    {
        return view('login_register_view');
    }

    function register(Request $request)
>>>>>>> 4ab2363a34920e1e831fd0cf354750876d32af69
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
<<<<<<< HEAD

        return redirect()->route('home')->with('success', "Inscription reussie !");
    }

    public function login(Request $request)
    {
        // logique pour se connecter
=======
        return redirect()->route('showLogInForm')->with('success', 'Inscription reussi !');
    }

    function login(Request $request)
    {
>>>>>>> 4ab2363a34920e1e831fd0cf354750876d32af69
        $validateData = $request->validate([
            'email' => "email|required|max:255",
            'password' => "max:255|required|min:6",
        ]);

        $user = User::where('email', '=', $validateData['email'])->first();
        if ($user) {
            if (Hash::check($validateData['password'], $user->password)) {

                return redirect()->route('user.page', ['slug' => $user->slug]);
            } else {
<<<<<<< HEAD
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


=======
                return redirect()->route('showLogInForm')->withErrors('Email ou mot de passe invalide !');
            }
        }
        return redirect()->route('showLogInForm')->withErrors('Email ou mot de passe invalide !');
    }

    function showUserPage($slug)
    {
        $user = User::where('slug', '=', $slug)->first();
        if ($user) {
            if ($user->role == "admin") {
                // Période : 12 mois
                $startDate = Carbon::now()->subMonths(12);

                // Commandes dans la période
                $orders = Order::where('created_at', '>=', $startDate)->with('user', 'products')->get();

                // Commandes expediees dans la période
                $ordersSended = Order::where('created_at', '>=', $startDate)->where('status','=','sended')->with('user', 'products')->get();

                // Chiffre d’affaires
                $revenue = Order::where('status','=','sended')->sum('total');

                // Nombre de commandes
                $totalOrders = $orders->count();

                // Nombre de clients uniques
                $totalClients = $orders->pluck('user_id')->unique()->count();

                // Regroupement par mois
                $salesByMonth = $ordersSended->groupBy(function ($order) {
                    return Carbon::parse($order->created_at)->format('Y-m');
                })->map->sum('total');

                // Catégories (si tes produits ont une relation "category")
                $salesByCategory = [];
                foreach ($orders as $order) {
                    foreach ($order->products as $product) {
                        $categoryName = $product->category ?? "Autres";
                        $salesByCategory[$categoryName] = ($salesByCategory[$categoryName] ?? 0) + $product->pivot->quantity;
                    }
                }

                // Top produits
                $topProducts = [];
                foreach ($orders as $order) {
                    foreach ($order->products as $product) {
                        $topProducts[$product->title] = ($topProducts[$product->title] ?? 0) + $product->pivot->quantity;
                    }
                }
                arsort($topProducts);
                return view('admin.dashboard', [
                    'user' => $user,
                    'products' => Product::orderBy('created_at', 'desc')->get(),
                    'users_all' => User::orderBy('created_at', 'desc')->get(),
                    'posts' => Publication::orderBy('created_at', 'desc')->get(),
                    'promos'=>Promo::orderBy('created_at','desc')->get(),
                    'orders' => Order::orderBy('created_at', 'desc')->get(),
                    'collaborators' => Collaborator::all(),
                    'immos'=> Immo::all(),
                    "conseils" => Conseil::all(),
                    'revenue' => $revenue,
                    'totalOrders' => $totalOrders,
                    'totalClients' => $totalClients,
                    'salesByMonth' => $salesByMonth,
                    'salesByCategory' => $salesByCategory,
                    'topProducts' => array_slice($topProducts, 0, 5),
                ]);
            }
            if ($user->role == "customer") {
                return view('customer.home', [
                    'user' => $user,
                    'promos'=>Promo::all(),
                    'products' => Product::all(),
                    "conseils" => Conseil::all(),
                    "orders" => $user->orders()->with('products')->latest()->get(),
                ]);
            }
        }
    }

    function destroy($slug, $user_all_id)
    {
        $user = User::where('slug', '=', $slug)->first();

        if (!$user) {
            return redirect()->back()->withErrors('Utilisateur introuvable !');
        }
        if ($user->role == 'admin') {
            User::where('id', $user_all_id)->delete();
            return redirect()->back()->with('success', 'Utilisateur supprimé avec succès !');
        }
        return redirect()->back()->withErrors('Action interdite !');
    }
}
>>>>>>> 4ab2363a34920e1e831fd0cf354750876d32af69
