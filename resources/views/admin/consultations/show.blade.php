@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">
                <i class="fas fa-file-alt me-2" style="color: #4ade80;"></i>Detail Konsultasi
            </h2>
            <p class="text-muted mb-0">Informasi lengkap konsultasi hukum</p>
        </div>
        <a href="{{ route('admin.consultations.index') }}" class="btn-back">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
    <div class="alert-success-modern mb-4">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8 mb-4">
            <!-- Informasi Pemohon Card -->
            <div class="card modern-card mb-4">
                <div class="card-header-modern">
                    <div class="header-icon green-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h5 class="mb-0">Informasi Pemohon</h5>
                </div>
                <div class="card-body p-4">
                    <!-- Status Row -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="text-muted mb-2 small fw-semibold">NOMOR TIKET</p>
                            <div class="badge-ticket">
                                <i class="fas fa-ticket-alt me-2"></i>
                                {{ $consultation->ticket_number }}
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p class="text-muted mb-2 small fw-semibold">STATUS KONSULTASI</p>
                            @php
                            $statusConfig = [
                                'pending' => ['class' => 'status-pending', 'icon' => 'clock', 'text' => 'Menunggu'],
                                'process' => ['class' => 'status-process', 'icon' => 'spinner', 'text' => 'Diproses'],
                                'completed' => ['class' => 'status-completed', 'icon' => 'check-circle', 'text' => 'Selesai'],
                                'rejected' => ['class' => 'status-rejected', 'icon' => 'times-circle', 'text' => 'Ditolak']
                            ];
                            $status = $statusConfig[$consultation->status];
                            @endphp
                            <div class="status-badge {{ $status['class'] }}">
                                <i class="fas fa-{{ $status['icon'] }} me-2"></i>{{ $status['text'] }}
                            </div>
                        </div>
                    </div>

                    <div class="divider-modern"></div>

                    <!-- Info Details -->
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-icon-wrapper">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <p class="info-label">Nama Lengkap</p>
                                <p class="info-value">{{ $consultation->name }}</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon-wrapper">
                                <i class="fas fa-id-card"></i>
                            </div>
                            <div>
                                <p class="info-label">NIK</p>
                                <p class="info-value">{{ $consultation->nik }}</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon-wrapper">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <p class="info-label">No. Telepon</p>
                                <p class="info-value">{{ $consultation->phone }}</p>
                            </div>
                        </div>

                        @if($consultation->email)
                        <div class="info-item">
                            <div class="info-icon-wrapper">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="info-label">Email</p>
                                <p class="info-value">{{ $consultation->email }}</p>
                            </div>
                        </div>
                        @endif

                        <div class="info-item full-width">
                            <div class="info-icon-wrapper">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <p class="info-label">Alamat</p>
                                <p class="info-value">{{ $consultation->address }}</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon-wrapper">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div>
                                <p class="info-label">Tanggal Pengajuan</p>
                                <p class="info-value">{{ $consultation->created_at->format('d F Y H:i') }} WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Kasus Card -->
            <div class="card modern-card">
                <div class="card-header-modern">
                    <div class="header-icon blue-icon">
                        <i class="fas fa-gavel"></i>
                    </div>
                    <h5 class="mb-0">Detail Kasus</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <p class="text-muted mb-2 small fw-semibold">KATEGORI KASUS</p>
                        <div class="category-badge">
                            <i class="fas fa-tag me-2"></i>{{ $consultation->case_category }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="text-muted mb-3 small fw-semibold">DESKRIPSI PERMASALAHAN</p>
                        <div class="description-box">
                            {{ $consultation->case_description }}
                        </div>
                    </div>

                    @if($consultation->evidence_file)
                    <div>
                        <p class="text-muted mb-3 small fw-semibold">BUKTI/DOKUMEN</p>
                        <a href="{{ Storage::url($consultation->evidence_file) }}" 
                           target="_blank" 
                           class="btn-document">
                            <i class="fas fa-paperclip me-2"></i>
                            <span>Lihat Dokumen Terlampir</span>
                            <i class="fas fa-external-link-alt ms-2 opacity-75"></i>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-4">
            <div class="card modern-card sticky-card">
                <div class="card-header-modern">
                    <div class="header-icon purple-icon">
                        <i class="fas fa-reply"></i>
                    </div>
                    <h5 class="mb-0">Respon Admin</h5>
                </div>
                <div class="card-body p-4">
                    @if($consultation->admin_response)
                    <!-- Already Responded -->
                    <div class="response-container">
                        <div class="response-badge">
                            <i class="fas fa-check-circle me-2"></i>
                            <span>Telah Ditanggapi</span>
                        </div>
                        <p class="response-date">
                            <i class="fas fa-clock me-2"></i>
                            {{ $consultation->responded_at->format('d F Y H:i') }} WIB
                        </p>
                        <div class="response-content">
                            {{ $consultation->admin_response }}
                        </div>
                    </div>
                    <button type="button" class="btn-edit w-100 mt-3" 
                            data-bs-toggle="modal" 
                            data-bs-target="#updateResponseModal">
                        <i class="fas fa-edit me-2"></i>Edit Respon
                    </button>
                    @else
                    <!-- Response Form -->
                    <form action="{{ route('admin.consultations.update', $consultation) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="form-label-custom">
                                <i class="fas fa-tasks me-2"></i>Status
                            </label>
                            <select name="status" class="form-select-custom" required>
                                <option value="pending" {{ $consultation->status == 'pending' ? 'selected' : '' }}>
                                    Menunggu
                                </option>
                                <option value="process" {{ $consultation->status == 'process' ? 'selected' : '' }}>
                                    Diproses
                                </option>
                                <option value="completed" {{ $consultation->status == 'completed' ? 'selected' : '' }}>
                                    Selesai
                                </option>
                                <option value="rejected" {{ $consultation->status == 'rejected' ? 'selected' : '' }}>
                                    Ditolak
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-custom">
                                <i class="fas fa-comment-alt me-2"></i>Respon/Saran Hukum
                            </label>
                            <textarea name="admin_response" 
                                      class="form-control-custom" 
                                      rows="8" 
                                      placeholder="Berikan respon dan saran hukum untuk pemohon..." 
                                      required></textarea>
                        </div>

                        <button type="submit" class="btn-submit w-100">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Respon
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if($consultation->admin_response)
<!-- Update Response Modal -->
<div class="modal fade" id="updateResponseModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-modern">
            <form action="{{ route('admin.consultations.update', $consultation) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">
                        <i class="fas fa-edit me-2" style="color: #4ade80;"></i>Edit Respon
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label class="form-label-custom">
                            <i class="fas fa-tasks me-2"></i>Status
                        </label>
                        <select name="status" class="form-select-custom" required>
                            <option value="pending" {{ $consultation->status == 'pending' ? 'selected' : '' }}>
                                Menunggu
                            </option>
                            <option value="process" {{ $consultation->status == 'process' ? 'selected' : '' }}>
                                Diproses
                            </option>
                            <option value="completed" {{ $consultation->status == 'completed' ? 'selected' : '' }}>
                                Selesai
                            </option>
                            <option value="rejected" {{ $consultation->status == 'rejected' ? 'selected' : '' }}>
                                Ditolak
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label-custom">
                            <i class="fas fa-comment-alt me-2"></i>Respon/Saran Hukum
                        </label>
                        <textarea name="admin_response" 
                                  class="form-control-custom" 
                                  rows="8" 
                                  required>{{ $consultation->admin_response }}</textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<style>
    :root {
        --green-50: #f0fdf4;
        --green-100: #dcfce7;
        --green-200: #bbf7d0;
        --green-300: #86efac;
        --green-400: #4ade80;
        --green-500: #22c55e;
        --green-600: #16a34a;
        --green-700: #15803d;
        --green-800: #166534;
        --slate-50: #f8fafc;
        --slate-100: #f1f5f9;
        --slate-200: #e2e8f0;
        --slate-300: #cbd5e1;
        --slate-600: #475569;
        --slate-700: #334155;
        --slate-800: #1e293b;
    }

    body {
        background: var(--slate-50);
    }

    /* Modern Card */
    .modern-card {
        background: white;
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .modern-card:hover {
        box-shadow: 0 10px 30px rgba(34, 197, 94, 0.08);
        transform: translateY(-2px);
    }

    /* Card Header */
    .card-header-modern {
        background: white;
        padding: 24px;
        border-bottom: 1px solid var(--slate-100);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .header-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .green-icon {
        background: linear-gradient(135deg, var(--green-50) 0%, var(--green-100) 100%);
        color: var(--green-600);
    }

    .blue-icon {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        color: #2563eb;
    }

    .purple-icon {
        background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
        color: #9333ea;
    }

    .card-header-modern h5 {
        color: var(--slate-800);
        font-weight: 700;
        font-size: 18px;
    }

    /* Back Button */
    .btn-back {
        background: white;
        color: var(--slate-700);
        padding: 10px 20px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        border: 1px solid var(--slate-200);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }

    .btn-back:hover {
        background: var(--slate-50);
        color: var(--slate-800);
        border-color: var(--slate-300);
        transform: translateX(-4px);
    }

    /* Alert */
    .alert-success-modern {
        background: linear-gradient(135deg, var(--green-50) 0%, var(--green-100) 100%);
        border: 1px solid var(--green-200);
        border-radius: 16px;
        padding: 16px 20px;
        color: var(--green-800);
        font-weight: 600;
        display: flex;
        align-items: center;
        position: relative;
    }

    .alert-success-modern .btn-close {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
    }

    /* Divider */
    .divider-modern {
        height: 1px;
        background: var(--slate-100);
        margin: 24px 0;
    }

    /* Badges */
    .badge-ticket {
        background: linear-gradient(135deg, var(--slate-50) 0%, var(--slate-100) 100%);
        color: var(--slate-700);
        padding: 12px 20px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        border: 1px solid var(--slate-200);
    }

    .status-badge {
        padding: 10px 18px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        letter-spacing: 0.3px;
    }

    .status-pending {
        background: linear-gradient(135deg, #fef9c3 0%, #fef08a 100%);
        color: #854d0e;
        border: 1px solid #fde047;
    }

    .status-process {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #1e40af;
        border: 1px solid #93c5fd;
    }

    .status-completed {
        background: linear-gradient(135deg, var(--green-100) 0%, var(--green-200) 100%);
        color: var(--green-800);
        border: 1px solid var(--green-300);
    }

    .status-rejected {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #991b1b;
        border: 1px solid #fca5a5;
    }

    .category-badge {
        background: linear-gradient(135deg, var(--green-50) 0%, var(--green-100) 100%);
        color: var(--green-700);
        padding: 12px 20px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        border: 1px solid var(--green-200);
    }

    /* Info Grid */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    .info-item {
        display: flex;
        gap: 14px;
        align-items: flex-start;
    }

    .info-item.full-width {
        grid-column: 1 / -1;
    }

    .info-icon-wrapper {
        width: 42px;
        height: 42px;
        background: linear-gradient(135deg, var(--green-50) 0%, var(--green-100) 100%);
        color: var(--green-600);
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 16px;
        border: 1px solid var(--green-200);
    }

    .info-label {
        font-size: 11px;
        color: var(--slate-600);
        margin-bottom: 4px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .info-value {
        font-size: 15px;
        color: var(--slate-800);
        font-weight: 600;
        margin-bottom: 0;
        line-height: 1.5;
    }

    /* Description Box */
    .description-box {
        background: var(--slate-50);
        border: 1px solid var(--slate-200);
        border-radius: 14px;
        padding: 20px;
        color: var(--slate-700);
        line-height: 1.8;
        font-size: 15px;
    }

    /* Document Button */
    .btn-document {
        display: inline-flex;
        align-items: center;
        background: linear-gradient(135deg, var(--green-500) 0%, var(--green-600) 100%);
        color: white;
        padding: 14px 24px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        box-shadow: 0 2px 8px rgba(34, 197, 94, 0.2);
    }

    .btn-document:hover {
        background: linear-gradient(135deg, var(--green-600) 0%, var(--green-700) 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(34, 197, 94, 0.3);
        color: white;
    }

    /* Response Container */
    .response-container {
        background: linear-gradient(135deg, var(--green-50) 0%, var(--green-100) 100%);
        border: 1px solid var(--green-200);
        border-radius: 16px;
        padding: 20px;
    }

    .response-badge {
        display: inline-flex;
        align-items: center;
        background: white;
        color: var(--green-700);
        font-weight: 700;
        font-size: 13px;
        padding: 8px 16px;
        border-radius: 20px;
        margin-bottom: 12px;
        border: 1px solid var(--green-200);
    }

    .response-date {
        color: var(--green-700);
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
    }

    .response-content {
        background: white;
        border: 1px solid var(--green-200);
        border-radius: 12px;
        padding: 18px;
        color: var(--slate-700);
        line-height: 1.8;
        font-size: 14px;
    }

    /* Form Elements */
    .form-label-custom {
        color: var(--slate-700);
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .form-select-custom,
    .form-control-custom {
        border: 1.5px solid var(--slate-200);
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 14px;
        transition: all 0.3s ease;
        color: var(--slate-700);
        background: white;
    }

    .form-select-custom:focus,
    .form-control-custom:focus {
        border-color: var(--green-400);
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.08);
        outline: none;
        background: white;
    }

    .form-control-custom {
        resize: vertical;
        line-height: 1.6;
    }

    /* Buttons */
    .btn-edit {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2);
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--green-500) 0%, var(--green-600) 100%);
        color: white;
        border: none;
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 15px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 12px rgba(34, 197, 94, 0.25);
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, var(--green-600) 0%, var(--green-700) 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(34, 197, 94, 0.35);
    }

    /* Modal */
    .modal-modern {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    /* Sticky Card */
    .sticky-card {
        position: sticky;
        top: 24px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .info-grid {
            grid-template-columns: 1fr;
        }

        .sticky-card {
            position: relative;
            top: 0;
        }

        .badge-ticket,
        .status-badge {
            font-size: 13px;
            padding: 10px 16px;
        }

        .modern-card {
            border-radius: 16px;
        }

        .card-header-modern {
            padding: 20px;
        }
    }

    /* Smooth Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .modern-card {
        animation: fadeInUp 0.5s ease-out;
    }

    .modern-card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .modern-card:nth-child(3) {
        animation-delay: 0.2s;
    }
</style>
@endsection