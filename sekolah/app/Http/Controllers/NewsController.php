<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\Berita as News;

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

        return view('berita.berita', compact('news'));
    }
    
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('berita.detail', compact('news'));
    }
}