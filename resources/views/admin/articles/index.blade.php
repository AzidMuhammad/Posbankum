@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-green: #10b981;
        --soft-green: #34d399;
        --light-green: #d1fae5;
        --extra-light-green: #ecfdf5;
        --dark-green: #059669;
        --accent-green: #6ee7b7;
    }

    .modern-container {
        min-height: 100vh;
        padding: 2rem 0;
    }

    .header-section {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.1), 0 2px 4px -1px rgba(16, 185, 129, 0.06);
        margin-bottom: 2rem;
    }

    .page-title {
        color: #064e3b;
        font-weight: 700;
        font-size: 2rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .page-title i {
        color: var(--primary-green);
        font-size: 2.2rem;
    }

    .btn-modern-primary {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--soft-green) 100%);
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.3);
    }

    .btn-modern-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.4);
        color: white;
    }

    .btn-modern-secondary {
        background: white;
        border: 2px solid var(--light-green);
        color: var(--dark-green);
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-modern-secondary:hover {
        background: var(--extra-light-green);
        border-color: var(--soft-green);
        color: var(--dark-green);
    }

    .alert-modern-success {
        background: linear-gradient(135deg, var(--extra-light-green) 0%, var(--light-green) 100%);
        border: none;
        border-left: 4px solid var(--primary-green);
        border-radius: 12px;
        color: #064e3b;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
    }

    .card-modern {
        background: white;
        border-radius: 20px;
        border: none;
        box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.1), 0 2px 4px -1px rgba(16, 185, 129, 0.06);
        overflow: hidden;
    }

    .table-modern {
        margin: 0;
    }

    .table-modern thead {
        background: linear-gradient(135deg, var(--extra-light-green) 0%, var(--light-green) 100%);
    }

    .table-modern thead th {
        color: #064e3b;
        font-weight: 700;
        padding: 1.25rem 1rem;
        border: none;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .table-modern tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0fdf4;
    }

    .table-modern tbody tr:hover {
        background: var(--extra-light-green);
    }

    .table-modern tbody td {
        padding: 1.25rem 1rem;
        vertical-align: middle;
        color: #374151;
    }

    .badge-modern {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.8rem;
        letter-spacing: 0.3px;
    }

    .badge-green {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--soft-green) 100%);
        color: white;
    }

    .badge-success-modern {
        background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        color: white;
    }

    .badge-draft-modern {
        background: linear-gradient(135deg, #9ca3af 0%, #d1d5db 100%);
        color: white;
    }

    .action-btn {
        padding: 0.5rem 0.75rem;
        border-radius: 10px;
        border: none;
        transition: all 0.3s ease;
        margin: 0 0.2rem;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .btn-view {
        background: linear-gradient(135deg, #06b6d4 0%, #22d3ee 100%);
        color: white;
    }

    .btn-edit {
        background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        color: white;
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444 0%, #f87171 100%);
        color: white;
    }

    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--soft-green);
        opacity: 0.5;
        margin-bottom: 1rem;
    }

    .empty-state p {
        color: #6b7280;
        font-size: 1.1rem;
    }

    .stats-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: var(--extra-light-green);
        color: var(--dark-green);
        border-radius: 10px;
        font-weight: 600;
    }

    .pagination {
        gap: 0.5rem;
    }

    .pagination .page-link {
        border-radius: 10px;
        border: 2px solid var(--light-green);
        color: var(--dark-green);
        padding: 0.5rem 1rem;
        margin: 0 0.2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background: var(--soft-green);
        border-color: var(--soft-green);
        color: white;
    }

    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--soft-green) 100%);
        border-color: var(--primary-green);
    }
</style>

<div class="modern-container">
    <div class="container px-4 my-4">
        <!-- Header Section -->
        <div class="header-section">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h2 class="page-title">
                    <i class="fas fa-newspaper"></i>
                    Kelola Artikel
                </h2>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-modern-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Artikel
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-modern-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Dashboard
                    </a>
                </div>
            </div>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
        <div class="alert alert-modern-success alert-dismissible fade show">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-3" style="font-size: 1.5rem;"></i>
                <div>{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Main Card -->
        <div class="card-modern">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-modern">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 25%;">Judul</th>
                                <th style="width: 12%;">Kategori</th>
                                <th style="width: 13%;">Penulis</th>
                                <th style="width: 10%;">Views</th>
                                <th style="width: 10%;">Status</th>
                                <th style="width: 10%;">Tanggal</th>
                                <th style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($articles as $index => $article)
                            <tr>
                                <td><strong>{{ $articles->firstItem() + $index }}</strong></td>
                                <td>
                                    <div class="fw-bold text-dark">{{ Str::limit($article->title, 50) }}</div>
                                </td>
                                <td>
                                    <span class="badge badge-modern badge-green">
                                        {{ $article->category }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-user-circle me-2" style="color: var(--primary-green);"></i>
                                        {{ $article->user->name }}
                                    </div>
                                </td>
                                <td>
                                    <span class="stats-badge">
                                        <i class="fas fa-eye"></i>
                                        {{ number_format($article->views) }}
                                    </span>
                                </td>
                                <td>
                                    @if($article->is_published)
                                    <span class="badge badge-modern badge-success-modern">
                                        <i class="fas fa-check-circle me-1"></i>Published
                                    </span>
                                    @else
                                    <span class="badge badge-modern badge-draft-modern">
                                        <i class="fas fa-file-alt me-1"></i>Draft
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="text-muted">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        {{ $article->created_at->format('d/m/Y') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('articles.show', $article->slug) }}" 
                                           class="action-btn btn-view" 
                                           target="_blank"
                                           title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.articles.edit', $article) }}" 
                                           class="action-btn btn-edit"
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.articles.destroy', $article) }}" 
                                              method="POST" 
                                              class="d-inline" 
                                              onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="action-btn btn-delete"
                                                    title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="p-0">
                                    <div class="empty-state">
                                        <i class="fas fa-inbox"></i>
                                        <p class="mb-0">Belum ada artikel yang dibuat</p>
                                        <a href="{{ route('admin.articles.create') }}" class="btn btn-modern-primary mt-3">
                                            <i class="fas fa-plus me-2"></i>Buat Artikel Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($articles->hasPages())
                <div class="d-flex justify-content-center p-4">
                    {{ $articles->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection