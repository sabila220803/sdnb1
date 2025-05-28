@extends('admin.manage')

@section('title', 'Kelola Kurikulum')

@section('table-headers')
    <th>No</th>
    <th>Nama</th>
    <th>Jenis</th>
    <th>File</th>
    <th>Tanggal Upload</th>
@endsection

@section('table-content')
    @foreach ($kurikulums as $index => $kurikulum)
        <tr>
            <td class="align-middle">{{ $index + 1 }}</td>
            <td class="align-middle">{{ $kurikulum->nama }}</td>
            <td class="align-middle">{{ $kurikulum->jenis }}</td>
            <td class="align-middle">
                @if ($kurikulum->public_id)
                    <x-cloudinary::image public-id="{{ $kurikulum->public_id }}" width="100" />
                @else
                    <a href="{{ $kurikulum->url_file }}" target="_blank" class="btn btn-sm btn-info">
                        <i class="fas fa-file-download"></i> Download
                    </a>
                @endif
            </td>
            <td class="align-middle">{{ $kurikulum->created_at->format('d/m/Y') }}</td>
            <td class="align-middle">
                <button class="btn btn-sm btn-warning me-2" onclick="showEditOverlay('{{ $kurikulum->id }}')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger"
                    onclick="confirmDelete('{{ route('admin.kurikulum.delete', $kurikulum->id) }}')">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endsection

@section('form-title', 'Tambah Kurikulum')
@section('form-action', route('admin.kurikulum.store'))

@section('form-content')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="jenis" class="form-label">Jenis</label>
        <select class="form-control" id="jenis" name="jenis" required>
            <option value="">Pilih Jenis</option>
            <option value="Kalender Akademik">Kalender Akademik</option>
            <option value="Jadwal Pelajaran">Jadwal Pelajaran</option>
            <option value="Silabus">Silabus</option>
            <option value="RPP">RPP</option>
            <option value="Materi Pembelajaran">Materi Pembelajaran</option>
            <option value="Dokumen Lainnya">Dokumen Lainnya</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Upload File</label>
        <input type="file" class="form-control" id="file" name="file" required>
        <small class="text-muted">Format yang didukung: PDF, DOC, DOCX, XLS, XLSX, JPG, PNG</small>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
    </div>
@endsection

@section('edit-form-title', 'Edit Kurikulum')
@section('edit-form-action', '')

@section('edit-form-content')
    <div class="mb-3">
        <label for="edit_nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="edit_nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="edit_jenis" class="form-label">Jenis</label>
        <select class="form-control" id="edit_jenis" name="jenis" required>
            <option value="">Pilih Jenis</option>
            <option value="Kalender Akademik">Kalender Akademik</option>
            <option value="Jadwal Pelajaran">Jadwal Pelajaran</option>
            <option value="Silabus">Silabus</option>
            <option value="RPP">RPP</option>
            <option value="Materi Pembelajaran">Materi Pembelajaran</option>
            <option value="Dokumen Lainnya">Dokumen Lainnya</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="edit_file" class="form-label">Upload File Baru (Kosongkan jika tidak ingin mengubah)</label>
        <input type="file" class="form-control" id="edit_file" name="file">
        <small class="text-muted">Format yang didukung: PDF, DOC, DOCX, XLS, XLSX, JPG, PNG</small>
    </div>
    <div class="mb-3">
        <label for="edit_deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3"></textarea>
    </div>
@endsection

@push('scripts')
    <script>
        function showEditOverlay(id) {
            // Fetch kurikulum data and populate form
            fetch(`/admin/kurikulum/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_nama').value = data.nama;
                    document.getElementById('edit_jenis').value = data.jenis;
                    document.getElementById('edit_deskripsi').value = data.deskripsi;
                    document.querySelector('#editOverlay form').action = `/admin/kurikulum/${id}`;
                    showEditOverlay();
                });
        }
    </script>
@endpush
