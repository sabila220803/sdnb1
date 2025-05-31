@extends('admin.manage')

@section('title', 'Kelola Kalender Pendidikan')

@section('table-headers')
    <th>No</th>
    <th>Nama</th>
    <th>Jenis</th>
    <th>File</th>
    <th>Tahun Ajaran</th>
    <th>Tanggal Upload</th>
@endsection

@section('table-content')
    @foreach ($kurikulums as $index => $kurikulum)
        <tr>
            <td class="align-middle">{{ $index + 1 }}</td>
            <td class="align-middle">{{ ucwords($kurikulum->nama) }}</td>
            <td class="align-middle">{{ $kurikulum->jenis }}</td>
            <td class="align-middle">
                <a href="{{ route('admin.kurikulum.download', $kurikulum->id) }}" target="_blank"
                    class="btn btn-sm btn-primary">
                    <i class="fas fa-file-download"></i> Download
                </a>
            </td>
            <td class="align-middle">{{ $kurikulum->tahun_ajaran }}</td>
            <td class="align-middle">{{ $kurikulum->created_at->format('d/m/Y') }}</td>
            <td class="align-middle">
                <button class="btn btn-sm btn-warning me-2" onclick="loadEditForm('{{ $kurikulum->id }}')">
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
            <option value="Kaldik Kota Semarang">Kaldik Kota Semarang</option>
            <option value="Kaldik SDN Bandarharjo 01">Kaldik SDN Bandarharjo 01</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Upload File</label>
        <input type="file" class="form-control" id="file" name="file" required>
        <small class="text-muted">Format yang didukung: PDF</small>
    </div>
    <div class="mb-3">
        <label for='tahun_ajaran' class="form-label">Tahun Ajaran</label>
        <div class="input-group" style="width: 105px;">
            <input type="text" class="form-control" id="tahun_ajaran_1" name="tahun_ajaran_1" maxlength="2"
                style="text-align: padding-right: 0; border-radius: 6px;"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
            <span class="input-group-text px-2" style="background: none; border: none;">/</span>
            <input type="text" class="form-control" id="tahun_ajaran_2" name="tahun_ajaran_2" maxlength="2"
                style="text-align: padding-left: 0; border-radius: 6px;"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        </div>
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
            <option value="Kaldik Kota Semarang">Kaldik Kota Semarang</option>
            <option value="Kaldik SDN Bandarharjo 01">Kaldik SDN Bandarharjo 01</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="edit_file" class="form-label">Upload File Baru (Kosongkan jika tidak ingin mengubah)</label>
        <input type="file" class="form-control" id="edit_file" name="file">
        <small class="text-muted">Format yang didukung: PDF</small>
    </div>
    <div class="mb-3">
        <label for='edit_tahun_ajaran' class="form-label">Tahun Ajaran</label>
        <div class="input-group" style="width: 105px;">
            <input type="text" class="form-control" id="edit_tahun_ajaran_1" name="tahun_ajaran_1" maxlength="2"
                style="text-align: padding-right: 0; border-radius: 6px;"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
            <span class="input-group-text px-2" style="background: none; border: none;">/</span>
            <input type="text" class="form-control" id="edit_tahun_ajaran_2" name="tahun_ajaran_2" maxlength="2"
                style="text-align: padding-left: 0; border-radius: 6px;"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        </div>
@endsection


@push('scripts')
    <script>
        function loadEditForm(id) {
            fetch(`/admin/kurikulum/${id}/edit`, {
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
                    document.getElementById('edit_jenis').value = data.jenis;
                    let tahunAjaran = data.tahun_ajaran.split('/');
                    document.getElementById('edit_tahun_ajaran_1').value = `${tahunAjaran[0]}`;
                    document.getElementById('edit_tahun_ajaran_2').value = `${tahunAjaran[1]}`;
                    document.getElementById('editForm').action = `/admin/kurikulum/${id}`;
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

        // Event listener untuk input pertama
        document.getElementById('tahun_ajaran_1').addEventListener('input', function(e) {
            let value = this.value.replace(/[^0-9]/g, '');
            if (value.length >= 2) {
                this.value = value.substring(0, 2);
                document.getElementById('tahun_ajaran_2').focus();
            }
        });

        // Event listener untuk input kedua
        document.getElementById('tahun_ajaran_2').addEventListener('input', function(e) {
            let value = this.value.replace(/[^0-9]/g, '');
            if (value.length >= 2) {
                this.value = value.substring(0, 2);
                this.blur();
            }
        });
    </script>
@endpush
