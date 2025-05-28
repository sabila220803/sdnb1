@extends('layouts.app')

@section('content')
    <div class="container py-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header text-center text-white py-4" style="background-color: #3970be;">
                        <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo Sekolah" width="80" height="80"
                            class="mb-3">
                        <h3 class="mb-0 fw-bold">Login Admin</h3>
                        <p class="mb-0">SDN BANDARHARJO 1</p>
                    </div>
                    <div class="card-body p-4">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="mt-4">
                            @csrf
                            <div class="mb-4">
                                <label for="username" class="form-label fw-semibold"><i
                                        class="fas fa-user me-2"></i>Username</label>
                                <input type="text"
                                    class="form-control form-control-lg @error('username') is-invalid @enderror"
                                    id="username" name="username" value="{{ old('username') }}"
                                    placeholder="Masukkan username" required autofocus
                                    style="border-radius: 10px; border: 1px solid #ced4da;">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold"><i
                                        class="fas fa-lock me-2"></i>Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg " id="password"
                                        name="password" placeholder="Masukkan password" required
                                        style="border-radius: 10px 0 0 10px; border: 1px solid #ced4da;">
                                    <button type="button" class="input-group-text" id="togglePassword"
                                        style="border-radius: 0 10px 10px 0; border: 1px solid #ced4da;">
                                        <i class="fas fa-eye mx-2"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>

                            <div class="d-grid gap-2 pb-4">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="background-color: #3970be; border: none; border-radius: 10px;">
                                    <i class="fas fa-sign-in-alt me-2"></i> Login
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3" style="background-color: #f8f9fa;">
                        <p class="mb-0">&copy; 2023 SDN Bandarharjo 1. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Toggle icon
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });
    </script>
@endsection
