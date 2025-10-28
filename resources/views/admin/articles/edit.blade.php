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

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--dark-green);
        font-weight: 600;
        text-decoration: none;
        padding: 0.75rem 1.5rem;
        background: white;
        border-radius: 12px;
        border: 2px solid var(--light-green);
        transition: all 0.3s ease;
        margin-bottom: 2rem;
    }

    .back-link:hover {
        background: var(--extra-light-green);
        border-color: var(--soft-green);
        color: var(--dark-green);
        transform: translateX(-5px);
    }

    .back-link i {
        font-size: 1rem;
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

    .card-modern {
        background: white;
        border-radius: 20px;
        border: none;
        box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.1), 0 2px 4px -1px rgba(16, 185, 129, 0.06);
        overflow: hidden;
    }

    .alert-error {
        background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
        border: none;
        border-left: 4px solid #ef4444;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .alert-error-title {
        color: #991b1b;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .alert-error-title i {
        font-size: 1.5rem;
    }

    .alert-error ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .alert-error li {
        color: #dc2626;
        padding: 0.5rem 0;
        display: flex;
        align-items: start;
        gap: 0.5rem;
    }

    .alert-error li::before {
        content: "•";
        color: #ef4444;
        font-weight: bold;
        font-size: 1.2rem;
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

    .current-image-wrapper {
        background: var(--extra-light-green);
        border: 2px solid var(--light-green);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .current-image-label {
        color: #064e3b;
        font-weight: 700;
        font-size: 0.95rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .current-image-label i {
        color: var(--primary-green);
    }

    .current-image {
        width: 100%;
        max-width: 400px;
        height: 250px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
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
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        line-height: 1.8;
    }

    .form-check-modern {
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
        padding: 1rem 2.5rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.3);
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 20px -3px rgba(16, 185, 129, 0.4);
        color: white;
    }

    .cancel-btn {
        background: white;
        border: 2px solid var(--light-green);
        color: var(--dark-green);
        padding: 1rem 2.5rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .cancel-btn:hover {
        background: var(--extra-light-green);
        border-color: var(--soft-green);
        color: var(--dark-green);
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

    .button-group {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .form-hint {
        color: #6b7280;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-hint i {
        color: var(--soft-green);
    }
</style>

<div class="modern-container">
    <div class="container">
        <!-- Back Link -->
        <a href="{{ route('admin.articles.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Daftar Artikel
        </a>

        <!-- Header Section -->
        <div class="header-section">
            <h2 class="page-title">
                <i class="fas fa-edit"></i>
                Edit Artikel
            </h2>
        </div>

        <!-- Error Alert -->
        @if($errors->any())
        <div class="alert-error">
            <div class="alert-error-title">
                <i class="fas fa-exclamation-circle"></i>
                Terdapat Kesalahan:
            </div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Card -->
        <div class="card-modern">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
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
                                   class="form-control form-control-modern" 
                                   value="{{ old('title', $article->title) }}" 
                                   placeholder="Masukkan judul artikel..."
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-modern">
                                <i class="fas fa-folder"></i>
                                Kategori
                                <span class="required-badge">*</span>
                            </label>
                            <select name="category" class="form-select form-select-modern" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="hukum_perdata" {{ old('category', $article->category) == 'hukum_perdata' ? 'selected' : '' }}>Hukum Perdata</option>
                                <option value="hukum_pidana" {{ old('category', $article->category) == 'hukum_pidana' ? 'selected' : '' }}>Hukum Pidana</option>
                                <option value="hukum_administrasi" {{ old('category', $article->category) == 'hukum_administrasi' ? 'selected' : '' }}>Hukum Administrasi</option>
                                <option value="hukum_agraria" {{ old('category', $article->category) == 'hukum_agraria' ? 'selected' : '' }}>Hukum Agraria</option>
                                <option value="tips_hukum" {{ old('category', $article->category) == 'tips_hukum' ? 'selected' : '' }}>Tips Hukum</option>
                            </select>
                        </div>
                    </div>

                    <!-- Image Section -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-image"></i>
                            Gambar Artikel
                        </div>

                        @if($article->image)
                        <div class="current-image-wrapper">
                            <div class="current-image-label">
                                <i class="fas fa-images"></i>
                                Gambar Saat Ini
                            </div>
                            <img src="{{ asset($article->image) }}" 
                                 alt="{{ $article->title }}" 
                                 class="current-image">
                        </div>
                        @endif

                        <div class="mb-4">
                            <label class="form-label-modern">
                                <i class="fas fa-cloud-upload-alt"></i>
                                {{ $article->image ? 'Ganti Gambar' : 'Upload Gambar' }}
                            </label>
                            <div class="file-upload-wrapper">
                                <input type="file" 
                                       name="image" 
                                       accept="image/*"
                                       onchange="updateFileName(this)">
                                <div class="file-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="file-upload-text" id="file-name">
                                    {{ $article->image ? 'Klik untuk ganti gambar' : 'Klik untuk upload gambar' }}
                                </div>
                                <div class="file-upload-hint">Format: JPG, PNG, GIF • Maksimal 2MB</div>
                            </div>
                            @if($article->image)
                            <div class="form-hint">
                                <i class="fas fa-info-circle"></i>
                                Kosongkan jika tidak ingin mengganti gambar
                            </div>
                            @endif
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
                                <i class="fas fa-align-justify"></i>
                                Ringkasan
                                <span class="required-badge">*</span>
                            </label>
                            <textarea name="excerpt" 
                                      class="form-control form-control-modern" 
                                      rows="3"
                                      placeholder="Ringkasan singkat artikel (2-3 kalimat)"
                                      required>{{ old('excerpt', $article->excerpt) }}</textarea>
                            <div class="form-hint">
                                <i class="fas fa-lightbulb"></i>
                                Ringkasan akan ditampilkan di daftar artikel
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-modern">
                                <i class="fas fa-align-left"></i>
                                Isi Artikel
                                <span class="required-badge">*</span>
                            </label>
                            <textarea name="content" 
                                      class="form-control form-control-modern" 
                                      rows="15"
                                      placeholder="Tulis konten artikel lengkap di sini..."
                                      required>{{ old('content', $article->content) }}</textarea>
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
                                   {{ old('is_published', $article->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">
                                <i class="fas fa-globe me-2"></i>
                                Publikasikan artikel
                            </label>
                        </div>
                        <small class="text-muted ms-5 d-block mt-2">
                            <i class="fas fa-info-circle me-1"></i>
                            Jika dicentang, artikel akan tampil di halaman publik
                        </small>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-4">
                        <div class="button-group">
                            <button type="submit" class="submit-btn">
                                <i class="fas fa-save me-2"></i>
                                Update Artikel
                            </button>
                            <a href="{{ route('admin.articles.index') }}" class="cancel-btn">
                                <i class="fas fa-times me-2"></i>
                                Batal
                            </a>
                        </div>
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