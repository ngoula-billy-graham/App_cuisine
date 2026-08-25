<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNotificationMail;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validation des données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service_type' => 'nullable|string',
            'preferred_date' => 'nullable|date',
            'number_of_people' => 'nullable|integer|min:1',
            'message' => 'required|string',
        ]);

        // 2. Enregistrer la demande dans la base de données
        $inquiry = Inquiry::create($validated);

        // 3. Envoyer un email de notification au Chef DAN (via env)
        try {
            Mail::to(env('MAIL_TO_ADMIN'))->send(new AdminNotificationMail(
                'Nouvelle demande de devis de ' . $request->name,
                "Service demandé : " . ($request->service_type ?? 'Non spécifié') . "\n" .
                "Date souhaitée : " . ($request->preferred_date ?? 'Non précisée') . "\n" .
                "Nombre de personnes : " . ($request->number_of_people ?? 'Non précisé') . "\n" .
                "Message : " . $request->message,
                $request->name,
                $request->email
            ));
        } catch (\Exception $e) {
            \Log::error('Erreur envoi email contact : ' . $e->getMessage());
        }

        // 4. Redirection avec message de succès
        return redirect()->back()->with('success', 'Votre demande a bien été envoyée ! Nous vous répondrons dans les plus brefs délais.');
    }
}