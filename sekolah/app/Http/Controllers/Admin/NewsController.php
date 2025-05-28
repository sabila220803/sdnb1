<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Cloudinary;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $uploadedFile = $request->file('thumbnail');
        $result = Cloudinary::upload($uploadedFile->getRealPath());

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'public_id' => $result->getPublicId(),
            'url_file' => $result->getSecurePath()
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return response()->json($news);
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];

        if ($request->hasFile('thumbnail')) {
            if ($news->public_id) {
                Cloudinary::destroy($news->public_id);
            }

            $uploadedFile = $request->file('thumbnail');
            $result = Cloudinary::upload($uploadedFile->getRealPath());

            $data['public_id'] = $result->getPublicId();
            $data['url_file'] = $result->getSecurePath();
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->public_id) {
            Cloudinary::destroy($news->public_id);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
    }
}
