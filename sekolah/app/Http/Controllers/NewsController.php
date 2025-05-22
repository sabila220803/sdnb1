<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $school;

    public function __construct(School $school)
    {
        $this->school = $school;
    }

    public function index()
    {
        $news = $this->school->getNews();
        return view('berita.berita', compact('news'));
    }
}