<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNotificationMail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validation des champs du formulaire de commande
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'quantity' => 'required|integer|min:1',
            'message' => 'nullable|string',
        ]);

        // 2. Création de la commande dans la base de données
        $order = Order::create([
            'product_id' => $request->product_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'quantity' => $request->quantity,
            'message' => $request->message,
            'status' => 'nouveau',
        ]);

        // 3. Récupérer le produit pour l'email de notification
        $product = Product::find($request->product_id);

        // 4. Envoyer un email au Chef DAN (via env)
        try {
            Mail::to(env('MAIL_TO_ADMIN'))->send(new AdminNotificationMail(
                'Nouvelle commande : ' . $product->name,
                "Client : {$request->customer_name}\n" .
                "Téléphone : {$request->customer_phone}\n" .
                "Quantité : {$request->quantity}\n" .
                "Message : " . ($request->message ?? 'Aucun message'),
                $request->customer_name,
                $request->customer_email
            ));
        } catch (\Exception $e) {
            \Log::error('Erreur envoi email commande : ' . $e->getMessage());
        }

        // 5. Redirection avec message de succès
        return redirect()->back()->with('success', 'Votre commande a été envoyée avec succès !');
    }
}