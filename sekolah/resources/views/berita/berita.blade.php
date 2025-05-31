@extends('layouts.app')
@push('styles')
    <style>
        .news {
            width: 250px;
            height: 200px;
            object-fit: cover;
        }

        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        .showing-entries {
            color: #6c757d;
            font-size: 0.875rem;
        }

        .pagination {
            margin: 0;
        }
    </style>
@endpush
@section('content')
    <div class="berita-page-section">
        <div class="container">
            <h2 class="berita-page-title text-center mb-5">Berita Sekolah</h2>
            <div class="d-flex align-items-center w-100">
                <form method="GET" action="@yield('search-action')" class="w-100 me-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari..."
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="berita-page-wrapper">
                @foreach ($news as $item)
                    <div class="berita-page-item">
                        <div class="berita-page-image">
                            <x-cloudinary::image public-id="{{ $item->public_id }}" alt="News {{ ucwords($item->judul) }}"
                                transformation="c_fill,h_200,w_223,g_face,q_auto" loading="lazy"
                                class="news img-fluid rounded mx-auto d-block"
                                style="width: 223px; height: 200px; object-fit: cover; display: block;" />
                        </div>
                        <div class="berita-page-content">
                            <div class="berita-page-date">{{ $item->created_at->format('d M Y') }}</div>
                            <h3 class="berita-page-heading">{{ $item->judul }}</h3>
                            <a href="{{ route('berita.show', $item->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-container pt-4">
                <div class="showing-entries">
                    Menampilkan <b>{{ $news->firstItem() }}</b> sampai <b>{{ $news->lastItem() }}</b> dari
                    <b>{{ $news->total() }}</b>
                    data
                </div>
                <div class="pagination">
                    {{ $news->onEachSide(1)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
