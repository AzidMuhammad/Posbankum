<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Consultation;
use App\Models\LegalProduct;
use App\Models\Schedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recentArticles = Article::where('is_published', true)
            ->latest()
            ->take(3)
            ->get();
        
        $schedules = Schedule::where('is_active', true)->get();
        $totalConsultations = Consultation::count();
        $completedConsultations = Consultation::where('status', 'completed')->count();
        
        return view('home', compact('recentArticles', 'schedules', 'totalConsultations', 'completedConsultations'));
    }

    public function about()
    {
        return view('about');
    }
}