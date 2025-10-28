@extends('layouts.app')

@section('content')
<div class="min-vh-100" style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Main Card -->
                <div class="card border-0 shadow-lg" style="border-radius: 24px; overflow: hidden;">
                    <!-- Header -->
                    <div class="card-header text-white border-0 p-4" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-white bg-opacity-25 p-3 me-3">
                                <i class="fas fa-info-circle" style="font-size: 24px;"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold">Detail Konsultasi</h3>
                                <small class="opacity-90">Status dan informasi lengkap konsultasi Anda</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <!-- Ticket & Status Header -->
                        <div class="row mb-4 g-3">
                            <div class="col-md-6">
                                <div class="p-3 rounded-3" style="background-color: #f0fdf4; border: 2px solid #d1fae5;">
                                    <small class="text-muted d-block mb-1" style="font-size: 12px;">NOMOR TIKET</small>
                                    <h5 class="mb-0 fw-bold" style="color: #059669;">
                                        <i class="fas fa-ticket-alt me-2"></i>{{ $consultation->ticket_number }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 text-md-end" style="background-color: #f0fdf4; border: 2px solid #d1fae5;">
                                    <small class="text-muted d-block mb-1" style="font-size: 12px;">STATUS</small>
                                    @php
                                    $statusConfig = [
                                        'pending' => ['color' => '#f59e0b', 'bg' => '#fef3c7', 'icon' => 'clock', 'text' => 'Menunggu'],
                                        'process' => ['color' => '#3b82f6', 'bg' => '#dbeafe', 'icon' => 'spinner', 'text' => 'Diproses'],
                                        'completed' => ['color' => '#10b981', 'bg' => '#d1fae5', 'icon' => 'check-circle', 'text' => 'Selesai'],
                                        'rejected' => ['color' => '#ef4444', 'bg' => '#fee2e2', 'icon' => 'times-circle', 'text' => 'Ditolak']
                                    ];
                                    $status = $statusConfig[$consultation->status];
                                    @endphp
                                    <span class="badge px-3 py-2" style="background-color: {{ $status['bg'] }}; color: {{ $status['color'] }}; font-size: 14px; font-weight: 600;">
                                        <i class="fas fa-{{ $status['icon'] }} me-1"></i>{{ $status['text'] }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <hr style="border-color: #d1fae5; opacity: 0.5;">

                        <!-- Data Pemohon -->
                        <div class="mb-4">
                            <h5 class="mb-3 d-flex align-items-center" style="color: #065f46;">
                                <div class="rounded-circle p-2 me-2" style="background-color: #d1fae5;">
                                    <i class="fas fa-user" style="font-size: 16px; color: #059669;"></i>
                                </div>
                                Data Pemohon
                            </h5>
                            <div class="p-4 rounded-3" style="background-color: #f9fafb;">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <small class="text-muted d-block mb-1" style="font-size: 12px; font-weight: 600;">NAMA</small>
                                        <p class="mb-0" style="color: #1f2937;">{{ $consultation->name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <small class="text-muted d-block mb-1" style="font-size: 12px; font-weight: 600;">NIK</small>
                                        <p class="mb-0" style="color: #1f2937;">{{ $consultation->nik }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <small class="text-muted d-block mb-1" style="font-size: 12px; font-weight: 600;">NO. TELEPON</small>
                                        <p class="mb-0" style="color: #1f2937;">
                                            <i class="fas fa-phone me-1" style="color: #10b981;"></i>{{ $consultation->phone }}
                                        </p>
                                    </div>
                                    @if($consultation->email)
                                    <div class="col-md-6">
                                        <small class="text-muted d-block mb-1" style="font-size: 12px; font-weight: 600;">EMAIL</small>
                                        <p class="mb-0" style="color: #1f2937;">
                                            <i class="fas fa-envelope me-1" style="color: #10b981;"></i>{{ $consultation->email }}
                                        </p>
                                    </div>
                                    @endif
                                    <div class="col-12">
                                        <small class="text-muted d-block mb-1" style="font-size: 12px; font-weight: 600;">ALAMAT</small>
                                        <p class="mb-0" style="color: #1f2937;">
                                            <i class="fas fa-map-marker-alt me-1" style="color: #10b981;"></i>{{ $consultation->address }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Detail Kasus -->
                        <div class="mb-4">
                            <h5 class="mb-3 d-flex align-items-center" style="color: #065f46;">
                                <div class="rounded-circle p-2 me-2" style="background-color: #d1fae5;">
                                    <i class="fas fa-folder-open" style="font-size: 16px; color: #059669;"></i>
                                </div>
                                Detail Kasus
                            </h5>
                            <div class="p-4 rounded-3" style="background-color: #ecfdf5; border: 1px solid #d1fae5;">
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1" style="font-size: 12px; font-weight: 600;">KATEGORI</small>
                                    <span class="badge px-3 py-2" style="background-color: #10b981; color: white; font-size: 13px;">
                                        <i class="fas fa-tag me-1"></i>{{ $consultation->case_category }}
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1" style="font-size: 12px; font-weight: 600;">TANGGAL PENGAJUAN</small>
                                    <p class="mb-0" style="color: #065f46;">
                                        <i class="fas fa-calendar-alt me-1"></i>{{ $consultation->created_at->format('d F Y H:i') }} WIB
                                    </p>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-2" style="font-size: 12px; font-weight: 600;">DESKRIPSI PERMASALAHAN</small>
                                    <div class="p-3 rounded-3" style="background-color: white; border: 1px solid #d1fae5;">
                                        <p class="mb-0" style="color: #1f2937; line-height: 1.8; white-space: pre-wrap;">{{ $consultation->case_description }}</p>
                                    </div>
                                </div>
                                
                                @if($consultation->evidence_file)
                                <div class="mt-3">
                                    <a href="{{ Storage::url($consultation->evidence_file) }}" 
                                       target="_blank" 
                                       class="btn btn-outline-success border-2"
                                       style="border-radius: 10px; padding: 10px 20px;">
                                        <i class="fas fa-paperclip me-2"></i>Lihat Bukti/Dokumen
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Response Section -->
                        @if($consultation->admin_response)
                        <div class="mb-4">
                            <h5 class="mb-3 d-flex align-items-center" style="color: #065f46;">
                                <div class="rounded-circle p-2 me-2" style="background-color: #d1fae5;">
                                    <i class="fas fa-reply" style="font-size: 16px; color: #059669;"></i>
                                </div>
                                Respon Admin
                            </h5>
                            <div class="p-4 rounded-3" style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border: 2px solid #10b981;">
                                <div class="d-flex align-items-start mb-3">
                                    <i class="fas fa-user-tie me-2 mt-1" style="color: #059669; font-size: 20px;"></i>
                                    <div>
                                        <small class="text-muted d-block" style="font-size: 12px; font-weight: 600;">DITANGGAPI PADA</small>
                                        <p class="mb-0" style="color: #065f46;">{{ $consultation->responded_at->format('d F Y H:i') }} WIB</p>
                                    </div>
                                </div>
                                <div class="p-3 rounded-3" style="background-color: white;">
                                    <p class="mb-0" style="color: #1f2937; line-height: 1.8; white-space: pre-wrap;">{{ $consultation->admin_response }}</p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="p-4 rounded-3 mb-4" style="background-color: #dbeafe; border-left: 4px solid #3b82f6;">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-hourglass-half me-3 mt-1" style="color: #1d4ed8; font-size: 24px;"></i>
                                <div>
                                    <strong class="d-block mb-1" style="color: #1e3a8a;">Konsultasi Sedang Ditinjau</strong>
                                    <p class="mb-0" style="color: #1e40af; font-size: 14px; line-height: 1.6;">
                                        Tim POSBANKUM sedang meninjau konsultasi Anda. Respon akan diberikan maksimal 2x24 jam kerja. Kami akan memberikan solusi terbaik untuk permasalahan hukum Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="d-grid gap-3">
                            <a href="{{ route('consultations.track') }}" 
                               class="btn btn-lg text-white border-0 fw-semibold" 
                               style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 12px; padding: 14px;"
                               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(16, 185, 129, 0.3)'"
                               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Pencarian
                            </a>
                            <a href="{{ route('consultations.create') }}" 
                               class="btn btn-lg btn-outline-success border-2 fw-semibold" 
                               style="border-radius: 12px; padding: 14px;">
                                <i class="fas fa-plus-circle me-2"></i>Ajukan Konsultasi Baru
                            </a>
                        </div>

                        <!-- Help Banner -->
                        <div class="mt-4 p-3 rounded-3 d-flex align-items-start" style="background-color: #f0fdf4; border: 1px solid #d1fae5;">
                            <i class="fas fa-question-circle me-3 mt-1" style="color: #10b981; font-size: 20px;"></i>
                            <div style="font-size: 13px; color: #065f46; line-height: 1.6;">
                                <strong class="d-block mb-1">Butuh Bantuan?</strong>
                                <small class="text-muted">
                                    Jika ada pertanyaan lebih lanjut, hubungi tim POSBANKUM atau ajukan konsultasi baru untuk masalah berbeda.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Progress -->
                <div class="card border-0 shadow-sm mt-4" style="border-radius: 20px;">
                    <div class="card-body p-4">
                        <h6 class="mb-3 fw-bold" style="color: #065f46;">
                            <i class="fas fa-history me-2"></i>Timeline Konsultasi
                        </h6>
                        <div class="position-relative">
                            <!-- Timeline Item 1 -->
                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 36px; height: 36px; background-color: #10b981;">
                                        <i class="fas fa-check" style="color: white; font-size: 14px;"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <strong class="d-block" style="color: #065f46; font-size: 14px;">Konsultasi Diajukan</strong>
                                    <small class="text-muted">{{ $consultation->created_at->format('d F Y H:i') }} WIB</small>
                                </div>
                            </div>
                            
                            <!-- Timeline Connector -->
                            @if($consultation->status != 'pending')
                            <div style="width: 2px; height: 20px; background-color: #d1fae5; margin-left: 17px; margin-bottom: 8px;"></div>
                            
                            <!-- Timeline Item 2 -->
                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 36px; height: 36px; background-color: {{ $consultation->admin_response ? '#10b981' : '#d1fae5' }};">
                                        <i class="fas {{ $consultation->admin_response ? 'fa-check' : 'fa-clock' }}" 
                                           style="color: {{ $consultation->admin_response ? 'white' : '#10b981' }}; font-size: 14px;"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <strong class="d-block" style="color: #065f46; font-size: 14px;">
                                        {{ $consultation->admin_response ? 'Respon Diberikan' : 'Menunggu Respon' }}
                                    </strong>
                                    <small class="text-muted">
                                        {{ $consultation->responded_at ? $consultation->responded_at->format('d F Y H:i') . ' WIB' : 'Sedang diproses' }}
                                    </small>
                                </div>
                            </div>
                            @endif
                            
                            @if($consultation->status == 'completed')
                            <div style="width: 2px; height: 20px; background-color: #d1fae5; margin-left: 17px; margin-bottom: 8px;"></div>
                            
                            <!-- Timeline Item 3 -->
                            <div class="d-flex">
                                <div class="me-3">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 36px; height: 36px; background-color: #10b981;">
                                        <i class="fas fa-check-double" style="color: white; font-size: 14px;"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <strong class="d-block" style="color: #065f46; font-size: 14px;">Konsultasi Selesai</strong>
                                    <small class="text-muted">Status ditandai selesai</small>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="row g-3 mt-3">
                    <div class="col-4">
                        <div class="text-center p-3 bg-white rounded-3 shadow-sm">
                            <div class="mb-2" style="color: #10b981; font-size: 24px; font-weight: 700;">
                                {{ \Carbon\Carbon::parse($consultation->created_at)->diffInHours(now()) }}j
                            </div>
                            <small class="text-muted" style="font-size: 11px;">Waktu Tunggu</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center p-3 bg-white rounded-3 shadow-sm">
                            <div class="mb-2" style="color: #10b981; font-size: 24px; font-weight: 700;">
                                {{ strlen($consultation->case_description) }}
                            </div>
                            <small class="text-muted" style="font-size: 11px;">Karakter Deskripsi</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center p-3 bg-white rounded-3 shadow-sm">
                            <div class="mb-2" style="color: #10b981; font-size: 24px; font-weight: 700;">
                                {{ $consultation->evidence_file ? '✓' : '✗' }}
                            </div>
                            <small class="text-muted" style="font-size: 11px;">Dokumen</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection