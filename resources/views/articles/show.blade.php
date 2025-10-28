@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row g-4">
        <!-- Main Article Content -->
        <div class="col-lg-8">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('articles.index') }}" style="color: #56ab91; text-decoration: none;">Artikel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($article->title, 50) }}</li>
                </ol>
            </nav>

            <article class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
                <!-- Featured Image -->
                @if($article->image)
                <div class="position-relative" style="height: 400px; overflow: hidden;">
                    <img src="{{ Storage::url($article->image) }}" class="w-100 h-100" alt="{{ $article->title }}" style="object-fit: cover;">
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.3) 100%);"></div>
                </div>
                @endif
                
                <div class="card-body p-4 p-md-5">
                    <!-- Meta Information -->
                    <div class="d-flex flex-wrap gap-3 align-items-center mb-4 pb-4" style="border-bottom: 2px solid #e8f5f1;">
                        <span class="badge rounded-pill px-4 py-2" style="background-color: #e8f5f1; color: #56ab91; font-weight: 500; font-size: 0.9rem;">
                            {{ $article->category }}
                        </span>
                        <span class="text-muted d-flex align-items-center" style="font-size: 0.9rem;">
                            <i class="far fa-calendar me-2" style="color: #a8e6cf;"></i>
                            {{ $article->created_at->format('d F Y') }}
                        </span>
                        <span class="text-muted d-flex align-items-center" style="font-size: 0.9rem;">
                            <i class="fas fa-eye me-2" style="color: #a8e6cf;"></i>
                            {{ $article->views }} views
                        </span>
                    </div>
                    
                    <!-- Article Title -->
                    <h1 class="mb-4" style="color: #2d3748; font-weight: 700; line-height: 1.3; font-size: 2.2rem;">
                        {{ $article->title }}
                    </h1>
                    
                    <!-- Article Content -->
                    <div class="article-content" style="color: #4a5568; font-size: 1.05rem; line-height: 1.8;">
                        {!! nl2br(e($article->content)) !!}
                    </div>

                    <!-- Divider -->
                    <hr class="my-5" style="border-color: #e8f5f1; border-width: 2px;">

                    <!-- Author & Actions -->
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, #a8e6cf 0%, #56ab91 100%);">
                                <i class="fas fa-user" style="color: white; font-size: 1.2rem;"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.8rem;">Ditulis oleh</small>
                                <strong style="color: #2d3748; font-size: 1rem;">{{ $article->user->name }}</strong>
                            </div>
                        </div>
                        <a href="{{ route('articles.index') }}" class="btn rounded-pill px-4 py-2" style="background-color: #e8f5f1; color: #56ab91; font-weight: 500; border: 2px solid #a8e6cf; transition: all 0.3s ease;">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Artikel
                        </a>
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Related Articles -->
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px; overflow: hidden;">
                <div class="card-header border-0" style="background: linear-gradient(135deg, #e8f5f1 0%, #d4edda 100%); padding: 1.5rem;">
                    <h5 class="mb-0" style="color: #2d3748; font-weight: 600;">
                        <i class="fas fa-newspaper me-2" style="color: #56ab91;"></i>
                        Artikel Terkait
                    </h5>
                </div>
                <div class="card-body p-4">
                    @forelse($relatedArticles as $related)
                    <div class="mb-4 pb-4" style="border-bottom: 1px solid #e8f5f1;">
                        <a href="{{ route('articles.show', $related->slug) }}" class="text-decoration-none">
                            <h6 class="mb-2" style="color: #2d3748; font-weight: 600; line-height: 1.4; transition: color 0.3s ease;">
                                {{ $related->title }}
                            </h6>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge rounded-pill" style="background-color: #e8f5f1; color: #56ab91; font-size: 0.7rem; font-weight: 500;">
                                {{ $related->category }}
                            </span>
                            <small class="text-muted" style="font-size: 0.8rem;">
                                <i class="far fa-clock me-1"></i>
                                {{ $related->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-3">
                        <i class="fas fa-info-circle mb-2" style="font-size: 2rem; color: #a8e6cf;"></i>
                        <p class="text-muted mb-0" style="font-size: 0.9rem;">Tidak ada artikel terkait</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- CTA Card -->
            <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden; background: linear-gradient(135deg, #56ab91 0%, #3d8b6d 100%);">
                <div class="card-body p-4 text-white text-center">
                    <div class="mb-3">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background: rgba(255,255,255,0.2);">
                            <i class="fas fa-comments" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <h5 class="mb-3 fw-bold">Butuh Konsultasi Hukum?</h5>
                    <p class="mb-4" style="opacity: 0.95; font-size: 0.95rem;">
                        Dapatkan konsultasi hukum gratis dari para ahli kami sekarang juga!
                    </p>
                    <a href="{{ route('consultations.create') }}" class="btn btn-light w-100 rounded-pill py-3 fw-bold" style="color: #56ab91; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                        <i class="fas fa-comments me-2"></i>Konsultasi Sekarang
                    </a>
                </div>
            </div>

            <!-- Share Section (Optional) -->
            <div class="card border-0 shadow-sm mt-4" style="border-radius: 16px;">
                <div class="card-body p-4 text-center">
                    <h6 class="mb-3" style="color: #2d3748; font-weight: 600;">Bagikan Artikel</h6>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="#" class="btn btn-sm rounded-circle" style="width: 40px; height: 40px; background-color: #e8f5f1; color: #56ab91;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-sm rounded-circle" style="width: 40px; height: 40px; background-color: #e8f5f1; color: #56ab91;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-sm rounded-circle" style="width: 40px; height: 40px; background-color: #e8f5f1; color: #56ab91;">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="btn btn-sm rounded-circle" style="width: 40px; height: 40px; background-color: #e8f5f1; color: #56ab91;">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.article-content p {
    margin-bottom: 1.5rem;
}

.article-content h2,
.article-content h3 {
    color: #2d3748;
    margin-top: 2rem;
    margin-bottom: 1rem;
    font-weight: 600;
}

.card-body a h6:hover {
    color: #56ab91 !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(86, 171, 145, 0.2);
}
</style>
@endsection