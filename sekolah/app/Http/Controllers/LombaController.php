<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LombaController extends Controller
{
    public function tulisanMotivasi()
    {
        return view('lomba.tulisan-motivasi');
    }

    public function bahasaJawa()
    {
        return view('lomba.bahasa-jawa');
    }

    public function paiSeniIslami()
    {
        return view('lomba.pai-seni-islami');
    }
}