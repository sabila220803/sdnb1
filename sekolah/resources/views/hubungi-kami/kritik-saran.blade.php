@extends('layouts.app')

@section('content')
<div class="container my-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Untuk Pengaduan bisa dilakukan dengan mengisi FORM di bawah ini:</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kritik-saran.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Anda Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="surel" class="form-label">Surel</label>
                            <input type="email" class="form-control" id="surel" name="surel" placeholder="Masukkan Anda Surel" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_kontak" class="form-label">Nomor Kontak</label>
                            <input type="tel" class="form-control" id="nomor_kontak" name="nomor_kontak" placeholder="Masukkan Nomor Telpon" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi" required></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.card {
    border-radius: 10px;
    border: none;
}

.card-header {
    border-radius: 10px 10px 0 0 !important;
    background-color: #3970BE !important;
}

.form-control {
    border-radius: 8px;
    padding: 0.75rem;
    border: 1px solid #ced4da;
}

.form-control:focus {
    border-color: #3970BE;
    box-shadow: 0 0 0 0.25rem rgba(57, 112, 190, 0.25);
}

.btn-primary {
    background-color: #3970BE;
    border-color: #3970BE;
    border-radius: 8px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #2d5a9e;
    border-color: #2d5a9e;
    transform: translateY(-2px);
}
</style>
@endpush