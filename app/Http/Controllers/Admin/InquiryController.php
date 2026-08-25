<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::orderBy('created_at', 'desc')->get();
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function update(Request $request, Inquiry $inquiry)
    {
        $request->validate(['status' => 'required|in:nouveau,lu,traité']);
        $inquiry->update(['status' => $request->status]);
        return redirect()->route('inquiries.index')->with('success', 'Statut de la demande mis à jour !');
    }
}