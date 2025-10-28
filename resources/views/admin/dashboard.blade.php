@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold mb-1" style="color: #2d3748;">
                        <i class="fas fa-tachometer-alt me-2" style="color: #56ab91;"></i>Dashboard Admin POSBANKUM
                    </h2>
                    <p class="text-muted mb-0">Selamat datang, <strong style="color: #56ab91;">{{ auth()->user()->name }}</strong></p>
                </div>
                <div class="text-end d-none d-md-block">
                    <small class="text-muted d-block">{{ now()->format('l, d F Y') }}</small>
                    <small class="text-muted">{{ now()->format('H:i') }} WIB</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm hover-lift" style="border-radius: 16px; background: linear-gradient(135deg, #ffd93d 0%, #f6c344 100%); transition: all 0.3s ease;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="text-white">
                            <p class="text-uppercase mb-2 fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; opacity: 0.9;">Menunggu</p>
                            <h2 class="mb-0 fw-bold" style="font-size: 2.5rem;">{{ $stats['pending_consultations'] }}</h2>
                            <small style="opacity: 0.85;">Konsultasi pending</small>
                        </div>
                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2);">
                            <i class="fas fa-clock" style="font-size: 1.8rem; color: white;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm hover-lift" style="border-radius: 16px; background: linear-gradient(135deg, #56ab91 0%, #3d8b6d 100%); transition: all 0.3s ease;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="text-white">
                            <p class="text-uppercase mb-2 fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; opacity: 0.9;">Total Konsultasi</p>
                            <h2 class="mb-0 fw-bold" style="font-size: 2.5rem;">{{ $stats['total_consultations'] }}</h2>
                            <small style="opacity: 0.85;">Seluruh konsultasi</small>
                        </div>
                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2);">
                            <i class="fas fa-comments" style="font-size: 1.8rem; color: white;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm hover-lift" style="border-radius: 16px; background: linear-gradient(135deg, #a8e6cf 0%, #7dd3a7 100%); transition: all 0.3s ease;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="text-white">
                            <p class="text-uppercase mb-2 fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; opacity: 0.9;">Artikel</p>
                            <h2 class="mb-0 fw-bold" style="font-size: 2.5rem;">{{ $stats['total_articles'] }}</h2>
                            <small style="opacity: 0.85;">Artikel terpublikasi</small>
                        </div>
                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2);">
                            <i class="fas fa-newspaper" style="font-size: 1.8rem; color: white;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm hover-lift" style="border-radius: 16px; background: linear-gradient(135deg, #6ec5d9 0%, #4fa8bb 100%); transition: all 0.3s ease;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="text-white">
                            <p class="text-uppercase mb-2 fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; opacity: 0.9;">Produk Hukum</p>
                            <h2 class="mb-0 fw-bold" style="font-size: 2.5rem;">{{ $stats['total_legal_products'] }}</h2>
                            <small style="opacity: 0.85;">Dokumen hukum</small>
                        </div>
                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2);">
                            <i class="fas fa-file-contract" style="font-size: 1.8rem; color: white;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Recent Consultations Table -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
                <div class="card-header border-0 py-3" style="background: linear-gradient(135deg, #e8f5f1 0%, #d4edda 100%);">
                    <h5 class="mb-0 fw-semibold" style="color: #2d3748;">
                        <i class="fas fa-list me-2" style="color: #56ab91;"></i>Konsultasi Terbaru
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead style="background-color: #f8fafb;">
                                <tr>
                                    <th class="border-0 py-3" style="color: #4a5568; font-weight: 600; font-size: 0.85rem;">Tiket</th>
                                    <th class="border-0 py-3" style="color: #4a5568; font-weight: 600; font-size: 0.85rem;">Nama</th>
                                    <th class="border-0 py-3" style="color: #4a5568; font-weight: 600; font-size: 0.85rem;">Kategori</th>
                                    <th class="border-0 py-3" style="color: #4a5568; font-weight: 600; font-size: 0.85rem;">Status</th>
                                    <th class="border-0 py-3" style="color: #4a5568; font-weight: 600; font-size: 0.85rem;">Tanggal</th>
                                    <th class="border-0 py-3" style="color: #4a5568; font-weight: 600; font-size: 0.85rem;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentConsultations as $consultation)
                                <tr>
                                    <td class="align-middle py-3">
                                        <span class="badge rounded-pill px-3" style="background-color: #e8f5f1; color: #56ab91; font-weight: 500;">
                                            {{ $consultation->ticket_number }}
                                        </span>
                                    </td>
                                    <td class="align-middle py-3" style="color: #2d3748; font-weight: 500;">{{ $consultation->name }}</td>
                                    <td class="align-middle py-3" style="color: #4a5568;">{{ $consultation->case_category }}</td>
                                    <td class="align-middle py-3">
                                        @php
                                        $statusConfig = [
                                            'pending' => ['bg' => '#fff8e1', 'color' => '#f6c344', 'text' => 'Menunggu'],
                                            'process' => ['bg' => '#e3f2fd', 'color' => '#4fa8bb', 'text' => 'Diproses'],
                                            'completed' => ['bg' => '#e8f5f1', 'color' => '#56ab91', 'text' => 'Selesai'],
                                            'rejected' => ['bg' => '#ffebee', 'color' => '#e57373', 'text' => 'Ditolak']
                                        ];
                                        $status = $statusConfig[$consultation->status];
                                        @endphp
                                        <span class="badge rounded-pill px-3" style="background-color: {{ $status['bg'] }}; color: {{ $status['color'] }}; font-weight: 500;">
                                            {{ $status['text'] }}
                                        </span>
                                    </td>
                                    <td class="align-middle py-3" style="color: #718096;">{{ $consultation->created_at->format('d/m/Y') }}</td>
                                    <td class="align-middle py-3">
                                        <a href="{{ route('admin.consultations.show', $consultation) }}" 
                                           class="btn btn-sm rounded-pill px-3" 
                                           style="background-color: #56ab91; color: white; transition: all 0.3s ease;">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="fas fa-inbox mb-3" style="font-size: 3rem; color: #a8e6cf;"></i>
                                        <p class="text-muted mb-0">Belum ada konsultasi</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer border-0 py-3" style="background-color: #f8fafb;">
                    <a href="{{ route('admin.consultations.index') }}" 
                       class="btn rounded-pill px-4" 
                       style="background-color: #56ab91; color: white; font-weight: 500; transition: all 0.3s ease;">
                        Lihat Semua Konsultasi <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Quick Menu -->
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px; overflow: hidden;">
                <div class="card-header border-0 py-3" style="background: linear-gradient(135deg, #56ab91 0%, #3d8b6d 100%);">
                    <h5 class="mb-0 fw-semibold text-white">
                        <i class="fas fa-link me-2"></i>Menu Cepat
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-grid gap-3">
                        <a href="{{ route('admin.consultations.index') }}" 
                           class="btn btn-lg text-start d-flex align-items-center justify-content-between" 
                           style="background-color: #e8f5f1; color: #56ab91; border: 2px solid #a8e6cf; border-radius: 12px; font-weight: 500; transition: all 0.3s ease;">
                            <span><i class="fas fa-comments me-2"></i>Kelola Konsultasi</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('admin.articles.index') }}" 
                           class="btn btn-lg text-start d-flex align-items-center justify-content-between" 
                           style="background-color: #e8f5f1; color: #56ab91; border: 2px solid #a8e6cf; border-radius: 12px; font-weight: 500; transition: all 0.3s ease;">
                            <span><i class="fas fa-newspaper me-2"></i>Kelola Artikel</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="#" 
                           class="btn btn-lg text-start d-flex align-items-center justify-content-between" 
                           style="background-color: #e8f5f1; color: #56ab91; border: 2px solid #a8e6cf; border-radius: 12px; font-weight: 500; transition: all 0.3s ease;">
                            <span><i class="fas fa-file-contract me-2"></i>Kelola Produk Hukum</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="#" 
                           class="btn btn-lg text-start d-flex align-items-center justify-content-between" 
                           style="background-color: #e8f5f1; color: #56ab91; border: 2px solid #a8e6cf; border-radius: 12px; font-weight: 500; transition: all 0.3s ease;">
                            <span><i class="fas fa-calendar me-2"></i>Kelola Jadwal</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- System Information -->
            <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
                <div class="card-header border-0 py-3" style="background: linear-gradient(135deg, #a8e6cf 0%, #7dd3a7 100%);">
                    <h5 class="mb-0 fw-semibold text-white">
                        <i class="fas fa-info-circle me-2"></i>Informasi Sistem
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3 pb-3" style="border-bottom: 1px solid #e8f5f1;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span style="color: #718096; font-size: 0.9rem;">Versi</span>
                            <strong style="color: #2d3748;">1.0.0</strong>
                        </div>
                    </div>
                    <div class="mb-3 pb-3" style="border-bottom: 1px solid #e8f5f1;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span style="color: #718096; font-size: 0.9rem;">Laravel</span>
                            <strong style="color: #2d3748;">11.x</strong>
                        </div>
                    </div>
                    <div class="mb-3 pb-3" style="border-bottom: 1px solid #e8f5f1;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span style="color: #718096; font-size: 0.9rem;">PHP</span>
                            <strong style="color: #2d3748;">{{ phpversion() }}</strong>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span style="color: #718096; font-size: 0.9rem;">Database</span>
                            <strong style="color: #2d3748;">MySQL</strong>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-0 text-center py-3" style="background-color: #f8fafb;">
                    <small class="text-muted">
                        <i class="fas fa-shield-alt me-1" style="color: #56ab91;"></i>
                        Sistem berjalan normal
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(86, 171, 145, 0.2) !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(86, 171, 145, 0.2);
}

.table tbody tr {
    transition: background-color 0.2s ease;
}

.table tbody tr:hover {
    background-color: #f8fafb;
}

.card-body a.btn:hover {
    background-color: #3d8b6d !important;
    border-color: #56ab91 !important;
    color: white !important;
}

.table .btn:hover {
    background-color: #3d8b6d !important;
    transform: scale(1.05);
}
</style>
@endsection