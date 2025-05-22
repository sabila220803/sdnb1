<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function sekolah()
    {
        return view('kurikulum.sekolah');
    }

    public function kalender()
    {
        return view('kurikulum.kalender');
    }

    public function video()
    {
        return view('kurikulum.video');
    }
}