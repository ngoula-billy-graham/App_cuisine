<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::orderBy('start_date', 'asc')->get();
        return view('admin.formations.index', compact('formations'));
    }

    public function create()
    {
        return view('admin.formations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'price' => 'required|numeric',
            'places_available' => 'required|integer|min:0',
        ]);

        Formation::create($request->all());

        return redirect()->route('formations.index')->with('success', 'Formation créée avec succès !');
    }

    public function edit(Formation $formation)
    {
        return view('admin.formations.edit', compact('formation'));
    }

    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'price' => 'required|numeric',
            'places_available' => 'required|integer|min:0',
        ]);

        $formation->update($request->all());

        return redirect()->route('formations.index')->with('success', 'Formation modifiée avec succès !');
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('formations.index')->with('success', 'Formation supprimée !');
    }
}