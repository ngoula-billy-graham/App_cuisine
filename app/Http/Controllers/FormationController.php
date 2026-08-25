<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
{
    // Récupère toutes les formations disponibles (statut "disponible")
    // Si vous voulez toutes les formations sans filtre, utilisez simplement Formation::all()
    $formations = Formation::where('status', 'disponible')->orderBy('start_date', 'asc')->get();
    return view('formations', compact('formations'));
}
}