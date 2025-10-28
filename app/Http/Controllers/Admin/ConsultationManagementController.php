<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $consultations = Consultation::latest()->paginate(15);
        return view('admin.consultations.index', compact('consultations'));
    }

    public function show(Consultation $consultation)
    {
        return view('admin.consultations.show', compact('consultation'));
    }

    public function update(Request $request, Consultation $consultation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,process,completed,rejected',
            'admin_response' => 'required|string',
        ]);

        $validated['responded_at'] = now();
        $consultation->update($validated);

        return redirect()->route('admin.consultations.index')->with('success', 'Konsultasi berhasil diperbarui!');
    }
}