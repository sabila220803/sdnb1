<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\School;
use App\Models\Prestasi;
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
        $news = $this->school->getNews();

        return view('home.index', compact('kepalaSekolah', 'prestasis', 'programs', 'news'));
    }
}
