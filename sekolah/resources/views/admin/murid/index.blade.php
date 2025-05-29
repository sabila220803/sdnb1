@extends('admin.manage')

@section('title', 'Kelola Murid')

@section('table-headers')
    <th>No</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Jenis Kelamin</th>
    <th>Foto</th>
@endsection

@section('table-content')
    @foreach ($murids as $index => $murid)
        <tr>
            <td class="align-middle">{{ $index + 1 }}</td>
            <td class="align-middle">{{ ucwords($murid->nama) }}</td>
            <td class="align-middle">{{ $murid->kelas }}</td>
            <td class="align-middle">{{ $murid->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td class="align-middle">
                @if($murid->public_id)
                <x-cloudinary::image public-id="{{ $murid->public_id }}" width="120" height="120" loading="lazy"
                    class="claudinary" style="width: 120px; height: 120px; object-fit: cover;"
                    alt="{{ ucwords($murid->nama) }}" />
                @endif
            </td>
            <td class="align-middle">
                <button class="btn btn-sm btn-warning me-2" onclick="loadEditForm('{{ $murid->id }}')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger"
                    onclick="confirmDelete('{{ route('admin.murid.delete', $murid->id) }}')">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endsection

@section('showing-entries')
    Menampilkan <b>{{ $murids->firstItem() }}</b> sampai <b>{{ $murids->lastItem() }}</b> dari <b>{{ $murids->total() }}</b>
    data
@endsection

@section('pagination')
    {{ $murids->onEachSide(1)->links('pagination::bootstrap-4') }}
@endsection

@section('form-title', 'Tambah Murid')
@section('form-action', route('admin.murid.store'))

@section('form-content')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <select class="form-control" id="kelas" name="kelas" required>
            <option value="">Pilih Kelas</option>
            <option value="1">Kelas 1</option>
            <option value="2">Kelas 2</option>
            <option value="3">Kelas 3</option>
            <option value="4">Kelas 4</option>
            <option value="5">Kelas 5</option>
            <option value="6">Kelas 6</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <div class="d-flex gap-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_l" value="L"
                    required>
                <label class="form-check-label" for="jenis_kelamin_l">Laki-laki</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_p" value="P"
                    required>
                <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
    </div>
@endsection

@section('edit-form-title', 'Edit Murid')
@section('edit-form-action', '')

@section('edit-form-content')
    <div class="mb-3">
        <label for="edit_nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="edit_nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="edit_kelas" class="form-label">Kelas</label>
        <select class="form-control" id="edit_kelas" name="kelas" required>
            <option value="">Pilih Kelas</option>
            <option value="1">Kelas 1</option>
            <option value="2">Kelas 2</option>
            <option value="3">Kelas 3</option>
            <option value="4">Kelas 4</option>
            <option value="5">Kelas 5</option>
            <option value="6">Kelas 6</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <div class="d-flex gap-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="edit_jenis_kelamin_l" value="L"
                    required>
                <label class="form-check-label" for="edit_jenis_kelamin_l">Laki-laki</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="edit_jenis_kelamin_p" value="P"
                    required>
                <label class="form-check-label" for="edit_jenis_kelamin_p">Perempuan</label>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="edit_foto" class="form-label">Foto (Kosongkan jika tidak ingin mengubah)</label>
        <input type="file" class="form-control" id="edit_foto" name="foto" accept="image/*">
    </div>
@endsection

@push('scripts')
    <script>
        function loadEditForm(id) {
            fetch(`/admin/murid/${id}/edit`, {
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
                    document.getElementById('edit_kelas').value = data.kelas;
                    if (data.jenis_kelamin === 'L') {
                        document.getElementById('edit_jenis_kelamin_l').checked = true;
                    } else {
                        document.getElementById('edit_jenis_kelamin_p').checked = true;
                    }
                    document.getElementById('editForm').action = `/admin/murid/${id}`;
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