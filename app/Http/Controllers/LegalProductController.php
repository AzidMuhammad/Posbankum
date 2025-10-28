<?php

namespace App\Http\Controllers;

use App\Models\LegalProduct;
use Illuminate\Http\Request;

class LegalProductController extends Controller
{
    public function index()
    {
        $legalProducts = LegalProduct::latest()->paginate(10);
        return view('legal-products.index', compact('legalProducts'));
    }

    public function download(LegalProduct $legalProduct)
    {
        $legalProduct->increment('download_count');
        return Storage::download($legalProduct->file_path);
    }
}