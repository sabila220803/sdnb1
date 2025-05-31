<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\Berita as News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('berita.berita', compact('news'));
    }
    
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('berita.show', compact('news'));
    }
}