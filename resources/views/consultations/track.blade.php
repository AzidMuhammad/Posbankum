@extends('layouts.app')

@section('content')
<div class="min-vh-100" style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Card Utama -->
                <div class="card border-0 shadow-lg" style="border-radius: 24px; overflow: hidden;">
                    <!-- Header dengan gradient -->
                    <div class="card-header text-white border-0 p-4" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-white bg-opacity-25 p-3 me-3">
                                <i class="fas fa-search" style="font-size: 24px;"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold">Lacak Status Konsultasi</h3>
                                <small class="opacity-90">Cek perkembangan konsultasi Anda</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-5">
                        <!-- Alert Messages -->
                        @if(session('success'))
                        <div class="alert border-0 mb-4" style="background-color: #d1fae5; color: #065f46; border-radius: 16px;">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-check-circle me-3 mt-1" style="font-size: 20px;"></i>
                                <div class="flex-grow-1">
                                    {{ session('success') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" style="font-size: 12px;"></button>
                            </div>
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert border-0 mb-4" style="background-color: #fee2e2; color: #991b1b; border-radius: 16px;">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-exclamation-circle me-3 mt-1" style="font-size: 20px;"></i>
                                <div class="flex-grow-1">
                                    {{ session('error') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" style="font-size: 12px;"></button>
                            </div>
                        </div>
                        @endif

                        <!-- Ilustrasi Icon -->
                        <div class="text-center mb-4">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
                                 style="width: 120px; height: 120px; background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);">
                                <i class="fas fa-ticket-alt" style="font-size: 60px; color: #059669;"></i>
                            </div>
                            <p class="text-muted mb-0" style="font-size: 15px; line-height: 1.6;">
                                Masukkan nomor tiket konsultasi untuk melihat<br>status dan respon dari tim POSBANKUM
                            </p>
                        </div>

                        <!-- Form -->
                        <form action="{{ route('consultations.search') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label fw-semibold mb-3" style="color: #065f46; font-size: 15px;">
                                    <i class="fas fa-hashtag me-2"></i>Nomor Tiket
                                </label>
                                <input type="text" 
                                       name="ticket_number" 
                                       class="form-control form-control-lg border-2" 
                                       placeholder="POSBANKUM-YYYYMMDD-0001" 
                                       style="border-radius: 16px; border-color: #d1fae5; padding: 16px 20px; font-size: 16px;"
                                       onfocus="this.style.borderColor='#10b981'; this.style.boxShadow='0 0 0 0.2rem rgba(16, 185, 129, 0.15)'"
                                       onblur="this.style.borderColor='#d1fae5'; this.style.boxShadow='none'"
                                       required>
                                <small class="text-muted d-block mt-2" style="font-size: 13px;">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Contoh format: POSBANKUM-20240101-0001
                                </small>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-lg text-white border-0 fw-semibold" 
                                        style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 16px; padding: 16px; font-size: 16px; transition: all 0.3s ease;"
                                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(16, 185, 129, 0.3)'"
                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    <i class="fas fa-search me-2"></i>Cek Status Konsultasi
                                </button>
                            </div>
                        </form>

                        <!-- Divider -->
                        <div class="position-relative my-4">
                            <hr class="my-0" style="border-color: #d1fae5;">
                            <div class="position-absolute top-50 start-50 translate-middle px-3" 
                                 style="background-color: white;">
                                <small class="text-muted fw-semibold">ATAU</small>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="text-center p-4 rounded-4" style="background-color: #f0fdf4;">
                            <i class="fas fa-question-circle mb-3" style="font-size: 32px; color: #10b981;"></i>
                            <p class="mb-3" style="color: #065f46; font-size: 15px;">
                                <strong>Belum punya nomor tiket?</strong><br>
                                <small class="text-muted">Ajukan konsultasi hukum gratis sekarang</small>
                            </p>
                            <a href="{{ route('consultations.create') }}" 
                               class="btn btn-outline-success btn-lg border-2 fw-semibold" 
                               style="border-radius: 16px; padding: 12px 32px; transition: all 0.3s ease;"
                               onmouseover="this.style.backgroundColor='#10b981'; this.style.borderColor='#10b981'; this.style.color='white'"
                               onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='#10b981'; this.style.color='#10b981'">
                                <i class="fas fa-plus-circle me-2"></i>Ajukan Konsultasi Baru
                            </a>
                        </div>

                        <!-- Info Banner -->
                        <div class="mt-4 p-3 rounded-3 d-flex align-items-start" style="background-color: #ecfdf5; border-left: 4px solid #10b981;">
                            <i class="fas fa-shield-alt me-3 mt-1" style="color: #059669; font-size: 18px;"></i>
                            <div style="font-size: 13px; color: #065f46; line-height: 1.6;">
                                <strong class="d-block mb-1">Layanan Rahasia & Profesional</strong>
                                <small class="text-muted">
                                    Semua konsultasi dijamin kerahasiaannya dan ditangani oleh tim hukum berpengalaman
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Info -->
                <div class="row g-3 mt-3">
                    <div class="col-4">
                        <div class="text-center p-3 bg-white rounded-4 shadow-sm" style="border-top: 3px solid #10b981;">
                            <i class="fas fa-clock mb-2" style="font-size: 24px; color: #10b981;"></i>
                            <div style="font-size: 12px; color: #065f46; font-weight: 600;">Respon Cepat</div>
                            <small class="text-muted" style="font-size: 11px;">Maks 2x24 jam</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center p-3 bg-white rounded-4 shadow-sm" style="border-top: 3px solid #10b981;">
                            <i class="fas fa-user-shield mb-2" style="font-size: 24px; color: #10b981;"></i>
                            <div style="font-size: 12px; color: #065f46; font-weight: 600;">Profesional</div>
                            <small class="text-muted" style="font-size: 11px;">Tim bersertifikat</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center p-3 bg-white rounded-4 shadow-sm" style="border-top: 3px solid #10b981;">
                            <i class="fas fa-lock mb-2" style="font-size: 24px; color: #10b981;"></i>
                            <div style="font-size: 12px; color: #065f46; font-weight: 600;">100% Gratis</div>
                            <small class="text-muted" style="font-size: 11px;">Tanpa biaya</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection