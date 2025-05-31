@extends('admin.manage')

@section('title', 'Kelola Berita')

@section('table-headers')
    <th>No</th>
    <th>Judul</th>
    <th>Penerbit</th>
    <th>Foto</th>
    <th>Tanggal Publikasi</th>
@endsection

@section('table-content')
    @foreach ($news as $index => $item)
        <tr>
            <td class="align-middle">{{ $index + 1 }}</td>
            <td class="align-middle">{{ ucwords($item->judul) }}</td>
            <td class="align-middle">
                {{ preg_replace_callback('/(?:^|[.,!?]\s*|\s+)\w/i',function ($matches) {return strtoupper($matches[0]);},strtolower($item->penerbit)) }}
            </td>
            <td class="align-middle">
                <x-cloudinary::image public-id="{{ $item->public_id }}" width="120" height="120" loading="lazy"
                    class="claudinary" style="width: 120px; height: 120px; object-fit: cover;"
                    alt="{{ ucwords($item->judul) }}" />
            </td>
            <td class="align-middle">{{ $item->created_at->format('d/m/Y') }}</td>
            <td class="align-middle">
                <button class="btn btn-sm btn-warning me-2" onclick="loadEditForm('{{ $item->id }}')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger"
                    onclick="confirmDelete('{{ route('admin.news.delete', $item->id) }}')">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endsection

@section('showing-entries')
    Menampilkan <b>{{ $news->firstItem() }}</b> sampai <b>{{ $news->lastItem() }}</b> dari <b>{{ $news->total() }}</b>
    data
@endsection

@section('pagination')
    {{ $news->onEachSide(1)->links('pagination::bootstrap-4') }}
@endsection

@section('form-title', 'Tambah Berita')
@section('form-action', route('admin.news.store'))

@section('form-content')
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" required>
    </div>
    <div class="mb-3">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit" required>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
    </div>
@endsection

@section('edit-form-title', 'Edit Berita')
@section('edit-form-action', '')

@section('edit-form-content')
    <div class="mb-3">
        <label for="edit_judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="edit_judul" name="judul" required>
    </div>
    <div class="mb-3">
        <label for="edit_penerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control" id="edit_penerbit" name="penerbit" required>
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
            fetch(`/admin/news/${id}/edit`, {
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
                    document.getElementById('edit_penerbit').value = data.penerbit;
                    document.getElementById('edit_deskripsi').value = data.deskripsi;
                    document.getElementById('editForm').action = `/admin/news/${id}`;
                    showEditOverlay();
                })
                .catch(error => {
                    console.error('Error details:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: `Gagal memuat data: ${error.message}`,
                        icon: 'error'
                    });
                });
        }
    </script>
@endpush
