<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Berita\StoreRequest;
use App\Http\Requests\Berita\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Berita as News;
use Cloudinary;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $news = News::when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('penerbit', 'like', '%' . $search);
        })
            ->orderBy('created_at', 'DESC') // Order before pagination
            ->paginate(10); // Paginate comes last

        return view('admin.news.index', compact('news'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $image = cloudinary()->uploadApi()->upload($data['foto']->getRealPath(), [
            'folder' => 'berita',
            'transformation' => [
                'quality' => 'auto',
                'fetch_format' => 'auto',
                'compression' => 'low',
            ],
        ]);
        if (!$image) {
            return redirect()->route('admin.news.index')->with('error', 'Gagal mengunggah foto berita');
        }

        $result = News::create([
            'judul' => strtolower($data['judul']),
            'penerbit' => strtolower($data['penerbit']),
            'deskripsi' => $data['deskripsi'],
            'public_id' => $image['public_id'],
            'url_file' => $image['secure_url'],
        ]);
        if (!$result) {
            cloudinary()->uploadApi()->destroy($image['public_id']);
            return redirect()->route('admin.news.index')->with('error', 'Gagal menambahkan berita');
        }

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return response()->json($news);
    }

    public function update(UpdateRequest $request, $id)
    {
        $news = News::findOrFail($id);
        if (!$news) {
            return redirect()->route('admin.news.index')->with('error', 'Berita tidak ditemukan');
        }

        $data = $request->validated();

        $data = [
            'judul' => strtolower($data['judul']),
            'penerbit' => strtolower($data['penerbit']),
            'deskripsi' => $data['deskripsi'],
            'foto' => $data['foto'] ?? '',
        ];

        if ($data['foto'] != null) {
            if ($news->public_id) {
                cloudinary()->uploadApi()->destroy($news->public_id);
            }

            $image = cloudinary()->uploadApi()->upload($data['foto']->getRealPath(), [
                'folder' => 'berita',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto',
                    'compression' => 'low',
                ],
            ]);
            if (!$image) {
                return redirect()->route('admin.news.index')->with('error', 'Gagal mengunggah foto berita');
            }

            $data['public_id'] = $image['public_id'];
            $data['url_file'] = $image['secure_url'];
        }

        $result = $news->update($data);
        if (!$result) {
            if (isset($data['public_id'])) {
                cloudinary()->uploadApi()->destroy($data['public_id']);
            }
            return redirect()->route('admin.news.index')->with('error', 'Gagal memperbarui berita');
        }

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if (!$news) {
            return redirect()->route('admin.news.index')->with('error', 'Berita tidak ditemukan');
        }

        if ($news->public_id) {
            $result = cloudinary()->uploadApi()->destroy($news->public_id);
            if (!$result) {
                return redirect()->route('admin.news.index')->with('error', 'Gagal menghapus foto dari Cloudinary');
            }
        }

        $result = $news->delete();
        if (!$result) {
            return redirect()->route('admin.news.index')->with('error', 'Gagal menghapus berita');
        }

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
    }
}
