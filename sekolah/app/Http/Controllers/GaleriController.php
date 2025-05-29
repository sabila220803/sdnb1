<?php

namespace App\Http\Controllers;

use App\Models\Galeri as Gallery;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function foto()
    {
        $galleries = Gallery::orderBy('created_at', 'DESC')->paginate(9); // Paginate comes last
        return view('galeri.foto', compact('galleries'));
    }

    public function video()
    {
        return view('galeri.video');
    }
}
