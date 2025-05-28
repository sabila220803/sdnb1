<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Cloudinary;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:Foto,Video',
            'description' => 'nullable|string',
            'media' => 'required|file|mimes:' . ($request->category === 'Foto' ? 'jpeg,png,jpg' : 'mp4,mov,avi') . '|max:20480'
        ]);

        $uploadedFile = $request->file('media');
        $options = [];

        if ($request->category === 'Video') {
            $options['resource_type'] = 'video';
        }

        $result = Cloudinary::upload($uploadedFile->getRealPath(), $options);

        Gallery::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'public_id' => $result->getPublicId(),
            'url_file' => $result->getSecurePath()
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Media berhasil ditambahkan ke galeri');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return response()->json($gallery);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:Foto,Video',
            'description' => 'nullable|string',
            'media' => 'nullable|file|mimes:' . ($request->category === 'Foto' ? 'jpeg,png,jpg' : 'mp4,mov,avi') . '|max:20480'
        ]);

        $data = [
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description
        ];

        if ($request->hasFile('media')) {
            if ($gallery->public_id) {
                Cloudinary::destroy($gallery->public_id, [
                    'resource_type' => $gallery->category === 'Video' ? 'video' : 'image'
                ]);
            }

            $uploadedFile = $request->file('media');
            $options = [];

            if ($request->category === 'Video') {
                $options['resource_type'] = 'video';
            }

            $result = Cloudinary::upload($uploadedFile->getRealPath(), $options);

            $data['public_id'] = $result->getPublicId();
            $data['url_file'] = $result->getSecurePath();
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Media galeri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->public_id) {
            Cloudinary::destroy($gallery->public_id, [
                'resource_type' => $gallery->category === 'Video' ? 'video' : 'image'
            ]);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Media galeri berhasil dihapus');
    }
}
