@extends('layouts.app')

@section('content')
<div class="min-vh-100" style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Info Banner -->
                <div class="alert border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border-radius: 20px;">
                    <div class="d-flex align-items-start">
                        <div class="rounded-circle p-3 me-3" style="background-color: rgba(16, 185, 129, 0.2);">
                            <i class="fas fa-info-circle" style="font-size: 28px; color: #059669;"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-2" style="color: #065f46;">Tidak Perlu Login!</h5>
                            <p class="mb-0" style="color: #047857; font-size: 15px; line-height: 1.6;">
                                Anda dapat mengajukan konsultasi tanpa harus membuat akun. Cukup isi formulir di bawah ini dan Anda akan mendapatkan nomor tiket untuk melacak status konsultasi.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Main Card -->
                <div class="card border-0 shadow-lg" style="border-radius: 24px; overflow: hidden;">
                    <!-- Header -->
                    <div class="card-header text-white border-0 p-4" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-white bg-opacity-25 p-3 me-3">
                                <i class="fas fa-comments" style="font-size: 24px;"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold">Form Konsultasi Hukum</h3>
                                <small class="opacity-90">Sampaikan permasalahan hukum Anda</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        @if(session('success'))
                        <div class="alert border-0 mb-4" style="background-color: #d1fae5; color: #065f46; border-radius: 16px;">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-check-circle me-3 mt-1" style="font-size: 20px;"></i>
                                <div class="flex-grow-1">
                                    {{ session('success') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                        @endif

                        <form action="{{ route('consultations.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Nama Lengkap -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold mb-2" style="color: #065f46;">
                                    <i class="fas fa-user me-2"></i>Nama Lengkap 
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control border-2 @error('name') is-invalid @enderror" 
                                       value="{{ old('name') }}"
                                       style="border-radius: 12px; border-color: #d1fae5; padding: 12px 16px;"
                                       placeholder="Masukkan nama lengkap Anda"
                                       required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- NIK -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold mb-2" style="color: #065f46;">
                                    <i class="fas fa-id-card me-2"></i>NIK (16 Digit) 
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       name="nik" 
                                       class="form-control border-2 @error('nik') is-invalid @enderror" 
                                       value="{{ old('nik') }}"
                                       maxlength="16"
                                       style="border-radius: 12px; border-color: #d1fae5; padding: 12px 16px;"
                                       placeholder="3201XXXXXXXXXXXX"
                                       required>
                                @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone & Email -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold mb-2" style="color: #065f46;">
                                        <i class="fas fa-phone me-2"></i>No. Telepon 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           name="phone" 
                                           class="form-control border-2 @error('phone') is-invalid @enderror" 
                                           value="{{ old('phone') }}"
                                           style="border-radius: 12px; border-color: #d1fae5; padding: 12px 16px;"
                                           placeholder="08123456789"
                                           required>
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold mb-2" style="color: #065f46;">
                                        <i class="fas fa-envelope me-2"></i>Email 
                                        <small class="text-muted">(Opsional)</small>
                                    </label>
                                    <input type="email" 
                                           name="email" 
                                           class="form-control border-2 @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}"
                                           style="border-radius: 12px; border-color: #d1fae5; padding: 12px 16px;"
                                           placeholder="email@contoh.com">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold mb-2" style="color: #065f46;">
                                    <i class="fas fa-map-marker-alt me-2"></i>Alamat Lengkap 
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea name="address" 
                                          class="form-control border-2 @error('address') is-invalid @enderror" 
                                          rows="3"
                                          style="border-radius: 12px; border-color: #d1fae5; padding: 12px 16px;"
                                          placeholder="Masukkan alamat lengkap Anda"
                                          required>{{ old('address') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kategori Kasus -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold mb-2" style="color: #065f46;">
                                    <i class="fas fa-tag me-2"></i>Kategori Kasus 
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="case_category" 
                                        class="form-select border-2 @error('case_category') is-invalid @enderror"
                                        style="border-radius: 12px; border-color: #d1fae5; padding: 12px 16px;"
                                        required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Tanah & Properti" {{ old('case_category') == 'Tanah & Properti' ? 'selected' : '' }}>Tanah & Properti</option>
                                    <option value="Keluarga & Perkawinan" {{ old('case_category') == 'Keluarga & Perkawinan' ? 'selected' : '' }}>Keluarga & Perkawinan</option>
                                    <option value="Waris" {{ old('case_category') == 'Waris' ? 'selected' : '' }}>Waris</option>
                                    <option value="Pidana" {{ old('case_category') == 'Pidana' ? 'selected' : '' }}>Pidana</option>
                                    <option value="Perdata" {{ old('case_category') == 'Perdata' ? 'selected' : '' }}>Perdata</option>
                                    <option value="Ketenagakerjaan" {{ old('case_category') == 'Ketenagakerjaan' ? 'selected' : '' }}>Ketenagakerjaan</option>
                                    <option value="Administrasi Desa" {{ old('case_category') == 'Administrasi Desa' ? 'selected' : '' }}>Administrasi Desa</option>
                                    <option value="Lainnya" {{ old('case_category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('case_category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold mb-2" style="color: #065f46;">
                                    <i class="fas fa-file-alt me-2"></i>Deskripsi Permasalahan 
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea name="case_description" 
                                          class="form-control border-2 @error('case_description') is-invalid @enderror" 
                                          rows="6"
                                          style="border-radius: 12px; border-color: #d1fae5; padding: 12px 16px;"
                                          placeholder="Jelaskan permasalahan hukum Anda secara detail..."
                                          required>{{ old('case_description') }}</textarea>
                                <small class="text-muted mt-1 d-block">
                                    <i class="fas fa-lightbulb me-1"></i>
                                    Semakin detail penjelasan Anda, semakin baik kami dapat membantu
                                </small>
                                @error('case_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Upload File -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold mb-2" style="color: #065f46;">
                                    <i class="fas fa-paperclip me-2"></i>Upload Bukti/Dokumen Pendukung
                                </label>
                                <input type="file" 
                                       name="evidence_file" 
                                       class="form-control border-2 @error('evidence_file') is-invalid @enderror" 
                                       accept=".pdf,.jpg,.jpeg,.png"
                                       style="border-radius: 12px; border-color: #d1fae5; padding: 12px 16px;">
                                <small class="text-muted mt-1 d-block">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Format: PDF, JPG, JPEG, PNG. Maksimal 5MB
                                </small>
                                @error('evidence_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Info Box -->
                            <div class="p-4 mb-4 rounded-4" style="background-color: #ecfdf5; border-left: 4px solid #10b981;">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check-circle me-3 mt-1" style="color: #059669; font-size: 20px;"></i>
                                    <div style="font-size: 14px; color: #065f46; line-height: 1.6;">
                                        <strong class="d-block mb-2">Keuntungan Konsultasi:</strong>
                                        <ul class="mb-0 ps-3">
                                            <li>Mendapat nomor tiket untuk tracking status</li>
                                            <li>Respon maksimal 2x24 jam kerja</li>
                                            <li>Konsultasi bersifat rahasia dan aman</li>
                                            <li>Tidak perlu login untuk melacak status</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="d-grid gap-3">
                                <button type="submit" 
                                        class="btn btn-lg text-white border-0 fw-semibold" 
                                        style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 12px; padding: 14px; transition: all 0.3s ease;"
                                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(16, 185, 129, 0.3)'"
                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Konsultasi
                                </button>
                                <a href="{{ route('consultations.track') }}" 
                                   class="btn btn-lg btn-outline-success border-2 fw-semibold" 
                                   style="border-radius: 12px; padding: 14px;">
                                    <i class="fas fa-search me-2"></i>Lacak Status Konsultasi
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Trust Indicators -->
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <div class="text-center p-3 bg-white rounded-3 shadow-sm">
                            <i class="fas fa-shield-alt mb-2" style="font-size: 28px; color: #10b981;"></i>
                            <div style="font-size: 13px; color: #065f46; font-weight: 600;">Data Aman</div>
                            <small class="text-muted" style="font-size: 11px;">Terlindungi</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-3 bg-white rounded-3 shadow-sm">
                            <i class="fas fa-user-lock mb-2" style="font-size: 28px; color: #10b981;"></i>
                            <div style="font-size: 13px; color: #065f46; font-weight: 600;">Rahasia</div>
                            <small class="text-muted" style="font-size: 11px;">Privasi terjaga</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-3 bg-white rounded-3 shadow-sm">
                            <i class="fas fa-headset mb-2" style="font-size: 28px; color: #10b981;"></i>
                            <div style="font-size: 13px; color: #065f46; font-weight: 600;">Support 24/7</div>
                            <small class="text-muted" style="font-size: 11px;">Siap membantu</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection