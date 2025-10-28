@extends('layouts.app')

@section('content')
<!-- Hero Section with Modern Green Gradient -->
<div class="position-relative overflow-hidden" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 5rem 0;">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-white rounded-circle p-3 shadow-sm me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-newspaper" style="font-size: 1.5rem; color: #56ab91;"></i>
                    </div>
                    <div>
                        <h1 class="display-4 fw-bold text-white mb-0">Artikel & Berita</h1>
                    </div>
                </div>
                <p class="lead text-white" style="opacity: 0.95; font-size: 1.1rem;">Informasi dan edukasi hukum terkini untuk masyarakat Indonesia</p>
            </div>
        </div>
    </div>
    <!-- Decorative Elements -->
    <div class="position-absolute" style="bottom: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
    <div class="position-absolute" style="top: 50px; right: 100px; width: 100px; height: 100px; background: rgba(255,255,255,0.08); border-radius: 50%;"></div>
</div>

<div class="container my-5">
    <!-- Filter Section (Optional) -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex gap-2 flex-wrap">
                <span class="text-muted me-2">Kategori:</span>
                <button class="btn btn-sm rounded-pill" style="background-color: #e8f5f1; color: #56ab91; border: 1px solid #a8e6cf;">Semua</button>
                <button class="btn btn-sm btn-outline-secondary rounded-pill">Hukum Pidana</button>
                <button class="btn btn-sm btn-outline-secondary rounded-pill">Hukum Perdata</button>
                <button class="btn btn-sm btn-outline-secondary rounded-pill">Hukum Bisnis</button>
            </div>
        </div>
    </div>

    <!-- Articles Grid -->
    <div class="row g-4">
        @forelse($articles as $article)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-lift" style="transition: all 0.3s ease; border-radius: 16px; overflow: hidden;">
                <!-- Image Section -->
                @if($article->image)
                <div class="position-relative" style="height: 220px; overflow: hidden;">
                    <img src="{{ Storage::url($article->image) }}" class="w-100 h-100" alt="{{ $article->title }}" style="object-fit: cover; transition: transform 0.3s ease;">
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.2) 100%);"></div>
                </div>
                @else
                <div class="d-flex align-items-center justify-content-center" style="height: 220px; background: linear-gradient(135deg, #e8f5f1 0%, #d4edda 100%);">
                    <i class="fas fa-newspaper" style="font-size: 4rem; color: #a8e6cf;"></i>
                </div>
                @endif
                
                <div class="card-body p-4">
                    <!-- Meta Info -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge rounded-pill px-3 py-2" style="background-color: #e8f5f1; color: #56ab91; font-weight: 500; font-size: 0.75rem;">
                            {{ $article->category }}
                        </span>
                        <small class="text-muted d-flex align-items-center">
                            <i class="fas fa-eye me-1" style="color: #a8e6cf;"></i>
                            <span style="font-size: 0.875rem;">{{ $article->views }}</span>
                        </small>
                    </div>
                    
                    <!-- Title -->
                    <h5 class="card-title mb-3" style="color: #2d3748; font-weight: 600; line-height: 1.4;">
                        {{ $article->title }}
                    </h5>
                    
                    <!-- Excerpt -->
                    <p class="card-text text-muted mb-4" style="font-size: 0.9rem; line-height: 1.6;">
                        {{ Str::limit(strip_tags($article->content), 120) }}
                    </p>
                    
                    <!-- Footer -->
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted" style="font-size: 0.8rem;">
                            <i class="far fa-clock me-1"></i>
                            {{ $article->created_at->diffForHumans() }}
                        </small>
                        <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-sm rounded-pill px-4" style="background-color: #56ab91; color: white; font-weight: 500; transition: all 0.3s ease;">
                            Baca <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="fas fa-folder-open" style="font-size: 4rem; color: #a8e6cf;"></i>
                </div>
                <h5 class="text-muted mb-2">Belum Ada Artikel</h5>
                <p class="text-muted">Artikel akan segera hadir. Silakan cek kembali nanti.</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        {{ $articles->links() }}
    </div>
</div>

<style>
.hover-lift:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(86, 171, 145, 0.15) !important;
}

.hover-lift:hover img {
    transform: scale(1.05);
}

.hover-lift:hover .btn {
    background-color: #3d8b6d !important;
}
</style>
@endsection