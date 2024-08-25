<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemilihanEkskulController extends Controller
{
    public function index()
    {
        $page = "Pemilihan Ekskul";
        return view('siswa.pages.PemilihanEkskul.index', compact('page'));
    }
    public function hasil()
    {
        $page = "Pemilihan Ekskul";
        return view('siswa.pages.PemilihanEkskul.hasil', compact('page'));
    }
}
