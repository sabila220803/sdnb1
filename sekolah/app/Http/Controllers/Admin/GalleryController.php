<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Galeri\StoreGaleriRequest;
use App\Http\Requests\Galeri\UpdateGaleriRequest;
use Illuminate\Http\Request;
use App\Models\Galeri as Gallery;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $galleries = Gallery::when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', '%' . $search . '%');
        })
            ->orderBy('created_at', 'DESC') // Order before pagination
            ->paginate(10); // Paginate comes last

        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(StoreGaleriRequest $request)
    {
        $data = $request->validated();

        $image = cloudinary()
            ->uploadApi()
            ->upload($data['foto']->getRealPath(), [
                'folder' => 'galeri',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto',
                    'compression' => 'low',
                ],
            ]);
        if (!$image) {
            return redirect()->route('admin.gallery.index')->with('error', 'Gagal menambahkan media ke galeri');
        }

        $result = Gallery::create([
            'judul' => strtolower($data['judul']),
            'deskripsi' => $data['deskripsi'],
            'public_id' => $image['public_id'],
            'url_file' => $image['secure_url'],
        ]);
        if (!$result) {
            cloudinary()->uploadApi()->destroy($image['public_id']);
            return redirect()->route('admin.gallery.index')->with('error', 'Gagal menambahkan media ke galeri');
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Media berhasil ditambahkan ke galeri');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return response()->json($gallery);
    }

    public function update(UpdateGaleriRequest $request, $id)
    {
        $data = $request->validated();

        $gallery = Gallery::findOrFail($id);
        if (!$gallery) {
            return redirect()->route('admin.gallery.index')->with('error', 'Media galeri tidak ditemukan');
        }

        $data = [
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'],
            'foto' => $data['foto'] ?? '',
        ];

        if ($data['foto']) {
            if ($gallery->public_id) {
                $result = cloudinary()->uploadApi()->destroy($gallery->public_id);
                if (!$result) {
                    return redirect()->route('admin.gallery.index')->with('error', 'Gagal menghapus media dari Cloudinary');
                }
            }

            $image = cloudinary()->uploadApi()->upload($data['foto']->getRealPath(), [
                'folder' => 'galeri',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto',
                    'compression' => 'low',
                ],
            ]);

            $data['public_id'] = $image['public_id'];
            $data['url_file'] = $image['secure_url'];
        }

        $result = $gallery->update($data);
        if(!$result){
            cloudinary()->uploadApi()->destroy($image['public_id']);
            return redirect()->route('admin.gallery.index')->with('error', 'Gagal memperbarui media galeri');
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Media galeri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        if (!$gallery) {
            return redirect()->route('admin.gallery.index')->with('error', 'Media galeri tidak ditemukan');
        }

        if ($gallery->public_id) {
            $result = cloudinary()->uploadApi()->destroy($gallery->public_id);
            if (!$result) {
                return redirect()->route('admin.gallery.index')->with('error', 'Gagal menghapus media dari Cloudinary');
            }
        }

        $result = $gallery->delete();
        if (!$result) {
            return redirect()->route('admin.gallery.index')->with('error', 'Gagal menghapus media galeri');
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Media galeri berhasil dihapus');
    }
}
