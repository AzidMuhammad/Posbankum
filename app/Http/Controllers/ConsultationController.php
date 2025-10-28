<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConsultationController extends Controller
{
    public function create()
    {
        return view('consultations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|digits:16',
            'phone' => 'required|string|max:15',
            'email' => 'nullable|email',
            'address' => 'required|string',
            'case_category' => 'required|string',
            'case_description' => 'required|string',
            'evidence_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $ticketNumber = Consultation::generateTicketNumber();
        $validated['ticket_number'] = $ticketNumber;
        $validated['user_id'] = null; // User tidak perlu login

        if ($request->hasFile('evidence_file')) {
            $validated['evidence_file'] = $request->file('evidence_file')->store('evidence', 'public');
        }

        Consultation::create($validated);

        return redirect()->route('consultations.track')->with('success', 'Konsultasi berhasil diajukan! Nomor tiket Anda: ' . $ticketNumber);
    }

    public function track()
    {
        return view('consultations.track');
    }

    public function search(Request $request)
    {
        $request->validate([
            'ticket_number' => 'required|string',
        ]);

        $consultation = Consultation::where('ticket_number', $request->ticket_number)->first();

        if (!$consultation) {
            return back()->with('error', 'Nomor tiket tidak ditemukan!');
        }

        return view('consultations.status', compact('consultation'));
    }
}