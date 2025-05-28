@foreach ($murids as $index => $murid)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $murid->nama }}</td>
        <td>{{ $murid->kelas }}</td>
        <td>{{ $murid->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
        <td>
            <x-cloudinary::image public-id="{{ $murid->public_id }}" width="100" />
        </td>
        <td>
            <button class="btn btn-sm btn-warning me-2" onclick="showEditOverlay('{{ $murid->id }}')">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger"
                onclick="confirmDelete('{{ route('admin.murid.delete', $murid->id) }}')">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
