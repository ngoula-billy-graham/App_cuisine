<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormationRegistration;
use Illuminate\Http\Request;

class FormationRegistrationController extends Controller
{
    public function index()
    {
        $registrations = FormationRegistration::with('formation')->orderBy('created_at', 'desc')->get();
        return view('admin.registrations.index', compact('registrations'));
    }

    public function update(Request $request, FormationRegistration $registration)
    {
        $request->validate(['status' => 'required|in:en_attente,confirmé,annulé']);
        $registration->update(['status' => $request->status]);
        return redirect()->route('registrations.index')->with('success', 'Statut de l\'inscription mis à jour !');
    }
}