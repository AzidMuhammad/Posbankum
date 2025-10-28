@extends('layouts.app')

@section('content')
<div class="hero-section" style="min-height: 400px; padding: 100px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="badge-custom mx-auto mb-3">
                    <i class="fas fa-info-circle me-2"></i>Tentang Kami
                </div>
                <h1 class="display-3 fw-bold mb-4">POSBANKUM Pulau Gadang</h1>
                <p class="lead mb-0" style="font-size: 1.3rem; line-height: 1.8;">Pos Bantuan Hukum Desa Pulau Gadang - Memberikan Akses Keadilan untuk Semua</p>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <!-- Sejarah & Visi Misi -->
    <div class="row mb-5 g-4">
        <div class="col-lg-6">
            <div class="card-hover" style="height: 100%; padding: 2.5rem;">
                <div class="d-flex align-items-center mb-4">
                    <div style="width: 50px; height: 50px; background: var(--light); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                        <i class="fas fa-book-open" style="font-size: 1.5rem; color: var(--primary);"></i>
                    </div>
                    <h2 class="mb-0" style="color: var(--dark); font-weight: 700;">Sejarah Kami</h2>
                </div>
                <p style="line-height: 1.8; color: var(--text-dark); text-align: justify;">
                    POSBANKUM (Pos Bantuan Hukum) Desa Pulau Gadang didirikan pada tahun 2024 sebagai wujud komitmen pemerintah desa dalam memberikan akses keadilan bagi seluruh masyarakat. Program ini merupakan bagian dari upaya meningkatkan kesadaran hukum dan memberikan layanan bantuan hukum gratis kepada masyarakat.
                </p>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row g-4 h-100">
                <div class="col-12">
                    <div class="card-hover" style="background: linear-gradient(135deg, var(--light) 0%, #d1fae5 100%); height: 100%;">
                        <div class="d-flex align-items-start mb-3">
                            <div style="width: 40px; height: 40px; background: var(--primary); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 1rem; flex-shrink: 0;">
                                <i class="fas fa-eye" style="color: white; font-size: 1.2rem;"></i>
                            </div>
                            <div>
                                <h4 class="mb-3" style="color: var(--dark); font-weight: 700;">Visi</h4>
                                <p style="line-height: 1.8; color: var(--text-dark); margin: 0;">
                                    Mewujudkan masyarakat Desa Pulau Gadang yang sadar hukum dan memiliki akses keadilan yang mudah, cepat, dan terpercaya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card-hover" style="background: linear-gradient(135deg, #d1fae5 0%, var(--light) 100%); height: 100%;">
                        <div class="d-flex align-items-start mb-3">
                            <div style="width: 40px; height: 40px; background: var(--secondary); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 1rem; flex-shrink: 0;">
                                <i class="fas fa-bullseye" style="color: white; font-size: 1.2rem;"></i>
                            </div>
                            <div>
                                <h4 class="mb-3" style="color: var(--dark); font-weight: 700;">Misi</h4>
                                <ul style="line-height: 2; color: var(--text-dark); margin: 0; padding-left: 1.2rem;">
                                    <li>Memberikan layanan konsultasi hukum gratis kepada masyarakat</li>
                                    <li>Meningkatkan kesadaran hukum melalui edukasi dan sosialisasi</li>
                                    <li>Memfasilitasi penyelesaian sengketa secara mediasi</li>
                                    <li>Mendampingi masyarakat dalam proses hukum</li>
                                    <li>Menyediakan informasi produk hukum desa yang transparan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Layanan Kami -->
    <div class="text-center mb-5 mt-5 pt-5">
        <div class="badge-custom mx-auto">
            <i class="fas fa-concierge-bell me-2"></i>Layanan Unggulan
        </div>
        <h2 class="section-title">Layanan Kami</h2>
        <p class="section-subtitle">Berbagai layanan hukum yang kami sediakan untuk masyarakat</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-3">
            <div class="card-hover text-center" style="height: 100%;">
                <div style="width: 80px; height: 80px; background: var(--light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-comments" style="font-size: 2rem; color: var(--primary);"></i>
                </div>
                <h5 style="color: var(--dark); font-weight: 700; margin-bottom: 1rem;">Konsultasi Hukum Gratis</h5>
                <p class="text-muted" style="line-height: 1.8;">Layanan konsultasi hukum tanpa biaya untuk berbagai kasus hukum</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card-hover text-center" style="height: 100%;">
                <div style="width: 80px; height: 80px; background: var(--light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-handshake" style="font-size: 2rem; color: var(--primary);"></i>
                </div>
                <h5 style="color: var(--dark); font-weight: 700; margin-bottom: 1rem;">Mediasi & Negosiasi</h5>
                <p class="text-muted" style="line-height: 1.8;">Membantu menyelesaikan sengketa secara kekeluargaan dan damai</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card-hover text-center" style="height: 100%;">
                <div style="width: 80px; height: 80px; background: var(--light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-user-shield" style="font-size: 2rem; color: var(--primary);"></i>
                </div>
                <h5 style="color: var(--dark); font-weight: 700; margin-bottom: 1rem;">Pendampingan Hukum</h5>
                <p class="text-muted" style="line-height: 1.8;">Mendampingi masyarakat dalam proses hukum secara profesional</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card-hover text-center" style="height: 100%;">
                <div style="width: 80px; height: 80px; background: var(--light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-chalkboard-teacher" style="font-size: 2rem; color: var(--primary);"></i>
                </div>
                <h5 style="color: var(--dark); font-weight: 700; margin-bottom: 1rem;">Penyuluhan Hukum</h5>
                <p class="text-muted" style="line-height: 1.8;">Program edukasi hukum untuk meningkatkan kesadaran masyarakat</p>
            </div>
        </div>
    </div>

    <!-- Jam Operasional -->
    <div class="row mb-5 g-4 align-items-center">
        <div class="col-lg-6">
            <div style="position: relative; padding: 3rem;">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 250px; height: 250px; background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
                <i class="fas fa-clock" style="font-size: 200px; color: var(--primary); opacity: 0.15; position: relative; z-index: 1; display: block; text-align: center;"></i>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card-hover">
                <div class="d-flex align-items-center mb-4">
                    <div style="width: 50px; height: 50px; background: var(--light); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                        <i class="fas fa-calendar-alt" style="font-size: 1.5rem; color: var(--primary);"></i>
                    </div>
                    <h3 class="mb-0" style="color: var(--dark); font-weight: 700;">Jam Operasional</h3>
                </div>

                <div class="schedule-item mb-3 p-4 rounded" style="background: linear-gradient(135deg, var(--light) 0%, #ffffff 100%); border-left: 4px solid var(--primary);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0" style="color: var(--dark); font-weight: 700;">
                                <i class="fas fa-calendar-week me-2" style="color: var(--primary);"></i>Senin - Jumat
                            </h5>
                        </div>
                        <span class="badge" style="background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 8px; font-weight: 600;">
                            08.00 - 16.00 WIB
                        </span>
                    </div>
                </div>

                <div class="schedule-item mb-3 p-4 rounded" style="background: linear-gradient(135deg, var(--light) 0%, #ffffff 100%); border-left: 4px solid var(--secondary);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0" style="color: var(--dark); font-weight: 700;">
                                <i class="fas fa-calendar-day me-2" style="color: var(--secondary);"></i>Sabtu
                            </h5>
                        </div>
                        <span class="badge" style="background: var(--secondary); color: white; padding: 0.5rem 1rem; border-radius: 8px; font-weight: 600;">
                            08.00 - 12.00 WIB
                        </span>
                    </div>
                </div>

                <div class="schedule-item p-4 rounded" style="background: linear-gradient(135deg, #fee2e2 0%, #ffffff 100%); border-left: 4px solid #ef4444;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0" style="color: var(--dark); font-weight: 700;">
                                <i class="fas fa-calendar-times me-2" style="color: #ef4444;"></i>Minggu
                            </h5>
                        </div>
                        <span class="badge" style="background: #ef4444; color: white; padding: 0.5rem 1rem; border-radius: 8px; font-weight: 600;">
                            Tutup
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Struktur Organisasi -->
    <div class="text-center mb-5 mt-5 pt-5">
        <div class="badge-custom mx-auto">
            <i class="fas fa-sitemap me-2"></i>Organisasi
        </div>
        <h2 class="section-title">Struktur Organisasi</h2>
        <p class="section-subtitle">Tim profesional yang siap melayani masyarakat</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card-hover text-center" style="padding: 3rem 2rem;">
                <div style="width: 100px; height: 100px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);">
                    <i class="fas fa-user-tie" style="font-size: 2.5rem; color: white;"></i>
                </div>
                <h4 style="color: var(--dark); font-weight: 700; margin-bottom: 0.5rem;">Kepala Desa</h4>
                <p class="text-muted mb-0" style="font-size: 1.1rem;">Pelindung</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-hover text-center" style="padding: 3rem 2rem;">
                <div style="width: 100px; height: 100px; background: linear-gradient(135deg, var(--secondary), #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; box-shadow: 0 10px 30px rgba(52, 211, 153, 0.3);">
                    <i class="fas fa-gavel" style="font-size: 2.5rem; color: white;"></i>
                </div>
                <h4 style="color: var(--dark); font-weight: 700; margin-bottom: 0.5rem;">Koordinator POSBANKUM</h4>
                <p class="text-muted mb-0" style="font-size: 1.1rem;">Penanggung Jawab</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-hover text-center" style="padding: 3rem 2rem;">
                <div style="width: 100px; height: 100px; background: linear-gradient(135deg, #fbbf24, #f59e0b); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; box-shadow: 0 10px 30px rgba(251, 191, 36, 0.3);">
                    <i class="fas fa-users" style="font-size: 2.5rem; color: white;"></i>
                </div>
                <h4 style="color: var(--dark); font-weight: 700; margin-bottom: 0.5rem;">Tim Paralegal</h4>
                <p class="text-muted mb-0" style="font-size: 1.1rem;">Pelaksana</p>
            </div>
        </div>
    </div>

    <!-- Kontak -->
    <div class="mt-5 pt-5">
        <div class="card-hover" style="background: linear-gradient(135deg, var(--light) 0%, #d1fae5 100%); padding: 4rem 2rem;">
            <div class="text-center mb-5">
                <div class="badge-custom mx-auto">
                    <i class="fas fa-envelope me-2"></i>Hubungi Kami
                </div>
                <h2 class="section-title">Kontak Kami</h2>
                <p class="section-subtitle">Jangan ragu untuk menghubungi kami</p>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="text-center p-4 rounded" style="background: white; height: 100%;">
                        <div style="width: 80px; height: 80px; background: var(--light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                            <i class="fas fa-map-marker-alt" style="font-size: 2rem; color: var(--primary);"></i>
                        </div>
                        <h5 style="color: var(--dark); font-weight: 700; margin-bottom: 1rem;">Alamat</h5>
                        <p class="text-muted mb-0" style="line-height: 1.8;">
                            Kantor Desa Pulau Gadang<br>
                            Kec. XIII Koto Kampar, Riau
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-center p-4 rounded" style="background: white; height: 100%;">
                        <div style="width: 80px; height: 80px; background: var(--light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                            <i class="fas fa-phone" style="font-size: 2rem; color: var(--primary);"></i>
                        </div>
                        <h5 style="color: var(--dark); font-weight: 700; margin-bottom: 1rem;">Telepon</h5>
                        <p class="text-muted mb-0" style="line-height: 1.8;">
                            +62 812-xxxx-xxxx<br>
                            Senin - Sabtu, 08.00 - 16.00 WIB
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-center p-4 rounded" style="background: white; height: 100%;">
                        <div style="width: 80px; height: 80px; background: var(--light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                            <i class="fas fa-envelope" style="font-size: 2rem; color: var(--primary);"></i>
                        </div>
                        <h5 style="color: var(--dark); font-weight: 700; margin-bottom: 1rem;">Email</h5>
                        <p class="text-muted mb-0" style="line-height: 1.8;">
                            posbankum@pulaugadang.desa.id<br>
                            info@pulaugadang.desa.id
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('consultations.create') }}" class="btn btn-gradient btn-lg">
                    <i class="fas fa-comments"></i>
                    <span>Konsultasi Sekarang</span>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .schedule-item {
        transition: all 0.3s ease;
    }

    .schedule-item:hover {
        transform: translateX(5px);
        box-shadow: 0 8px 16px rgba(16, 185, 129, 0.1);
    }
</style>
@endsection