<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LegalProductManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $legalProducts = LegalProduct::latest()->paginate(15);
        return view('admin.legal-products.index', compact('legalProducts'));
    }

    public function create()
    {
        return view('admin.legal-products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'number' => 'required|string',
            'date' => 'required|date',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf|max:10240',
        ]);

        $validated['file_path'] = $request->file('file')->store('legal-products', 'public');

        LegalProduct::create($validated);

        return redirect()->route('admin.legal-products.index')->with('success', 'Produk hukum berhasil ditambahkan!');
    }

    public function edit(LegalProduct $legalProduct)
    {
        return view('admin.legal-products.edit', compact('legalProduct'));
    }

    public function update(Request $request, LegalProduct $legalProduct)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'number' => 'required|string',
            'date' => 'required|date',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($legalProduct->file_path);
            $validated['file_path'] = $request->file('file')->store('legal-products', 'public');
        }

        $legalProduct->update($validated);

        return redirect()->route('admin.legal-products.index')->with('success', 'Produk hukum berhasil diperbarui!');
    }

    public function destroy(LegalProduct $legalProduct)
    {
        Storage::disk('public')->delete($legalProduct->file_path);
        $legalProduct->delete();

        return redirect()->route('admin.legal-products.index')->with('success', 'Produk hukum berhasil dihapus!');
    }
}