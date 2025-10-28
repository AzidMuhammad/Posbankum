@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">
                <i class="fas fa-comments me-2" style="color: #10b981;"></i>Kelola Konsultasi
            </h2>
            <p class="text-muted mb-0">Kelola dan pantau semua konsultasi hukum</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-light border shadow-sm">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Main Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
        <div class="card-body p-4">
            <!-- Filters Section -->
            <div class="row g-3 mb-4">
                <div class="col-lg-8">
                    <div class="btn-group w-100" role="group" style="border-radius: 12px; overflow: hidden;">
                        <button type="button" class="btn btn-filter active" onclick="filterStatus('all')" style="flex: 1;">
                            <i class="fas fa-list me-1"></i>
                            <span class="d-none d-sm-inline">Semua</span>
                            <span class="badge bg-white text-dark ms-1">{{ $consultations->total() }}</span>
                        </button>
                        <button type="button" class="btn btn-filter" onclick="filterStatus('pending')" style="flex: 1;">
                            <i class="fas fa-clock me-1"></i>
                            <span class="d-none d-sm-inline">Menunggu</span>
                        </button>
                        <button type="button" class="btn btn-filter" onclick="filterStatus('process')" style="flex: 1;">
                            <i class="fas fa-spinner me-1"></i>
                            <span class="d-none d-sm-inline">Diproses</span>
                        </button>
                        <button type="button" class="btn btn-filter" onclick="filterStatus('completed')" style="flex: 1;">
                            <i class="fas fa-check-circle me-1"></i>
                            <span class="d-none d-sm-inline">Selesai</span>
                        </button>
                        <button type="button" class="btn btn-filter" onclick="filterStatus('rejected')" style="flex: 1;">
                            <i class="fas fa-times-circle me-1"></i>
                            <span class="d-none d-sm-inline">Ditolak</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="search-box position-relative">
                        <i class="fas fa-search position-absolute" style="left: 16px; top: 50%; transform: translateY(-50%); color: #6b7280;"></i>
                        <input type="text" class="form-control ps-5" id="searchConsultation" 
                               placeholder="Cari tiket, nama, NIK..." 
                               style="border-radius: 12px; border: 1px solid #e5e7eb; padding: 12px 16px 12px 45px;">
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-responsive">
                <table class="table table-hover modern-table">
                    <thead>
                        <tr>
                            <th style="border-radius: 12px 0 0 0;">No</th>
                            <th>Tiket</th>
                            <th>Pemohon</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th style="border-radius: 0 12px 0 0;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($consultations as $index => $consultation)
                        <tr data-status="{{ $consultation->status }}">
                            <td><span class="text-muted">{{ $consultations->firstItem() + $index }}</span></td>
                            <td>
                                <span class="badge-ticket">{{ $consultation->ticket_number }}</span>
                            </td>
                            <td>
                                <div>
                                    <strong class="d-block text-dark">{{ $consultation->name }}</strong>
                                    <small class="text-muted">
                                        <i class="fas fa-phone-alt me-1" style="font-size: 10px;"></i>
                                        {{ $consultation->phone }}
                                    </small>
                                </div>
                            </td>
                            <td>
                                <span class="category-badge">{{ $consultation->case_category }}</span>
                            </td>
                            <td>
                                @php
                                $statusConfig = [
                                    'pending' => ['class' => 'status-pending', 'icon' => 'clock', 'text' => 'Menunggu'],
                                    'process' => ['class' => 'status-process', 'icon' => 'spinner', 'text' => 'Diproses'],
                                    'completed' => ['class' => 'status-completed', 'icon' => 'check-circle', 'text' => 'Selesai'],
                                    'rejected' => ['class' => 'status-rejected', 'icon' => 'times-circle', 'text' => 'Ditolak']
                                ];
                                $status = $statusConfig[$consultation->status];
                                @endphp
                                <span class="status-badge {{ $status['class'] }}">
                                    <i class="fas fa-{{ $status['icon'] }} me-1"></i>{{ $status['text'] }}
                                </span>
                            </td>
                            <td>
                                <small class="text-muted">{{ $consultation->created_at->format('d/m/Y') }}</small><br>
                                <small class="text-muted">{{ $consultation->created_at->format('H:i') }}</small>
                            </td>
                            <td>
                                <a href="{{ route('admin.consultations.show', $consultation) }}" class="btn-action">
                                    <i class="fas fa-eye me-1"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="fas fa-inbox fa-4x mb-3" style="color: #d1d5db;"></i>
                                    <p class="text-muted mb-0">Belum ada konsultasi</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $consultations->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    /* Filter Buttons */
    .btn-filter {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        color: #6b7280;
        padding: 12px 16px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-filter:hover {
        background: #f3f4f6;
        color: #10b981;
        border-color: #d1fae5;
    }

    .btn-filter.active {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        border-color: #10b981;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    /* Modern Table */
    .modern-table thead tr {
        background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
    }

    .modern-table thead th {
        color: #047857;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px;
        border: none;
    }

    .modern-table tbody tr {
        border-bottom: 1px solid #f3f4f6;
        transition: all 0.2s ease;
    }

    .modern-table tbody tr:hover {
        background: #f9fafb;
    }

    .modern-table tbody td {
        padding: 16px;
        vertical-align: middle;
        border: none;
    }

    /* Badges */
    .badge-ticket {
        background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
        color: white;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    .category-badge {
        background: #f3f4f6;
        color: #4b5563;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 500;
        display: inline-block;
    }

    .status-badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    .status-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .status-process {
        background: #dbeafe;
        color: #1e40af;
    }

    .status-completed {
        background: #d1fae5;
        color: #065f46;
    }

    .status-rejected {
        background: #fee2e2;
        color: #991b1b;
    }

    /* Action Button */
    .btn-action {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(16, 185, 129, 0.3);
        color: white;
    }

    /* Search Box */
    .search-box input:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        outline: none;
    }

    /* Empty State */
    .empty-state {
        padding: 40px 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .btn-filter {
            font-size: 12px;
            padding: 10px 8px;
        }
        
        .btn-filter .badge {
            display: none;
        }
    }
</style>

@push('scripts')
<script>
function filterStatus(status) {
    const rows = document.querySelectorAll('tbody tr[data-status]');
    rows.forEach(row => {
        if (status === 'all' || row.dataset.status === status) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
    
    document.querySelectorAll('.btn-filter').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.closest('.btn-filter').classList.add('active');
}

document.getElementById('searchConsultation').addEventListener('keyup', function(e) {
    const searchValue = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr[data-status]');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? '' : 'none';
    });
});
</script>
@endpush
@endsection