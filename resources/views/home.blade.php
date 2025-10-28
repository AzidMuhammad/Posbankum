@extends('layouts.app')

@section('content')
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 fade-in-up">
                <div class="badge-custom">
                    <i class="fas fa-shield-alt me-2"></i>Terpercaya & Profesional
                </div>
                <h1 class="display-3 fw-bold mb-4">Pos Bantuan Hukum Desa Pulau Gadang</h1>
                <p class="lead mb-4" style="font-size: 1.2rem; line-height: 1.8;">Layanan konsultasi hukum gratis untuk masyarakat. Kami siap membantu menyelesaikan permasalahan hukum Anda dengan profesional dan terpercaya.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('consultations.create') }}" class="btn btn-gradient btn-lg">
                        <i class="fas fa-comments"></i>
                        <span>Konsultasi Sekarang</span>
                    </a>
                    <a href="{{ route('consultations.track') }}" class="btn btn-outline-custom btn-lg">
                        <i class="fas fa-search"></i>
                        <span>Lacak Status</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <div style="position: relative;">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 300px; height: 300px; background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
                    <i class="fas fa-balance-scale" style="font-size: 250px; color: var(--primary); opacity: 0.15; position: relative; z-index: 1;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="container my-5 py-5">
    <div class="text-center mb-5">
        <div class="badge-custom mx-auto">
            <i class="fas fa-star me-2"></i>Layanan Unggulan
        </div>
        <h2 class="section-title">Mengapa Memilih Kami?</h2>
        <p class="section-subtitle">Kami berkomitmen memberikan pelayanan terbaik untuk masyarakat</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card-hover text-center">
                <div class="mb-4">
                    <i class="fas fa-gavel"></i>
                </div>
                <h4 class="mb-3" style="color: var(--dark); font-weight: 700;">Konsultasi Gratis</h4>
                <p class="text-muted" style="line-height: 1.8;">Dapatkan konsultasi hukum gratis dari tenaga ahli berpengalaman yang siap membantu Anda</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-hover text-center">
                <div class="mb-4">
                    <i class="fas fa-file-contract"></i>
                </div>
                <h4 class="mb-3" style="color: var(--dark); font-weight: 700;">Produk Hukum</h4>
                <p class="text-muted" style="line-height: 1.8;">Akses berbagai peraturan dan dokumen hukum desa secara online dengan mudah</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-hover text-center">
                <div class="mb-4">
                    <i class="fas fa-clock"></i>
                </div>
                <h4 class="mb-3" style="color: var(--dark); font-weight: 700;">Layanan Cepat</h4>
                <p class="text-muted" style="line-height: 1.8;">Proses konsultasi yang cepat dengan respon maksimal 2x24 jam kerja</p>
            </div>
        </div>
    </div>

    <!-- Stats & Schedule Section -->
    <div class="row g-4 mb-5">
        <div class="col-lg-6">
            <div class="card-hover" style="height: 100%;">
                <div class="d-flex align-items-center mb-4">
                    <div style="width: 50px; height: 50px; background: var(--light); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                        <i class="fas fa-chart-line" style="font-size: 1.5rem; color: var(--primary);"></i>
                    </div>
                    <h3 class="mb-0" style="color: var(--dark); font-weight: 700;">Statistik Layanan</h3>
                </div>
                
                <div class="stat-item mb-3 p-4 rounded" style="background: linear-gradient(135deg, var(--light) 0%, #ffffff 100%); border-left: 4px solid var(--primary);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted d-block mb-1">Total Konsultasi</small>
                            <h3 class="mb-0" style="color: var(--primary); font-weight: 700;">{{ $totalConsultations }}</h3>
                        </div>
                        <i class="fas fa-comments" style="font-size: 2rem; color: var(--primary); opacity: 0.3;"></i>
                    </div>
                </div>
                
                <div class="stat-item mb-3 p-4 rounded" style="background: linear-gradient(135deg, var(--light) 0%, #ffffff 100%); border-left: 4px solid var(--secondary);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted d-block mb-1">Konsultasi Selesai</small>
                            <h3 class="mb-0" style="color: var(--secondary); font-weight: 700;">{{ $completedConsultations }}</h3>
                        </div>
                        <i class="fas fa-check-circle" style="font-size: 2rem; color: var(--secondary); opacity: 0.3;"></i>
                    </div>
                </div>
                
                <div class="stat-item p-4 rounded" style="background: linear-gradient(135deg, var(--light) 0%, #ffffff 100%); border-left: 4px solid #fbbf24;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted d-block mb-1">Tingkat Kepuasan</small>
                            <h3 class="mb-0" style="color: #fbbf24; font-weight: 700;">95%</h3>
                        </div>
                        <i class="fas fa-star" style="font-size: 2rem; color: #fbbf24; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-hover" style="height: 100%;">
                <div class="d-flex align-items-center mb-4">
                    <div style="width: 50px; height: 50px; background: var(--light); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                        <i class="fas fa-calendar-alt" style="font-size: 1.5rem; color: var(--primary);"></i>
                    </div>
                    <h3 class="mb-0" style="color: var(--dark); font-weight: 700;">Jadwal Layanan</h3>
                </div>

                @forelse($schedules as $schedule)
                <div class="schedule-item mb-3 p-4 rounded" style="background: linear-gradient(135deg, var(--light) 0%, #ffffff 100%); border-left: 4px solid var(--primary); transition: all 0.3s ease;">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="mb-2" style="color: var(--dark); font-weight: 700;">
                                <i class="fas fa-calendar-day me-2" style="color: var(--primary);"></i>{{ $schedule->day }}
                            </h5>
                            <p class="mb-0 text-muted">
                                <i class="fas fa-map-marker-alt me-2"></i>{{ $schedule->location }}
                            </p>
                        </div>
                        <div class="text-end">
                            <span class="badge" style="background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 8px; font-weight: 600;">
                                <i class="fas fa-clock me-1"></i>{{ $schedule->start_time }} - {{ $schedule->end_time }}
                            </span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-5">
                    <i class="fas fa-calendar-times" style="font-size: 3rem; color: var(--primary); opacity: 0.3; margin-bottom: 1rem;"></i>
                    <p class="text-muted">Jadwal akan diumumkan segera</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Articles Section -->
    <div class="text-center mb-5 mt-5 pt-5">
        <div class="badge-custom mx-auto">
            <i class="fas fa-newspaper me-2"></i>Informasi Terkini
        </div>
        <h2 class="section-title">Artikel Terbaru</h2>
        <p class="section-subtitle">Pelajari berbagai informasi hukum yang berguna untuk Anda</p>
    </div>

    <div class="row g-4">
        @forelse($recentArticles as $article)
        <div class="col-md-4">
            <div class="card-hover" style="height: 100%; overflow: hidden;">
                @if($article->image)
                <div style="position: relative; overflow: hidden; border-radius: 12px; margin-bottom: 1.5rem;">
                    <img src="{{ Storage::url($article->image) }}" 
                         alt="{{ $article->title }}" 
                         style="width: 100%; height: 220px; object-fit: cover; transition: transform 0.3s ease;"
                         onmouseover="this.style.transform='scale(1.05)'"
                         onmouseout="this.style.transform='scale(1)'">
                    <div style="position: absolute; top: 1rem; left: 1rem;">
                        <span class="badge" style="background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 8px; font-weight: 600;">
                            <i class="fas fa-folder me-1"></i>{{ $article->category }}
                        </span>
                    </div>
                </div>
                @else
                <div style="background: linear-gradient(135deg, var(--light) 0%, #ffffff 100%); height: 220px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <i class="fas fa-image" style="font-size: 3rem; color: var(--primary); opacity: 0.3;"></i>
                </div>
                <div style="position: absolute; top: 1rem; left: 1rem;">
                    <span class="badge" style="background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 8px; font-weight: 600;">
                        <i class="fas fa-folder me-1"></i>{{ $article->category }}
                    </span>
                </div>
                @endif
                
                <h5 style="color: var(--dark); font-weight: 700; margin-bottom: 1rem; line-height: 1.4;">{{ $article->title }}</h5>
                <p class="text-muted" style="line-height: 1.8; margin-bottom: 1.5rem;">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                
                <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-outline-custom" style="padding: 0.75rem 1.5rem;">
                    <span>Baca Selengkapnya</span>
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-newspaper" style="font-size: 4rem; color: var(--primary); opacity: 0.3; margin-bottom: 1rem;"></i>
                <p class="text-muted" style="font-size: 1.1rem;">Belum ada artikel tersedia</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- CTA Section -->
    <div class="mt-5 pt-5">
        <div class="card-hover text-center" style="background: linear-gradient(135deg, var(--light) 0%, #d1fae5 100%); padding: 4rem 2rem;">
            <i class="fas fa-headset" style="font-size: 4rem; color: var(--primary); margin-bottom: 1.5rem;"></i>
            <h2 class="mb-3" style="color: var(--dark); font-weight: 800;">Butuh Bantuan Hukum?</h2>
            <p class="text-muted mb-4" style="font-size: 1.1rem; max-width: 600px; margin: 0 auto 2rem;">Jangan ragu untuk berkonsultasi dengan kami. Tim ahli kami siap membantu menyelesaikan permasalahan hukum Anda</p>
            <a href="{{ route('consultations.create') }}" class="btn btn-gradient btn-lg">
                <i class="fas fa-comments"></i>
                <span>Mulai Konsultasi</span>
            </a>
        </div>
    </div>
</div>

<style>
    .schedule-item:hover {
        transform: translateX(5px);
        box-shadow: 0 8px 16px rgba(16, 185, 129, 0.1);
    }

    .stat-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(16, 185, 129, 0.1);
    }
</style>
@endsection