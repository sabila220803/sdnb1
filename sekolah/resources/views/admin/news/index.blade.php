@extends('admin.manage')

@section('title', 'Kelola Berita')

@section('table-headers')
    <th>No</th>
    <th>Judul</th>
    <th>Tanggal Publikasi</th>
    <th>Thumbnail</th>
@endsection

@section('table-content')
    @foreach($news as $index => $item)
        <tr>
            <td class="align-middle">{{ $index + 1 }}</td>
            <td class="align-middle">{{ $item->title }}</td>
            <td class="align-middle">{{ $item->publish_date }}</td>
            <td class="align-middle">
                <x-cloudinary::image public-id="{{ $item->public_id }}" width="100" />
            </td>
            <td class="align-middle">
                <button class="btn btn-sm btn-warning me-2" onclick="showEditOverlay('{{ $item->id }}')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="confirmDelete('{{ route('admin.news.delete', $item->id) }}')">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endsection

@section('form-title', 'Tambah Berita')
@section('form-action', route('admin.news.store'))

@section('form-content')
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Konten</label>
        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
    </div>
    <div class="mb-3">
        <label for="publish_date" class="form-label">Tanggal Publikasi</label>
        <input type="date" class="form-control" id="publish_date" name="publish_date" required>
    </div>
    <div class="mb-3">
        <label for="thumbnail" class="form-label">Thumbnail</label>
        <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" required>
    </div>
@endsection

@section('edit-form-title', 'Edit Berita')
@section('edit-form-action', '')

@section('edit-form-content')
    <div class="mb-3">
        <label for="edit_title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="edit_title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="edit_content" class="form-label">Konten</label>
        <textarea class="form-control" id="edit_content" name="content" rows="5" required></textarea>
    </div>
    <div class="mb-3">
        <label for="edit_publish_date" class="form-label">Tanggal Publikasi</label>
        <input type="date" class="form-control" id="edit_publish_date" name="publish_date" required>
    </div>
    <div class="mb-3">
        <label for="edit_thumbnail" class="form-label">Thumbnail (Kosongkan jika tidak ingin mengubah)</label>
        <input type="file" class="form-control" id="edit_thumbnail" name="thumbnail" accept="image/*">
    </div>
@endsection

@push('scripts')
<script>
    function showEditOverlay(id) {
        // Fetch news data and populate form
        fetch(`/admin/news/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit_title').value = data.title;
                document.getElementById('edit_content').value = data.content;
                document.getElementById('edit_publish_date').value = data.publish_date;
                document.querySelector('#editOverlay form').action = `/admin/news/${id}`;
                showEditOverlay();
            });
    }
</script>
@endpush