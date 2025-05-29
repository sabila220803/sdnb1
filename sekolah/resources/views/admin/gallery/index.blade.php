@extends('admin.manage')

@section('title', 'Kelola Galeri')

@section('table-headers')
    <th>No</th>
    <th>Judul</th>
    <th>Foto</th>
    <th>Deskripsi</th>
@endsection

@section('table-content')
    @foreach ($galleries as $index => $gallery)
        <tr>
            <td class="align-middle">{{ $index + 1 }}</td>
            <td class="align-middle">{{ ucwords($gallery->judul) }}</td>
            <td class="align-middle">
                <x-cloudinary::image public-id="{{ $gallery->public_id }}" width="120" height="120" loading="lazy"
                    class="claudinary" style="width: 120px; height: 120px; object-fit: cover;"
                    alt="{{ ucwords($gallery->judul) }}" />
            </td>
            <td class="align-middle">{{ $gallery->deskripsi }}</td>
            <td class="align-middle">
                <button class="btn btn-sm btn-warning me-2" onclick="loadEditForm('{{ $gallery->id }}')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger"
                    onclick="confirmDelete('{{ route('admin.gallery.delete', $gallery->id) }}')">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endsection

@section('showing-entries')
    Menampilkan <b>{{ $galleries->firstItem() }}</b> sampai <b>{{ $galleries->lastItem() }}</b> dari
    <b>{{ $galleries->total() }}</b>
    data
@endsection

@section('pagination')
    {{ $galleries->onEachSide(1)->links('pagination::bootstrap-4') }}
@endsection

@section('form-title', 'Tambah Media')
@section('form-action', route('admin.gallery.store'))

@section('form-content')
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" required>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
    </div>
@endsection

@section('edit-form-title', 'Edit Media')
@section('edit-form-action', '')

@section('edit-form-content')
    <div class="mb-3">
        <label for="edit_judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="edit_judul" name="judul" required>
    </div>
    <div class="mb-3">
        <label for="edit_foto" class="form-label">Foto (Kosongkan jika tidak ingin mengubah)</label>
        <input type="file" class="form-control" id="edit_foto" name="foto" accept="image/*">
    </div>
    <div class="mb-3">
        <label for="edit_deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
    </div>
@endsection

@push('scripts')
    <script>
        function loadEditForm(id) {
            fetch(`/admin/gallery/${id}/edit`, {
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
                    document.getElementById('edit_judul').value = data.judul;
                    document.getElementById('edit_deskripsi').value = data.deskripsi;
                    document.getElementById('editForm').action = `/admin/gallery/${id}`;
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
