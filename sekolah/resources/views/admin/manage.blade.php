@extends('layouts.app')

@push('styles')
    <style>
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .overlay-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 2rem;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
        }

        .close-overlay {
            position: absolute;
            top: 1rem;
            right: 1rem;
            cursor: pointer;
        }

        .hover-card {
            transition: transform 0.2s;
        }

        .hover-card:hover {
            transform: translateY(-5px);
        }

        .claudinary {
            height: 100px;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
    <div class="container py-5 mt-5">
        <div class="card shadow-lg border-0" style="border-radius: 15px;">
            <div class="card-header d-flex justify-content-between align-items-center py-3"
                style="background-color: #3970be;">
                <h3 class="mb-0 text-white fw-bold">@yield('title')</h3>
                <button class="btn btn-light" id="addButton">
                    <i class="fas fa-plus me-1"></i> Tambah
                </button>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                @yield('table-headers')
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @yield('table-content')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Overlay -->
    <div class="overlay" id="addOverlay">
        <div class="overlay-content">
            <div class="close-overlay" id="closeAddOverlay">
                <i class="fas fa-times"></i>
            </div>
            <h4 class="mb-4">@yield('form-title')</h4>
            <form action="@yield('form-action')" method="POST" enctype="multipart/form-data" id="addForm">
                @csrf
                @yield('form-content')
                <div class="mt-4 text-end">
                    <button type="button" class="btn btn-secondary me-2" id="cancelAddButton">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Overlay -->
    <div class="overlay" id="editOverlay">
        <div class="overlay-content">
            <div class="close-overlay" id="closeEditOverlay">
                <i class="fas fa-times"></i>
            </div>
            <h4 class="mb-4">@yield('edit-form-title')</h4>
            <form action="" method="POST" enctype="multipart/form-data" id="editForm">
                @csrf
                @method('PUT')
                @yield('edit-form-content')
                <div class="mt-4 text-end">
                    <button type="button" class="btn btn-secondary me-2" id="cancelEditButton">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Notifikasi SweetAlert untuk session
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                    timer: 760,
                    showConfirmButton: false
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                    timer: 760,
                    showConfirmButton: true
                });
            @endif
            // Add Button Event
            document.getElementById('addButton').addEventListener('click', showAddOverlay);
            document.getElementById('closeAddOverlay').addEventListener('click', hideAddOverlay);
            document.getElementById('cancelAddButton').addEventListener('click', hideAddOverlay);

            // Edit Button Events
            document.getElementById('closeEditOverlay').addEventListener('click', hideEditOverlay);
            document.getElementById('cancelEditButton').addEventListener('click', hideEditOverlay);

            // Event Delegation for Edit buttons
            document.addEventListener('click', function(e) {
                if (e.target.closest('.edit-btn')) {
                    const id = e.target.closest('.edit-btn').dataset.id;
                    loadEditForm(id);
                }

                if (e.target.closest('.delete-btn')) {
                    const url = e.target.closest('.delete-btn').dataset.url;
                    confirmDelete(url);
                }
            });
        });

        function showAddOverlay() {
            document.getElementById('addOverlay').style.display = 'block';
        }

        function hideAddOverlay() {
            document.getElementById('addOverlay').style.display = 'none';
        }

        function showEditOverlay() {
            document.getElementById('editOverlay').style.display = 'block';
        }

        function hideEditOverlay() {
            document.getElementById('editOverlay').style.display = 'none';
        }



        function confirmDelete(deleteUrl) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = deleteUrl;

                    const csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = document.querySelector('meta[name="csrf-token"]').content;
                    form.appendChild(csrf);

                    const method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'DELETE';
                    form.appendChild(method);

                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>
@endpush
