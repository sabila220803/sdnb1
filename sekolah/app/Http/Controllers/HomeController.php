<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\School;
use App\Models\Prestasi;
use App\Models\Berita as News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $school;

    public function __construct(School $school)
    {
        $this->school = $school;
    }

    public function index()
    {
        $kepalaSekolah = Guru::where('jabatan', 'kepala sekolah')->first();
        $prestasis = Prestasi::paginate(10);
        $programs = $this->school->getPrograms();
        $news = News::latest()->take(6)->get();

        return view('home.index', compact('kepalaSekolah', 'prestasis', 'programs', 'news'));
    }
}
