@extends('admin.manage')

@section('title', 'Kelola Guru & Staff')

@section('table-headers')
    <th>No</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Foto</th>
@endsection

@section('table-content')
    @foreach ($gurus as $index => $guru)
        <tr>
            <td class="align-middle">{{ $index + 1 }}</td>
            <td class="align-middle">
                {{ preg_replace_callback('/(?:^|[.,!?]\s*|\s+)\w/i',function ($matches) {return strtoupper($matches[0]);},strtolower($guru->nama)) }}
            </td>
            <td class="align-middle">{{ ucwords(strtolower($guru->jabatan)) }}</td>
            <td class="align-middle">
                <x-cloudinary::image public-id="{{ $guru->public_id }}" width="120" height="120" loading="lazy"
                    class="claudinary" style="width: 120px; height: 120px; object-fit: cover;"
                    alt="{{ preg_replace_callback('/(?:^|[.,!?]\s*|\s+)\w/i',function ($matches) {return strtoupper($matches[0]);},strtolower($guru->nama)) }}" />
            </td class="align-middle">
            <td class="align-middle">
                <button class="btn btn-sm btn-warning me-2 edit-btn" data-id="{{ $guru->id }}">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger delete-btn" data-url="{{ route('admin.guru.delete', $guru->id) }}">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endsection

@section('form-title', 'Tambah Guru/Staff')
@section('form-action', route('admin.guru.store'))

@section('form-content')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan</label>
        <input type="text" class="form-control" id="jabatan" name="jabatan" required>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
    </div>
@endsection

@section('edit-form-title', 'Edit Guru/Staff')

@section('edit-form-content')
    <div class="mb-3">
        <label for="edit_nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="edit_nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="edit_jabatan" class="form-label">Jabatan</label>
        <input type="text" class="form-control" id="edit_jabatan" name="jabatan" required>
    </div>
    <div class="mb-3">
        <label for="edit_foto" class="form-label">Foto (Kosongkan jika tidak ingin mengubah)</label>
        <input type="file" class="form-control" id="edit_foto" name="foto" accept="image/*">
    </div>
@endsection

@push('scripts')
    <script>
        function loadEditForm(id) {
            fetch(`/admin/guru/${id}/edit`, {
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
                    document.getElementById('edit_nama').value = data.nama;
                    document.getElementById('edit_jabatan').value = data.jabatan;
                    document.getElementById('editForm').action = `/admin/guru/${id}`;
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
