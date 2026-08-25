<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\FormationRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNotificationMail;
use App\Mail\RegistrationConfirmationMail;

class FormationRegistrationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Vérifier s'il reste des places
        $formation = Formation::findOrFail($request->formation_id);
        if ($formation->places_available <= 0) {
            return back()->withErrors(['formation' => 'Désolé, cette formation est complète.']);
        }

        // Créer l'inscription
        FormationRegistration::create([
            'formation_id' => $request->formation_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'en_attente',
        ]);

        // Décrémenter les places disponibles
        $formation->decrement('places_available');
        
        // ✅ 1. Email au Chef DAN (via la variable d'environnement)
        Mail::to(env('MAIL_TO_ADMIN'))->send(new AdminNotificationMail(
            'Nouvelle inscription : ' . $formation->title,
            "Nom: {$request->name}\nTéléphone: {$request->phone}\nEmail: {$request->email}",
            $request->name,
            $request->email
        ));

        // ✅ 2. Email de confirmation au visiteur
        Mail::to($request->email)->send(new RegistrationConfirmationMail($formation, $request->name));

        return back()->with('success', 'Votre inscription a bien été enregistrée ! Nous vous contacterons bientôt.');
    }
}