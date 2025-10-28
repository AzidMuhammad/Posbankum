<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Article;
use App\Models\LegalProduct;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stats = [
            'pending_consultations' => Consultation::where('status', 'pending')->count(),
            'total_consultations' => Consultation::count(),
            'total_articles' => Article::count(),
            'total_legal_products' => LegalProduct::count(),
        ];

        $recentConsultations = Consultation::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentConsultations'));
    }
}