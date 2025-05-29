@extends('admin.manage')

@section('title', 'Kelola Prestasi')

@section('table-headers')
    <th>No</th>
    <th>Nama Peserta</th>
    <th>Nama Lomba</th>
    <th>Tingkat</th>
    <th>Juara</th>
    <th>Tahun</th>
    <th>Foto</th>
@endsection

@section('table-content')
    @foreach ($prestasis as $index => $prestasi)
        <tr>
            <td class="align-middle">{{ $index + 1 }}</td>
            <td class="align-middle">{{ ucwords($prestasi->nama_peserta) }}</td>
            <td class="align-middle">{{ ucwords($prestasi->nama_lomba) }}</td>
            <td class="align-middle">{{ ucwords($prestasi->tingkat) }}</td>
            <td class="align-middle">{{ $prestasi->juara }}</td>
            <td class="align-middle">{{ $prestasi->tahun }}</td>
            <td class="align-middle">
                <x-cloudinary::image public-id="{{ $prestasi->public_id }}" width="120" height="120" loading="lazy"
                    class="claudinary" style="width: 120px; height: 120px; object-fit: cover;"
                    alt="{{ ucwords($prestasi->nama_peserta) }}" />
            </td>
            <td class="align-middle">
                <button class="btn btn-sm btn-warning me-2" onclick="loadEditForm('{{ $prestasi->id }}')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger"
                    onclick="confirmDelete('{{ route('admin.prestasi.delete', $prestasi->id) }}')">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endsection

@section('showing-entries')
    Menampilkan <b>{{ $prestasis->firstItem() }}</b> sampai <b>{{ $prestasis->lastItem() }}</b> dari
    <b>{{ $prestasis->total() }}</b>
    data
@endsection

@section('pagination')
    {{ $prestasis->onEachSide(1)->links('pagination::bootstrap-4') }}
@endsection

@section('form-title', 'Tambah Prestasi')
@section('form-action', route('admin.prestasi.store'))

@section('form-content')
    <div class="mb-3">
        <label for="nama_peserta" class="form-label">Nama Peserta</label>
        <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" required>
    </div>
    <div class="mb-3">
        <label for="nama_lomba" class="form-label">Nama Lomba</label>
        <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" required>
    </div>
    <div class="mb-3">
        <label for="tingkat" class="form-label">Tingkat</label>
        <input type="text" class="form-control" id="tingkat" name="tingkat" required>
    </div>
    <div class="mb-3">
        <label for="juara" class="form-label">Juara</label>
        <input type="number" class="form-control" id="juara" name="juara" min="1" required>
    </div>
    <div class="mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <input type="number" class="form-control" id="tahun" name="tahun" min="2000" required>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
    </div>
@endsection

@section('edit-form-title', 'Edit Prestasi')
@section('edit-form-action', '')

@section('edit-form-content')
    <div class="mb-3">
        <label for="edit_nama_peserta" class="form-label">Nama Peserta</label>
        <input type="text" class="form-control" id="edit_nama_peserta" name="nama_peserta" required>
    </div>
    <div class="mb-3">
        <label for="edit_nama_lomba" class="form-label">Nama Lomba</label>
        <input type="text" class="form-control" id="edit_nama_lomba" name="nama_lomba" required>
    </div>
    <div class="mb-3">
        <label for="edit_tingkat" class="form-label">Tingkat</label>
        <input type="text" class="form-control" id="edit_tingkat" name="tingkat" required>
    </div>
    <div class="mb-3">
        <label for="edit_juara" class="form-label">Juara</label>
        <input type="number" class="form-control" id="edit_juara" name="juara" min="1" required>
    </div>
    <div class="mb-3">
        <label for="edit_tahun" class="form-label">Tahun</label>
        <input type="number" class="form-control" id="edit_tahun" name="tahun" min="2000" required>
    </div>
    <div class="mb-3">
        <label for="edit_foto" class="form-label">Foto (Kosongkan jika tidak ingin mengubah)</label>
        <input type="file" class="form-control" id="edit_foto" name="foto" accept="image/*">
    </div>
@endsection

@push('scripts')
    <script>
        function loadEditForm(id) {
            fetch(`/admin/prestasi/${id}/edit`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    document.getElementById('edit_nama_peserta').value = data.nama_peserta;
                    document.getElementById('edit_nama_lomba').value = data.nama_lomba;
                    document.getElementById('edit_tingkat').value = data.tingkat;
                    document.getElementById('edit_juara').value = data.juara;
                    document.getElementById('edit_tahun').value = data.tahun;
                    document.getElementById('editForm').action = `/admin/prestasi/${id}`;
                    showEditOverlay();
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Gagal memuat data',
                        icon: 'error'
                    });
                });
        }
    </script>
@endpush
