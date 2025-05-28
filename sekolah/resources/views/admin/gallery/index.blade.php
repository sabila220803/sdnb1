@extends('admin.manage')

@section('title', 'Kelola Galeri')

@section('table-headers')
    <th>No</th>
    <th>Judul</th>
    <th>Kategori</th>
    <th>Gambar/Video</th>
    <th>Tanggal Upload</th>
@endsection

@section('table-content')
    @foreach($galleries as $index => $gallery)
        <tr>
            <td class="align-middle">{{ $index + 1 }}</td>
            <td class="align-middle">{{ $gallery->title }}</td>
            <td class="align-middle">{{ $gallery->category }}</td>
            <td class="align-middle">
                @if($gallery->type === 'image')
                    <x-cloudinary::image public-id="{{ $gallery->public_id }}" width="100" />
                @else
                    <video width="100" controls>
                        <source src="{{ $gallery->url }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
            </td>
            <td class="align-middle">{{ $gallery->created_at->format('d/m/Y') }}</td>
            <td class="align-middle">
                <button class="btn btn-sm btn-warning me-2" onclick="showEditOverlay('{{ $gallery->id }}')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="confirmDelete('{{ route('admin.gallery.delete', $gallery->id) }}')">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endsection

@section('form-title', 'Tambah Media')
@section('form-action', route('admin.gallery.store'))

@section('form-content')
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Kategori</label>
        <select class="form-control" id="category" name="category" required>
            <option value="">Pilih Kategori</option>
            <option value="kegiatan">Kegiatan</option>
            <option value="fasilitas">Fasilitas</option>
            <option value="prestasi">Prestasi</option>
            <option value="lainnya">Lainnya</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Tipe Media</label>
        <select class="form-control" id="type" name="type" required onchange="toggleMediaInput()">
            <option value="image">Gambar</option>
            <option value="video">Video</option>
        </select>
    </div>
    <div class="mb-3" id="imageInput">
        <label for="image" class="form-label">Upload Gambar</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>
    <div class="mb-3" id="videoInput" style="display: none;">
        <label for="video" class="form-label">Upload Video</label>
        <input type="file" class="form-control" id="video" name="video" accept="video/*">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
@endsection

@section('edit-form-title', 'Edit Media')
@section('edit-form-action', '')

@section('edit-form-content')
    <div class="mb-3">
        <label for="edit_title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="edit_title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="edit_category" class="form-label">Kategori</label>
        <select class="form-control" id="edit_category" name="category" required>
            <option value="">Pilih Kategori</option>
            <option value="kegiatan">Kegiatan</option>
            <option value="fasilitas">Fasilitas</option>
            <option value="prestasi">Prestasi</option>
            <option value="lainnya">Lainnya</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="edit_media" class="form-label">Upload Media Baru (Kosongkan jika tidak ingin mengubah)</label>
        <input type="file" class="form-control" id="edit_media" name="media" accept="image/*,video/*">
    </div>
    <div class="mb-3">
        <label for="edit_description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
    </div>
@endsection

@push('scripts')
<script>
    function toggleMediaInput() {
        const type = document.getElementById('type').value;
        const imageInput = document.getElementById('imageInput');
        const videoInput = document.getElementById('videoInput');
        
        if (type === 'image') {
            imageInput.style.display = 'block';
            videoInput.style.display = 'none';
            document.getElementById('video').value = '';
        } else {
            imageInput.style.display = 'none';
            videoInput.style.display = 'block';
            document.getElementById('image').value = '';
        }
    }

    function showEditOverlay(id) {
        // Fetch gallery data and populate form
        fetch(`/admin/gallery/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit_title').value = data.title;
                document.getElementById('edit_category').value = data.category;
                document.getElementById('edit_description').value = data.description;
                document.querySelector('#editOverlay form').action = `/admin/gallery/${id}`;
                showEditOverlay();
            });
    }
</script>
@endpush