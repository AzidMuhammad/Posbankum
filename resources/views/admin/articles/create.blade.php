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

    .card-modern {
        background: white;
        border-radius: 20px;
        border: none;
        box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.1), 0 2px 4px -1px rgba(16, 185, 129, 0.06);
        overflow: hidden;
    }

    .form-label-modern {
        color: #064e3b;
        font-weight: 700;
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-label-modern i {
        color: var(--primary-green);
        font-size: 1.1rem;
    }

    .form-control-modern {
        border: 2px solid var(--light-green);
        border-radius: 12px;
        padding: 0.875rem 1.25rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control-modern:focus {
        border-color: var(--soft-green);
        box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.15);
        background: var(--extra-light-green);
    }

    .form-control-modern:hover {
        border-color: var(--soft-green);
    }

    .form-select-modern {
        border: 2px solid var(--light-green);
        border-radius: 12px;
        padding: 0.875rem 1.25rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
        cursor: pointer;
    }

    .form-select-modern:focus {
        border-color: var(--soft-green);
        box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.15);
        background: var(--extra-light-green);
    }

    .form-select-modern:hover {
        border-color: var(--soft-green);
    }

    .file-upload-wrapper {
        position: relative;
        overflow: hidden;
        border: 2px dashed var(--soft-green);
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .file-upload-wrapper:hover {
        background: var(--light-green);
        border-color: var(--primary-green);
    }

    .file-upload-wrapper input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .file-upload-icon {
        font-size: 2.5rem;
        color: var(--soft-green);
        margin-bottom: 0.5rem;
    }

    .file-upload-text {
        color: var(--dark-green);
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .file-upload-hint {
        color: #6b7280;
        font-size: 0.875rem;
    }

    textarea.form-control-modern {
        resize: vertical;
        min-height: 300px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        line-height: 1.8;
    }

    .form-check-modern {
        background: var(--extra-light-green);
        border: 2px solid var(--light-green);
        border-radius: 12px;
        padding: 1.25rem 1.5rem;
        transition: all 0.3s ease;
    }

    .form-check-modern:hover {
        background: var(--light-green);
        border-color: var(--soft-green);
    }

    .form-check-modern .form-check-input {
        width: 1.5rem;
        height: 1.5rem;
        border: 2px solid var(--soft-green);
        cursor: pointer;
    }

    .form-check-modern .form-check-input:checked {
        background-color: var(--primary-green);
        border-color: var(--primary-green);
    }

    .form-check-modern .form-check-label {
        color: #064e3b;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        margin-left: 0.5rem;
    }

    .submit-btn {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--soft-green) 100%);
        border: none;
        color: white;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.3);
        width: 100%;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 20px -3px rgba(16, 185, 129, 0.4);
        color: white;
    }

    .submit-btn i {
        font-size: 1.2rem;
    }

    .required-badge {
        color: #ef4444;
        font-weight: 700;
    }

    .form-section {
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid var(--light-green);
    }

    .form-section-title {
        color: #064e3b;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .form-section-title i {
        color: var(--primary-green);
        font-size: 1.3rem;
    }

    .invalid-feedback {
        color: #ef4444;
        font-weight: 600;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .invalid-feedback::before {
        content: "⚠";
        font-size: 1.1rem;
    }

    .is-invalid {
        border-color: #ef4444 !important;
        background: #fef2f2 !important;
    }

    .is-invalid:focus {
        box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.15) !important;
    }
</style>

<div class="modern-container">
    <div class="container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h2 class="page-title">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Artikel Baru
                </h2>
                <a href="{{ route('admin.articles.index') }}" class="btn btn-modern-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="card-modern">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Basic Information Section -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-info-circle"></i>
                            Informasi Dasar
                        </div>

                        <div class="mb-4">
                            <label class="form-label-modern">
                                <i class="fas fa-heading"></i>
                                Judul Artikel
                                <span class="required-badge">*</span>
                            </label>
                            <input type="text" 
                                   name="title" 
                                   class="form-control form-control-modern @error('title') is-invalid @enderror" 
                                   value="{{ old('title') }}" 
                                   placeholder="Masukkan judul artikel yang menarik..."
                                   required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label-modern">
                                    <i class="fas fa-folder"></i>
                                    Kategori
                                    <span class="required-badge">*</span>
                                </label>
                                <select name="category" 
                                        class="form-select form-select-modern @error('category') is-invalid @enderror" 
                                        required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Hukum Perdata" {{ old('category') == 'Hukum Perdata' ? 'selected' : '' }}>Hukum Perdata</option>
                                    <option value="Hukum Pidana" {{ old('category') == 'Hukum Pidana' ? 'selected' : '' }}>Hukum Pidana</option>
                                    <option value="Hukum Keluarga" {{ old('category') == 'Hukum Keluarga' ? 'selected' : '' }}>Hukum Keluarga</option>
                                    <option value="Hukum Tanah" {{ old('category') == 'Hukum Tanah' ? 'selected' : '' }}>Hukum Tanah</option>
                                    <option value="Hukum Ketenagakerjaan" {{ old('category') == 'Hukum Ketenagakerjaan' ? 'selected' : '' }}>Hukum Ketenagakerjaan</option>
                                    <option value="Berita Desa" {{ old('category') == 'Berita Desa' ? 'selected' : '' }}>Berita Desa</option>
                                    <option value="Tips & Panduan" {{ old('category') == 'Tips & Panduan' ? 'selected' : '' }}>Tips & Panduan</option>
                                </select>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label-modern">
                                    <i class="fas fa-image"></i>
                                    Gambar Artikel
                                </label>
                                <div class="file-upload-wrapper">
                                    <input type="file" 
                                           name="image" 
                                           class="@error('image') is-invalid @enderror" 
                                           accept="image/*"
                                           onchange="updateFileName(this)">
                                    <div class="file-upload-icon">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </div>
                                    <div class="file-upload-text" id="file-name">Klik untuk upload gambar</div>
                                    <div class="file-upload-hint">Format: JPG, JPEG, PNG • Maksimal 2MB</div>
                                </div>
                                @error('image')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-file-alt"></i>
                            Konten Artikel
                        </div>

                        <div class="mb-4">
                            <label class="form-label-modern">
                                <i class="fas fa-align-left"></i>
                                Isi Artikel
                                <span class="required-badge">*</span>
                            </label>
                            <textarea name="content" 
                                      class="form-control form-control-modern @error('content') is-invalid @enderror" 
                                      placeholder="Tulis konten artikel di sini..."
                                      required>{{ old('content') }}</textarea>
                            @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Publish Section -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-cog"></i>
                            Pengaturan Publikasi
                        </div>

                        <div class="form-check form-check-modern">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   name="is_published" 
                                   id="is_published" 
                                   value="1" 
                                   {{ old('is_published', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">
                                <i class="fas fa-globe me-2"></i>
                                Publikasikan artikel sekarang
                            </label>
                        </div>
                        <small class="text-muted ms-5 d-block mt-2">
                            <i class="fas fa-info-circle me-1"></i>
                            Jika dicentang, artikel akan langsung tampil di halaman publik
                        </small>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-save me-2"></i>
                            Simpan Artikel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function updateFileName(input) {
    const fileName = document.getElementById('file-name');
    if (input.files && input.files[0]) {
        fileName.textContent = input.files[0].name;
        fileName.style.color = 'var(--dark-green)';
    } else {
        fileName.textContent = 'Klik untuk upload gambar';
    }
}
</script>
@endsection