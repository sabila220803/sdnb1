<?php

namespace App\Http\Controllers;

use App\Models\BeritaLengkap;

class BeritaController extends Controller
{
    protected $berita;

    public function __construct()
    {
        $this->berita = new BeritaLengkap();
    }

    public function index()
    {
        $news = $this->berita->getAllNews();
        return view('berita.berita', compact('news'));
    }
}