@extends('layouts.app')

@section('content')
<!-- Hero Header -->
<div class="text-white py-5" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle bg-white bg-opacity-25 p-3 me-3">
                        <i class="fas fa-file-contract" style="font-size: 32px;"></i>
                    </div>
                    <div>
                        <h1 class="display-5 fw-bold mb-0">Produk Hukum Desa</h1>
                        <p class="lead mb-0 opacity-90">Desa Pulau Gadang</p>
                    </div>
                </div>
                <p class="lead mb-0">Akses berbagai peraturan dan dokumen hukum resmi yang berlaku di Desa Pulau Gadang</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <div class="d-inline-block text-center">
                    <div class="h2 fw-bold mb-0">{{ $legalProducts->total() }}</div>
                    <small class="opacity-90">Dokumen Tersedia</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="py-5" style="background-color: #f9fafb;">
    <div class="container">
        <!-- Search & Filter Section -->
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="row align-items-center g-3">
                    <div class="col-lg-8">
                        <div class="position-relative">
                            <i class="fas fa-search position-absolute" style="left: 16px; top: 50%; transform: translateY(-50%); color: #10b981;"></i>
                            <input type="text" 
                                   class="form-control border-2" 
                                   id="searchProduct" 
                                   placeholder="Cari produk hukum berdasarkan judul, nomor, atau deskripsi..."
                                   style="border-radius: 12px; border-color: #d1fae5; padding: 12px 16px 12px 45px;">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <select class="form-select border-2" 
                                id="filterType"
                                style="border-radius: 12px; border-color: #d1fae5; padding: 12px 16px;">
                            <option value="">Semua Jenis Dokumen</option>
                            <option value="Perdes">Peraturan Desa</option>
                            <option value="SK">Surat Keputusan</option>
                            <option value="Perbup">Peraturan Bupati</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Title -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0 fw-bold" style="color: #065f46;">
                <i class="fas fa-folder-open me-2" style="color: #10b981;"></i>
                Daftar Produk Hukum
            </h4>
            <span class="badge px-3 py-2" style="background-color: #d1fae5; color: #065f46; font-size: 14px;">
                {{ $legalProducts->count() }} dari {{ $legalProducts->total() }} dokumen
            </span>
        </div>

        <!-- Products Grid -->
        <div class="row g-4" id="productsContainer">
            @forelse($legalProducts as $product)
            <div class="col-md-6 col-lg-6 product-item" data-type="{{ $product->type }}" data-title="{{ strtolower($product->title) }}" data-number="{{ strtolower($product->number) }}">
                <div class="card border-0 shadow-sm h-100" 
                     style="border-radius: 16px; transition: all 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 28px rgba(16, 185, 129, 0.15)'"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.1)'">
                    <div class="card-body p-4">
                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge px-3 py-2" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; font-size: 12px; font-weight: 600; border-radius: 8px;">
                                <i class="fas fa-tag me-1"></i>{{ $product->type }}
                            </span>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size: 11px; font-weight: 600;">TANGGAL</small>
                                <span style="color: #059669; font-weight: 600; font-size: 13px;">
                                    <i class="fas fa-calendar-alt me-1"></i>{{ $product->date->format('d M Y') }}
                                </span>
                            </div>
                        </div>

                        <!-- Title -->
                        <h5 class="card-title fw-bold mb-3" style="color: #065f46; line-height: 1.4;">
                            {{ $product->title }}
                        </h5>

                        <!-- Number -->
                        <div class="p-2 mb-3 rounded-3 d-inline-block" style="background-color: #f0fdf4; border: 1px solid #d1fae5;">
                            <small class="text-muted d-block mb-1" style="font-size: 10px; font-weight: 600;">NOMOR DOKUMEN</small>
                            <strong style="color: #059669; font-size: 14px;">{{ $product->number }}</strong>
                        </div>

                        <!-- Description -->
                        <p class="card-text mb-4" style="color: #6b7280; font-size: 14px; line-height: 1.6;">
                            {{ Str::limit($product->description, 120) }}
                        </p>

                        <!-- Footer -->
                        <div class="d-flex justify-content-between align-items-center pt-3" style="border-top: 1px solid #e5e7eb;">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle p-2 me-2" style="background-color: #ecfdf5;">
                                    <i class="fas fa-download" style="font-size: 12px; color: #10b981;"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block" style="font-size: 10px;">Total Unduhan</small>
                                    <strong style="color: #065f46; font-size: 14px;">{{ number_format($product->download_count) }}</strong>
                                </div>
                            </div>
                            <a href="{{ route('legal-products.download', $product) }}" 
                               class="btn text-white border-0 fw-semibold" 
                               style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 10px; padding: 10px 24px; font-size: 14px; transition: all 0.3s ease;"
                               onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 12px rgba(16, 185, 129, 0.3)'"
                               onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none'">
                                <i class="fas fa-download me-2"></i>Unduh
                            </a>
                        </div>
                    </div>

                    <!-- Ribbon for New Documents (if created within 7 days) -->
                    @if($product->created_at->diffInDays(now()) <= 7)
                    <div class="position-absolute" style="top: -8px; right: 20px;">
                        <span class="badge px-3 py-1" style="background-color: #f59e0b; color: white; font-size: 11px; font-weight: 600; box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);">
                            <i class="fas fa-star me-1"></i>BARU
                        </span>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-folder-open" style="font-size: 80px; color: #d1fae5;"></i>
                    </div>
                    <h5 class="mb-2" style="color: #065f46;">Belum Ada Produk Hukum</h5>
                    <p class="text-muted mb-0">Produk hukum akan ditampilkan di sini setelah ditambahkan oleh admin</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- No Results Message (Hidden by default) -->
        <div id="noResults" class="text-center py-5" style="display: none;">
            <div class="mb-4">
                <i class="fas fa-search" style="font-size: 80px; color: #d1fae5;"></i>
            </div>
            <h5 class="mb-2" style="color: #065f46;">Tidak Ada Hasil Ditemukan</h5>
            <p class="text-muted mb-0">Coba gunakan kata kunci atau filter yang berbeda</p>
        </div>

        <!-- Pagination -->
        @if($legalProducts->hasPages())
        <div class="d-flex justify-content-center mt-5">
            <div class="pagination-wrapper">
                {{ $legalProducts->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Info Banner -->
<div class="py-4" style="background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-1 text-center">
                <i class="fas fa-info-circle" style="font-size: 40px; color: #10b981;"></i>
            </div>
            <div class="col-md-11">
                <h6 class="mb-2 fw-bold" style="color: #065f46;">Informasi Penting</h6>
                <p class="mb-0" style="color: #047857; font-size: 14px; line-height: 1.6;">
                    Semua dokumen produk hukum yang tersedia di sini adalah dokumen resmi dan sah. Jika Anda memerlukan informasi lebih lanjut atau memiliki pertanyaan terkait dokumen tertentu, silakan hubungi kantor desa atau ajukan konsultasi melalui layanan POSBANKUM.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Filter & Search Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchProduct');
    const filterSelect = document.getElementById('filterType');
    const productItems = document.querySelectorAll('.product-item');
    const noResults = document.getElementById('noResults');
    const productsContainer = document.getElementById('productsContainer');

    function filterProducts() {
        const searchTerm = searchInput.value.toLowerCase();
        const filterType = filterSelect.value;
        let visibleCount = 0;

        productItems.forEach(item => {
            const title = item.dataset.title;
            const number = item.dataset.number;
            const type = item.dataset.type;

            const matchesSearch = title.includes(searchTerm) || number.includes(searchTerm);
            const matchesFilter = filterType === '' || type === filterType;

            if (matchesSearch && matchesFilter) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        // Show/hide no results message
        if (visibleCount === 0 && productItems.length > 0) {
            noResults.style.display = 'block';
            productsContainer.style.display = 'none';
        } else {
            noResults.style.display = 'none';
            productsContainer.style.display = 'flex';
        }
    }

    searchInput.addEventListener('keyup', filterProducts);
    filterSelect.addEventListener('change', filterProducts);
});
</script>

<!-- Custom Pagination Styles -->
<style>
.pagination-wrapper .pagination {
    gap: 8px;
}

.pagination-wrapper .page-link {
    border: 2px solid #d1fae5;
    border-radius: 10px;
    color: #059669;
    padding: 8px 16px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination-wrapper .page-link:hover {
    background-color: #d1fae5;
    border-color: #10b981;
    color: #065f46;
    transform: translateY(-2px);
}

.pagination-wrapper .page-item.active .page-link {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border-color: #10b981;
    color: white;
}

.pagination-wrapper .page-item.disabled .page-link {
    background-color: #f3f4f6;
    border-color: #e5e7eb;
    color: #9ca3af;
}

/* Focus state for inputs */
#searchProduct:focus,
#filterType:focus {
    border-color: #10b981 !important;
    box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.15) !important;
}
</style>
@endsection