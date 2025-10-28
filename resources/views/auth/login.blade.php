@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex align-items-center" style="position: relative; overflow: hidden;">
    <!-- Decorative Elements -->
    <div class="position-absolute" style="top: -100px; right: -100px; width: 300px; height: 300px; background: rgba(86, 171, 145, 0.1); border-radius: 50%; z-index: 0;"></div>
    <div class="position-absolute" style="bottom: -150px; left: -150px; width: 400px; height: 400px; background: rgba(168, 230, 207, 0.15); border-radius: 50%; z-index: 0;"></div>
    <div class="position-absolute" style="top: 50%; left: 50%; width: 200px; height: 200px; background: rgba(125, 211, 167, 0.08); border-radius: 50%; transform: translate(-50%, -50%); z-index: 0;"></div>
    
    <div class="container position-relative mt-4" style="z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card border-0 shadow-lg" style="border-radius: 24px; overflow: hidden; background: white;">
                    <!-- Header with Logo -->
                    <div class="text-center pt-5 pb-4 px-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 90px; height: 90px; background: linear-gradient(135deg, #a8e6cf 0%, #56ab91 100%); box-shadow: 0 8px 20px rgba(86, 171, 145, 0.2);">
                            <i class="fas fa-shield-alt text-white" style="font-size: 2.5rem;"></i>
                        </div>
                        <h3 class="fw-bold mb-1" style="color: #2d3748;">POSBANKUM</h3>
                        <p class="text-muted mb-0">Desa Pulau Gadang</p>
                        <div class="mt-2">
                            <span class="badge rounded-pill px-3 py-2" style="background-color: #e8f5f1; color: #56ab91; font-size: 0.75rem;">
                                Portal Administrasi
                            </span>
                        </div>
                    </div>

                    <!-- Login Form -->
                    <div class="p-4 p-md-5 pt-2">
                        <!-- Header -->
                        <div class="mb-4">
                            <h2 class="fw-bold mb-2" style="color: #2d3748;">Selamat Datang! 👋</h2>
                            <p class="text-muted mb-0">Silakan login untuk mengakses dashboard admin</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            @if($errors->any())
                            <div class="alert alert-dismissible fade show mb-4" 
                                 style="background-color: #fff5f5; border: 1px solid #feb2b2; border-radius: 12px;">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-exclamation-circle me-3 mt-1" style="color: #e53e3e;"></i>
                                    <div class="flex-grow-1">
                                        <strong style="color: #e53e3e;">Error!</strong>
                                        <p class="mb-0 mt-1" style="color: #742a2a;">{{ $errors->first() }}</p>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            </div>
                            @endif

                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold mb-2" style="color: #2d3748;">
                                    <i class="fas fa-envelope me-2" style="color: #56ab91;"></i>Email Address
                                </label>
                                <input id="email" 
                                       type="email" 
                                       class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autocomplete="email" 
                                       autofocus 
                                       placeholder="admin@pulaugadang.desa.id"
                                       style="border: 2px solid #e8f5f1; border-radius: 12px; padding: 0.75rem 1rem; transition: all 0.3s ease;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold mb-2" style="color: #2d3748;">
                                    <i class="fas fa-lock me-2" style="color: #56ab91;"></i>Password
                                </label>
                                <div class="position-relative">
                                    <input id="password" 
                                           type="password" 
                                           class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                           name="password" 
                                           required 
                                           autocomplete="current-password" 
                                           placeholder="••••••••"
                                           style="border: 2px solid #e8f5f1; border-radius: 12px; padding: 0.75rem 1rem; transition: all 0.3s ease;">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           name="remember" 
                                           id="remember" 
                                           {{ old('remember') ? 'checked' : '' }}
                                           style="border-color: #a8e6cf; cursor: pointer;">
                                    <label class="form-check-label" for="remember" style="color: #4a5568; cursor: pointer;">
                                        Ingat saya
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" 
                                        class="btn btn-lg fw-semibold" 
                                        style="background: linear-gradient(135deg, #56ab91 0%, #3d8b6d 100%); 
                                               color: white; 
                                               border: none; 
                                               border-radius: 12px; 
                                               padding: 0.875rem; 
                                               transition: all 0.3s ease;">
                                    <i class="fas fa-sign-in-alt me-2"></i>Login ke Dashboard
                                </button>
                            </div>

                            <div class="text-center">
                                <a class="text-decoration-none" 
                                   href="{{ route('password.request') }}" 
                                   style="color: #56ab91; font-weight: 500; transition: color 0.3s ease;">
                                    <i class="fas fa-question-circle me-1"></i>Lupa Password?
                                </a>
                            </div>
                        </form>
                    </div>

                    <!-- Footer Info -->
                    <div class="px-4 px-md-5 pb-4">
                        <div class="text-center p-3" style="background-color: #f8fafb; border-radius: 12px;">
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1" style="color: #56ab91;"></i>
                                Halaman ini khusus untuk admin POSBANKUM
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Back to Home Button -->
                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" 
                       class="btn btn-lg rounded-pill px-4" 
                       style="background-color: white; 
                              color: #56ab91; 
                              border: 2px solid #a8e6cf; 
                              font-weight: 500; 
                              transition: all 0.3s ease;
                              box-shadow: 0 4px 12px rgba(86, 171, 145, 0.15);">
                        <i class="fas fa-home me-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Focus States */
.form-control:focus {
    border-color: #56ab91 !important;
    box-shadow: 0 0 0 0.2rem rgba(86, 171, 145, 0.15) !important;
}

.form-check-input:checked {
    background-color: #56ab91;
    border-color: #56ab91;
}

.form-check-input:focus {
    border-color: #56ab91;
    box-shadow: 0 0 0 0.2rem rgba(86, 171, 145, 0.15);
}

/* Button Hover Effects */
button[type="submit"]:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(86, 171, 145, 0.3);
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(86, 171, 145, 0.25);
}

a:hover {
    color: #3d8b6d !important;
}

/* Input Hover */
.form-control:hover {
    border-color: #a8e6cf;
}

/* Card Animation */
.card {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 991.98px) {
    .min-vh-100 {
        padding: 2rem 0;
    }
}
</style>
@endsection